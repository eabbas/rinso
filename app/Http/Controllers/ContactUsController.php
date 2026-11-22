<?php

namespace App\Http\Controllers;
use App\Models\contactUs;
use App\Models\User;
use App\Models\phone_code;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function create()
    {
        return view('client.contactUs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required|regex:/^09[0-9]{9}$/',
            'code' => 'required|digits:4',
            'title' => 'required',
            'description' => 'required',
        ]);

        // بررسی کد تأیید
        $activationCode = phone_code::where('phoneNumber', $request->phoneNumber)
            ->where('code', $request->code)
            ->first();

        if (!$activationCode) {
            return back()
                ->withInput()
                ->withErrors([
                    'code' => 'کد تأیید وارد شده نامعتبر است یا اعتبار آن به پایان رسیده است.'
                ]);
        }

        $userId = Auth::check() ? Auth::id() : null;
        
        contactUs::create([
            'user_id' => $userId,
            'title' => $request->title,
            'description' => $request->description,
            'phoneNumber' => $request->phoneNumber
        ]);

        // حذف کد استفاده شده
        $activationCode->delete();

        if (Auth::check()) {
            return to_route('contactUs.myMessage');
        }

        return to_route('home')->with('message', 'تیکت شما با موفقیت به ادمین ارسال شد.');
    }

    public function index()
    {
        $allContactUs = contactUs::all();
        return view('admin.contactUs.index', ['allContactUs' => $allContactUs]);
    }
    public function single(contactUs $contactUs)
    {
        return view('admin.contactUs.single', ['contactUs' => $contactUs]);
    }
    public function clientSingle(contactUs $contactUs)
    {
        return view('client.contactUs.show', ['contactUs' => $contactUs]);
    }
    public function myMessage()
    {
        return view('client.contactUs.myMessage');
    }

    public function edit(contactUs $contactUs)
    {
        return view('client.contactUs.edit', ['contactUs' => $contactUs]);
    }

    public function update(Request $request)
    {
        $contactUs = contactUs::find($request->id);
        $contactUs->title = $request->title;
        $contactUs->description = $request->description;
        $contactUs->phoneNumber = $request->phoneNumber;
        $contactUs->save();
        return to_route('contactUs.myMessage');
    }

    public function delete(ContactUs $contactUs)
    {
        $contactUs->delete();

       
        return redirect()->back()->with('message', 'تیکت با موفقیت حذف شد');
        // return to_route('contactUs.myMessage');
    }
     public function deleteAll(Request $request)
    {
        foreach($request->allContactUs as $contactUs){
            $contactUs = contactUs::find($contactUs);
        }
        $contactUs->delete();
        return redirect()->back();
    }
    public function sendTicketCode(Request $request)
    {
     
            $code = rand(1000, 10000);
            phone_code::upsert(['phoneNumber' => $request->phoneNumber, 'code' => $code], ['phoneNumber'], ['code']);

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
        
        return response()->json('ok');
    }
}
