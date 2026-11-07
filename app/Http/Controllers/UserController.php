<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PagesController;
use App\Models\address;
use App\Models\cart;
use App\Models\intro_category;
use App\Models\order;
use App\Models\pages;
use App\Models\phone_code;
use App\Models\refUser;
use App\Models\requests;
use App\Models\role;
use App\Models\role_user;
use App\Models\social_qr_codes;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver;
use Log;

class UserController extends Controller
{
    public function create($slug = null)
    {
        return view('client.signup', ['slug' => $slug]);
    }

    // public function storeWithClick()
    // {
    //     $page_id = pages::insertGetId([
    //         'title' => "نام من",
    //         'subTitle' => Auth::user()->family,
    //         'user_id' => Auth::id(),
    //     ]);
    //     $random = Str::random(10);
    //     $link = url('/')."/links/$page_id/" . $random;
    //     $qr_svg = QrCode::size(100)->generate($link);
    //     $fileName = 'qrcodes/' . $page_id . '_' . $random . '.svg';
    //     Storage::disk('public')->put($fileName, $qr_svg);
    //     social_qr_codes::create([
    //         'qr_path' => $fileName,
    //         'page_id' => $page_id,
    //         'page_path' => 'links/' . $page_id . '/' . $random,
    //         'slug'=>$random
    //     ]);
    //     intro_category::create([
    //         'title' => 'بدون دسته بندی',
    //         'user_id' => Auth::id(),
    //         'page_id' => $page_id,
    //     ]);
    //     return to_route('home');
    // }

    public function store(Request $request)
    {
        if ($request->rules) {
            $phone = User::where('phoneNumber', $request->phoneNumber)->first();
            if ($phone) {
                return redirect()->back()->with('message', 'این شماره تلفن قبلا استفاده شده');
            }
            $password = Hash::make($request->password);
            $ref_code = Str::random(10);
            $user_id = User::insertGetId([
                'name' => $request->name,
                'family' => $request->family,
                'phoneNumber' => $request->phoneNumber,
                'password' => $password,
                'ref_code' => $ref_code,
            ]);
            role_user::create(['role_id' => 2, 'user_id' => $user_id]);
            if (isset($request->ref_code)) {
                $ref_user = User::where('ref_code', $request->ref_code)->first();
                refUser::create(['user_id' => $ref_user->id, 'invited_user_id' => $user_id]);
            }
            $user = User::find($user_id);
            Auth::login($user);
            // $this->storeWithClick();
            return to_route('dashboard');
        }
        return to_route('signup');
    }

    public function check(Request $request)
    {
        $user = User::where('phoneNumber', $request->phoneNumber)->first();

        if ($user) {
            if (isset($request->password)) {
                $checkHash = Hash::check($request->password, $user->password);
                if ($checkHash) {
                    Auth::login($user);
                    return to_route('dashboard');
                }
                return to_route('login', ['message' => 'لطفا اطلاعات خود را مجددا بررسی کنید']);
            }
            if (isset($request->code)) {
                $code = phone_code::where('phoneNumber', $request->phoneNumber)->first();
                if ($code->code == $request->code) {
                    Auth::login($user);
                    return to_route('dashboard');
                }
                return to_route('login', ['message' => 'لطفا اطلاعات خود را مجددا بررسی کنید']);
            }
        }
        return to_route('signup');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('home');
    }

    public function index()
    {
        $users = User::all();
        foreach ($users as $user) {
            $rolesArray = [];
            foreach ($user->role as $role) {
                if ($role->title == 'admin') {
                    $rolesArray[] = 'ادمین';
                }
                if ($role->title == 'admin2') {
                    $rolesArray[] = 'ادمین2';
                }
                if ($role->title == 'general') {
                    $rolesArray[] = 'کاربر عادی';
                }
            }
            $user->setAttribute('roles', $rolesArray);
        }
        return view('admin.user.index', ['users' => $users]);
    }

