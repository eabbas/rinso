<?php

namespace App\Http\Controllers;

use App\Models\qr_code;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\cart;
use App\Models\User;
use App\Models\career;
use App\Models\item_quantity;
use App\Events\orders;
use App\Events\clientOrders;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use Log;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $today = explode(' ', Verta::today());
        $today = $today[0];
        $user_id = Auth::id();
        if (isset($request->user_id)) {
            $user_id = $request->user_id;
        }
        $qr_code_id = null;
        if (isset($request->slug)) {
            $qr_code_id = qr_code::where('slug', $request->slug)->first()->id;
        }
        $order_id = order::insertGetId([
            'address_id' => isset($request->address) ? $request->address : null,
            'user_id' => $user_id,
            'qr_code_id' => $qr_code_id,
            'career_id' => $request->career_id,
            'order_status_id' => 1,
            'order_code' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $order_code = "100" . $order_id;
        order::where('id', $order_id)->update(['order_code' => $order_code]);
        foreach ($request->carts as $cart_id) {
            $cart = cart::find($cart_id);
            $cart->order_id = $order_id;
            $cart->save();
            $itemQuantity = item_quantity::where('date', $today)->where('menu_item_id', $cart->menu_item_id)->first();
            if (!$itemQuantity) {
                $itemQuantity = item_quantity::create([
                    'order_id' => $order_id,
                    'menu_item_id' => $cart->menu_item_id,
                    'date' => $today,
                ]);
            }
            $itemQuantity->quantity = $itemQuantity->quantity + $cart->quantity;
            $itemQuantity->save();
        }

        $order = order::find($order_id);
        orders::dispatch($order);
        return response()->json('ok');
    }

    public function show(Request $request)
    {
        //        $user_id = Auth::id();
        //        if(isset($request->user_id)){
        $user_id = $request->user_id;
        //        }
        $datas = [];
        //        $orders = order::where('user_id', $user_id)->where('career_id', $request->career_id)->where('order_status_id', 1)->where('order_status_id', 2)->where('order_status_id', 3)->where('order_status_id', 4)->get();
        //        $orders = order::where('user_id', $user_id)->where('career_id', $request->career_id)->where('order_status_id', 1)->orWhere('order_status_id', 2)->orWhere('order_status_id', 3)->orWhere('order_status_id', 4)->get();
        $orders = order::where('user_id', $user_id)->where('career_id', $request->career_id)->whereNotIn('order_status_id', [5, 6])->get();
        foreach ($orders as $order) {
            if ($order->address) {
                $order['address'] =  $order->address;
            }
            if ($order->qr_code_id) {
                $order['table'] =  $order->qr_code->description ? $order->qr_code->description : "-";
            }
            $order->status;
            //            $order->carts;
            $order->load(['carts' => function ($query) {
                $query->with('menu_item')->get();
            }]);
            $datas[] = $order;
        }
        return response()->json($datas);
    }

    public function showItems(order $order)
    {
        $order->carts->load('menu_item');
        $order->qr_code;
        $order->status;
        return response()->json($order);
    }


    public function acceptOrder(Request $request)
    {
        $order = order::with(['status', 'qr_code', 'carts.menu_item'])->find($request->order_id);
        // $order = order::find($request->order_id);

        // if (!$order) {
        //     return response()->json(['error' => 'سفارش یافت نشد'], 404);
        // }

        if ($request->status == 1) {
            $order->order_status_id = 2;
        }
        if ($request->status == 2) {
            $order->order_status_id = 3;
        }
        if ($request->status == 3) {
            $order->order_status_id = 4;
        }
        // if ($request->status == 4) {
        //     $order->order_status_id = 5;
        // }
        // if ($request->status == 5) {
        //     $order->order_status_id = 6;
        // }

        $order->save();
        $order->load('status');

        clientOrders::dispatch($order);

        return response()->json($order);
    }

    // public function delete(order $order, User $user = null, career $career = null){
    //     $order->update(['order_status_id'=>6]);

    //     if($user && $career){
    //         $orders = order::where('user_id', $user->id)->where('career_id', $career->id)->whereNotIn('order_status_id', [5, 6])->get();
    //         //            $orders = order::where('user_id', $user->id)->where('career_id', $career->id)->where('order_status_id', 1)->orWhere('order_status_id', 2)->orWhere('order_status_id', 3)->orWhere('order_status_id', 4)->get();
    //         return response()->json($orders);
    //     }

    //     $order->load(['status', 'qr_code', 'carts.menu_item']);
    //     orders::dispatch($order);
    //     clientOrders::dispatch($order);

    //     return response()->json($order->id);
    // }
    public function delete(order $order, User $user = null, career $career = null)
    {
        $oldStatusId = $order->order_status_id;

        $order->update(['order_status_id' => 6]);
        $order->load(['status', 'qr_code', 'carts.menu_item']);

        if ($oldStatusId == 1) {
            orders::dispatch($order);
        }

        if ($oldStatusId == 1) {
            clientOrders::dispatch($order);
        }

        if ($user && $career) {
            $orders = order::where('user_id', $user->id)
                ->where('career_id', $career->id)
                ->whereNotIn('order_status_id', [5, 6])
                ->get();
            return response()->json($orders);
        }

        return response()->json($order->id);
    }

    // public function remove(order $order, User $user = null, career $career = null)
    // {
    //     $oldStatusId = $order->order_status_id;

    //     $today = explode(' ', Verta::today());
    //     $today = $today[0];

    //     foreach ($order->carts as $cart) {
    //         $itemQuantity = item_quantity::where('date', $today)
    //             ->where('menu_item_id', $cart->menu_item_id)
    //             ->first();

    //         if ($itemQuantity) {
    //             $itemQuantity->quantity = $itemQuantity->quantity - $cart->quantity;
    //             $itemQuantity->save();
    //         }
    //     }

    //     $order->load(['status', 'qr_code', 'carts.menu_item']);

    //     $orderData = $order;
    //     $orderId = $order->id;
    //     $userId = $order->user_id;
    //     $careerId = $order->career_id;

    //     $order->delete();

    //     if ($oldStatusId == 1) {
    //         $orderData->is_removed = true;
    //         $orderData->order_status_id = 6;
    //         orders::dispatch($orderData);
    //     }

    //     clientOrders::dispatch($orderData);

    //     if ($user && $career) {
    //         $orders = order::where('user_id', $user->id)
    //             ->where('career_id', $career->id)
    //             ->whereNotIn('order_status_id', [5, 6])
    //             ->get();
    //         return response()->json($orders);
    //     }
    //     return response()->json($orderId);
    // }

    public function remove(order $order, User $user = null, career $career = null)
    {
        $oldStatusId = $order->order_status_id;

        $today = explode(' ', Verta::today());
        $today = $today[0];

        foreach ($order->carts as $cart) {
            $itemQuantity = item_quantity::where('date', $today)
                ->where('menu_item_id', $cart->menu_item_id)
                ->first();

            if ($itemQuantity) {
                $itemQuantity->quantity = $itemQuantity->quantity - $cart->quantity;
                $itemQuantity->save();
            }
        }

        $order->load(['status', 'qr_code', 'carts.menu_item']);

        $orderData = $order;
        $orderId = $order->id;
        $userId = $order->user_id;
        $careerId = $order->career_id;

        $order->delete();

        clientOrders::dispatch($orderData);

        if ($oldStatusId == 1) {
            // $orderData->is_removed = true;
            $orderData->order_status_id = 6;
            orders::dispatch($orderData);
        }

        if ($user && $career) {
            $orders = order::where('user_id', $user->id)
                ->where('career_id', $career->id)
                ->whereNotIn('order_status_id', [5, 6])
                ->get();
            return response()->json($orders);
        }
        return response()->json($orderId);
    }
}