    public function panel()
    {
        if (!Auth::check()) {
            return to_route('login');
        }
        return view('admin.app.panel');
    }

    public function profile()
    {
        $myContacts = Auth::user()->refUsers;
        foreach ($myContacts as $contact) {
            $user = User::find($contact->invited_user_id);
            $contact['contact'] = $user;
        }
        foreach (Auth::user()->role as $role) {
            if ($role->title == 'admin') {
                $rolesArray[] = 'ادمین';
            }
            if ($role->title == 'admin2') {
                $rolesArray[] = 'ادمین2';
            }

            if ($role->title == 'general') {
                $rolesArray[] = 'کاربر عادی';
            }
        }
        Auth::user()->setAttribute('roles', $rolesArray);
        return view('admin.user.profile', ['myContacts' => $myContacts]);
    }

    public function show(user $user)
    {
        foreach ($user->role as $role) {
            if ($role->title == 'admin') {
                $rolesArray[] = 'ادمین';
            }
            if ($role->title == 'admin2') {
                $rolesArray[] = 'ادمین2';
            }
            if ($role->title == 'general') {
                $rolesArray[] = 'کاربر عادی';
            }
        }
        $user->setAttribute('roles', $rolesArray);
        return view('admin.user.single', ['user' => $user]);
    }

    public function edit(user $user)
    {
        $roles = role::all();
        $userRoles = $user->role->pluck('id')->toArray();
        return view('admin.user.adminUserEdit', ['user' => $user, 'roles' => $roles, 'userRoles' => $userRoles]);
    }

    public function update(Request $request, User $user)
    {
        $user = User::find($request->user_id);
        if (isset($request->roles)) {
            role_user::where('user_id', $user->id)->delete();
            foreach ($request->roles as $role) {
                role_user::create([
                    'user_id' => $request->user_id,
                    'role_id' => $role
                ]);
            }
        }
        $user->name = $request->name;
        $user->family = $request->family;
        if (isset($request->phoneNumber)) {
            $user->phoneNumber = $request->phoneNumber;
        }
        if (isset($request->email)) {
            $user->email = $request->email;
        }
        if ($request->password) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        if ($request->main_image) {
            if ($user->main_image) {
                Storage::disk('public')->delete($user->main_image);
            }
            $name = $request->main_image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $user->main_image = $path;
        }
        //        $request->address && $user->address = $request->address;
        $user->save();
        return redirect()->back();
    }

    public function delete(user $user)
    {
        refUser::where('invited_user_id', $user->id)->delete();
        refUser::where('user_id', $user->id)->delete();
        if (count($user->pages)) {
            foreach ($user->pages as $page) {
                if ($page->cover_path) {
                    Storage::disk('public')->delete($page->cover_path);
                }
                if ($page->logo_path) {
                    Storage::disk('public')->delete($page->logo_path);
                }
                if (count($page->socialAddresses)) {
                    foreach ($page->socialAddresses as $address) {
                        $address->delete();
                    }
                }
                if (count($page->siteLinks)) {
                    foreach ($page->siteLinks as $site_link) {
                        $site_link->delete();
                    }
                }
                if (count($page->FAQs)) {
                    foreach ($page->FAQs as $faq) {
                        $faq->delete();
                    }
                }
                if (count($page->page_blocks)) {
                    foreach ($page->page_blocks as $page_block) {
                        $page_block->delete();
                    }
                }
                if (count($page->socialMedia)) {
                    foreach ($page->socialMedia as $social) {
                        if ($social->icon_path) {
                            Storage::disk('public')->delete($social->icon_path);
                        }
                        $social->delete();
                    }
                }
                if (count($page->page_contactuses)) {
                    foreach ($page->page_contactuses as $page_contactus) {
                        $page_contactus->delete();
                    }
                    $page->social_qr_codes->delete();
                }
                $page->delete();
            }
        }
        if (count($user->contactUs)) {
            foreach ($user->contactUs as $contact) {
                $contact->delete();
            }
        }
        if (count($user->specialPages)) {
            foreach ($user->specialPages as $specialPage) {
                $specialPage->delete();
            }
        }
        // if(count($user->request)){
        //       $user->request->delete();
        // }

        if (count($user->introCats)) {
            foreach ($user->introCats as $introCat) {
                $introCat->delete();
            }
        }
        if (count($user->introPros)) {
            foreach ($user->introPros as $introPro) {
                $introPro->delete();
            }
        }
        $user->delete();
        role_user::where('user_id', $user->id)->delete();
        return to_route('user.list');
    }

    public function deleteAll(Request $request)
    {
        if (!isset($request->users)) {
            return redirect()->back();
        }
        foreach ($request->users as $user_id) {
            $user = User::find($user_id);
            refUser::where('invited_user_id', $user_id)->delete();
            refUser::where('user_id', $user_id)->delete();
            if (count($user->pages)) {
                foreach ($user->pages as $page) {
                    Storage::disk('public')->delete($page->cover_path);
                    Storage::disk('public')->delete($page->logo_path);
                    if (count($page->socialAddresses)) {
                        foreach ($page->socialAddresses as $address) {
                            $address->delete();
                        }
                    }
                    if (count($page->siteLinks)) {
                        foreach ($page->siteLinks as $site_link) {
                            $site_link->delete();
                        }
                    }
                    if (count($page->FAQs)) {
                        foreach ($page->FAQs as $faq) {
                            $faq->delete();
                        }
                    }
                    if (count($page->page_blocks)) {
                        foreach ($page->page_blocks as $page_block) {
                            $page_block->delete();
                        }
                    }
                    if (count($page->socialMedia)) {
                        foreach ($page->socialMedia as $social) {
                            Storage::disk('public')->delete($social->icon_path);
                            $social->delete();
                        }
                    }
                    if (count($page->page_contactuses)) {
                        foreach ($page->page_contactuses as $page_contactus) {
                            $page_contactus->delete();
                        }
                    }
                    $page->social_qr_codes->delete();
                    $page->delete();
                }
            }

            if (count($user->contactUs)) {
                foreach ($user->contactUs as $contact) {
                    $contact->delete();
                }
            }
            if (count($user->introCats)) {
                foreach ($user->introCats as $introCat) {
                    $introCat->delete();
                }
            }
            if (count($user->specialPages)) {
                foreach ($user->specialPages as $specialPage) {
                    $specialPage->delete();
                }
            }
            // if(count($user->request)){
            //       $user->request->delete();
            // }
            if (count($user->introCats)) {
                foreach ($user->introCats as $introCat) {
                    $introCat->delete();
                }
            }
            if (count($user->introPros)) {
                foreach ($user->introPros as $introPro) {
                    $introPro->delete();
                }
            }
            $user->delete();
            return redirect()->back();
        }
    }

    public function login($message = null)
    {
        return view('client.login', ['message' => $message]);
    }

    public function compelete_form()
    {
        return view('admin.user.compelete_form');
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $user->role;
        if (isset($request->main_image)) {
            $name = $request->main_image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $user->main_image = $path;
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->family = $request->family;
        $user->save();
        return to_route('user.profile');
    }

    public function setting()
    {
        return view('admin.user.userEdit');
    }

    public function checkAuth(Request $request)
    {
        $bool = false;
        $user['validate'] = User::where('phoneNumber', $request->phoneNumber)->first();
        $code = phone_code::where('phoneNumber', $request->phoneNumber)->first();
        if ($code->code == $request->code) {
            $bool = true;
        }
        $user['checkCode'] = $bool;
        return response()->json($user);
    }

    public function checkActivationCode(Request $request)
    {
        $bool = false;
        $user['validate'] = User::where('phoneNumber', $request->phoneNumber)->first();
        $user['checkCode'] = $bool;
        $code = phone_code::where('phoneNumber', $request->phoneNumber)->first();
        if ($user['validate']) {
            if ($code->code == $request->code) {
                $bool = true;
                Auth::login($user['validate']);
            }
            if (isset($request->career_id)) {
                $user['orders'] = order::where('user_id', Auth::id())->where('career_id', $request->career_id)->where('order_status_id', 1)->orWhere('order_status_id', 2)->orWhere('order_status_id', 3)->orWhere('order_status_id', 4)->get();
            }
            $user['validate']->load(['carts' => function ($query) {
                $query->whereNull('order_id');
            }]);
            $user['checkCode'] = $bool;
        }
        return response()->json($user);
    }

    public function create_user()
    {
        $roles = role::all();
        return view('admin.user.create', ['roles' => $roles]);
    }

    public function store_user(Request $request)
    {
        $password = Hash::make($request->password);
        $ref_code = Str::random(10);
        $path = null;
        if (isset($request->main_image)) {
            $name = $request->main_image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
        }
        $user_id = User::insertGetId([
            'name' => $request->name,
            'family' => $request->family,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'main_image' => $path,
            'password' => $password,
            'ref_code' => $ref_code,
        ]);
        if (isset($request->ref_code)) {
            $ref_user = User::where('ref_code', $request->ref_code)->first();
            refUser::create(['user_id' => $ref_user->id, 'invited_user_id' => $user_id]);
        }
        role_user::create([
            'user_id' => $user_id,
            'role_id' => $request->role
        ]);
        return to_route('user.list');
    }

    public function send_code(Request $request)
    {
        $flag = false;
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($user) {
            $flag = true;
        }
        if (!$flag) {
            $code = rand(1000, 10000);
            phone_code::upsert(['phoneNumber' => $request->phoneNumber, 'code' => $code], ['phoneNumber'], ['code']);
            //            $apiKey = 'YTBhZjhlNDAtZGI1Zi00ZWQ1LTkwNmYtZWU2MWFhYTkzY2M0NTcxZGQ3ZjY2Yzk1MmNjZmFiM2M2ZjVmNjBhMDg2MTQ=';
            //            $client = new \IPPanel\Client($apiKey);
            //            $patternValues = [
            //                'activation_code' => $code,
            //            ];
            //            $bulkID = $client->sendPattern(
            //                '7fvdx77gveizxqn',  // pattern code
            //                '+983000505',  // originator
            //                $request->phoneNumber,  // recipient
            //                $patternValues,  // pattern values
            //            );
            $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept: application/json',
                'Api-Key: M1MIQPQ9s85i6dxdzTeRGx9t87AtRQJlXNiu01e7awuQz94TkI',
                'Content-Type: application/json'
            ]);
            $payload = [
                'code' => '7fvdx77gveizxqn',
                'attributes' => [
                    'activation_code' => $code,
                ],
                'recipient' => $request->phoneNumber,
                'line_number' => '50002178584000',
                'number_format' => 'english'
            ];
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            $response = curl_exec($ch);
        }
        return response()->json(['flag' => $flag, 'user' => $user]);
    }

    public function forget_password()
    {
        return view('client.forgetPassword');
    }

    public function set_password(Request $request)
    {
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        return to_route('reset_password', [$user]);
    }

    public function reset_password(User $user)
    {
        return view('client.setPassword', ['user' => $user]);
    }

    public function save_password(Request $request)
    {
        $user = User::find($request->user_id);
        $password = Hash::make($request->password);
        $user->password = $password;
        $user->save();
        return to_route('login');
    }

    public function search(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->key . '%')->orWhere('family', 'like', '%' . $request->key . '%')->orWhere('phoneNumber', 'like', '%' . $request->key . '%')->get();
        foreach ($users as $user) {
            $rolesArray = [];
            foreach ($user->role as $role) {
                if ($role->title == 'admin') {
                    $rolesArray[] = 'ادمین';
                }
                if ($role->title == 'admin2') {
                    $rolesArray[] = 'ادمین2';
                }
                if ($role->title == 'career') {
                    $rolesArray[] = 'صاحب رستوران';
                }
                if ($role->title == 'general') {
                    $rolesArray[] = 'کاربر عادی';
                }
                if ($role->title == 'official_student') {
                    $rolesArray[] = 'دانشجوی فائوس';
                }
            }
            $user->setAttribute('roles', $rolesArray);
        }

        return response()->json($users);
    }

    public function customerSearch(Request $request)
    {
        $users = Auth::user()->customers()->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->key . '%')->orWhere('family', 'like', '%' . $request->key . '%');
        })->get();
        foreach ($users as $user) {
            $rolesArray = [];
            foreach ($user->role as $role) {
                if ($role->title == 'admin') {
                    $rolesArray[] = 'ادمین';
                }
                if ($role->title == 'admin2') {
                    $rolesArray[] = 'ادمین2';
                }
                if ($role->title == 'general') {
                    $rolesArray[] = 'کاربر عادی';
                }
            }
            $user->setAttribute('roles', $rolesArray);
        }
        return response()->json($users);
    }

    public function removeActivationCode(Request $request)
    {
        $row = phone_code::where('phoneNumber', $request->phoneNumber)->first();
        if ($row) {
            $row->delete();
        }
        return response()->json($row);
    }

    public function checkFromMenu(Request $request)
    {
        $career_id = $request->input('career_id');
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($user) {
            $checkHash = Hash::check($request->password, $user->password);
            if ($checkHash) {
                Auth::login($user);
                // Auth::loginUsingId($user->id);

                return response()->json($user);
            }
            return response()->json('incorrectPassword');
        }
        return response()->json('userNotFound');
    }

    public function setAddress(Request $request)
    {
        $user_id = Auth::id();
        if (isset($request->user_id)) {
            $user_id = $request->user_id;
        }
        $address_id = address::create([
            'user_id' => $user_id,
            'address' => $request->address,
        ]);
        $address = address::find($address_id);
        return response()->json($address);
    }

    public function myUsers()
    {
        $users = User::where('parent_id', Auth::user()->id)->get();
        foreach ($users as $user) {
            $rolesArray = [];
            foreach ($user->role as $role) {
                if ($role->title == 'admin') {
                    $rolesArray[] = 'ادمین';
                }
                if ($role->title == 'admin2') {
                    $rolesArray[] = 'ادمین2';
                }
                if ($role->title == 'general') {
                    $rolesArray[] = 'کاربر عادی';
                }
            }
            $user->setAttribute('roles', $rolesArray);
        }
        return view('admin.user.customers', ['users' => $users]);
    }

    public function request(User $user)
    {
        requests::create(['user_id' => $user->id, 'status' => 1]);
        return redirect()->back();
    }

    public function requestList()
    {
        $requests = requests::where('status', 1)->get();
        foreach ($requests as $request) {
            $request['user'] = User::find($request->user_id);
        }
        return view('admin.user.requests', ['requests' => $requests]);
    }

    public function acceptRequest(Requests $requests)
    {
        $requests->status = 2;
        $requests->save();
        role_user::create(['user_id' => $requests->user_id, 'role_id' => 4]);
        return redirect()->back();
    }

    public function deleteRequest(Requests $requests)
    {
        $requests->delete();
        return redirect()->back();
    }

    public function requestEvent(Request $request)
    {
        if (!isset($request->status)) {
            return redirect()->back();
        }
        if ($request->status == 'accept') {
            foreach ($request->requests as $req_id) {
                $req = requests::find($req_id);
                $req->status = 2;
                $req->save();
                role_user::create(['user_id' => $req->user_id, 'role_id' => 4]);
            }
        }
        if ($request->status == 'delete') {
            foreach ($request->requests as $req_id) {
                $req->delete();
            }
        }
        return redirect()->back();
    }

    public function loginWithActivationCode(Request $request)
    {
        $flag = true;
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($user) {
            $flag = false;
        }
        if (!$flag) {
            $code = rand(1000, 10000);
            phone_code::upsert(['phoneNumber' => $request->phoneNumber, 'code' => $code], ['phoneNumber'], ['code']);
            //            $apiKey = 'YTBhZjhlNDAtZGI1Zi00ZWQ1LTkwNmYtZWU2MWFhYTkzY2M0NTcxZGQ3ZjY2Yzk1MmNjZmFiM2M2ZjVmNjBhMDg2MTQ=';
            //            $client = new \IPPanel\Client($apiKey);
            //            $patternValues = [
            //                'activation_code' => $code,
            //            ];
            //            $bulkID = $client->sendPattern(
            //                '7fvdx77gveizxqn',  // pattern code
            //                '+983000505',  // originator
            //                $request->phoneNumber,  // recipient
            //                $patternValues,  // pattern values
            //            );
            $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept: application/json',
                'Api-Key: M1MIQPQ9s85i6dxdzTeRGx9t87AtRQJlXNiu01e7awuQz94TkI',
                'Content-Type: application/json'
            ]);
            $payload = [
                'code' => '7fvdx77gveizxqn',
                'attributes' => [
                    'activation_code' => $code,
                ],
                'recipient' => $request->phoneNumber,
                'line_number' => '50002178584000',
                'number_format' => 'english'
            ];
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            $response = curl_exec($ch);
        }
        return response()->json($flag);
    }

    public function setRefCode()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (!$user->ref_code) {
                $ref_code = Str::random(10);
                $user->ref_code = $ref_code;
                $user->save();
            }
        }
        dd('all users has ref code');
    }

    public function dashboard()
    {
        $myContacts = Auth::user()->refUsers;
        foreach ($myContacts as $contact) {
            $user = User::find($contact->invited_user_id);
            $rolesArray = [];
            if (isset($user->role)) {
                foreach ($user->role as $role) {
                    if ($role->title == 'admin') {
                        $rolesArray[] = 'ادمین';
                    }
                    if ($role->title == 'admin2') {
                        $rolesArray[] = 'ادمین2';
                    }
                    if ($role->title == 'general') {
                        $rolesArray[] = 'کاربر عادی';
                    }
                }
                $user->setAttribute('roles', $rolesArray);
                $contact['contact'] = $user;
                $contact['pages'] = $user->pages;
            }
        }
        //        return $myContacts;
        $user = Auth::user();
        return view('admin.app.dashboard', ['myContacts' => $myContacts, 'user' => $user]);
    }

    public function userData(Request $request)
    {
        $userContacts = User::find($request['id']);
        $rolesArray = [];
        foreach ($userContacts->role as $role) {
            if ($role->title == 'admin') {
                $rolesArray[] = 'ادمین';
            }
            if ($role->title == 'admin2') {
                $rolesArray[] = 'ادمین2';
            }
            if ($role->title == 'general') {
                $rolesArray[] = 'کاربر عادی';
            }
        }
        $userContacts->setAttribute('roles', $rolesArray);
        return response()->json($userContacts);
    }

    public function editInfo(Request $request)
    {
        $currentUser = Auth::user();
        if ($request->state == 'name') {
            $currentUser->name = $request->inputValue;
        }
        if ($request->state == 'family') {
            $currentUser->family = $request->inputValue;
        }
        if ($request->state == 'email') {
            $currentUser->email = $request->inputValue;
        }
        if ($request->state == 'phoneNumber') {
            $currentUser->phoneNumber = $request->inputValue;
        }
        if ($request->state == 'password') {
            $currentUser->password = Hash::make($request->inputValue);
        }
        $currentUser->save();

        return response()->json('ok');
    }

    public function editProfile(Request $request)
    {
        $name = $request->image->getClientOriginalName();
        $fullName = time() . '_' . $name;
        $path = $request->file('image')->storeAs('images', $fullName, 'public');
        Auth::user()->main_image = $path;
        Auth::user()->save();
        return response()->json(Auth::user());
    }
}
