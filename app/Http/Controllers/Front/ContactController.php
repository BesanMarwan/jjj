<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Mail\Contact;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller
{
    public function getContact()
    {
        $categories = Category::select('id', 'name')->get();
        //fetch wheather Tempeture
        $weather    =Weather::select('id','temp')->first();

        return view('front.pages.contact', compact('categories','weather'));
    }

    public function contact(Request $request)
    {
        $messages=[
            'required'        =>'يرجى ملأ هذا الحقل ..',
            'user_email.email'=>'يجب ادخال ايميل صالح..',
        ];
        $request->validate([
            'user_name' =>'required',
            'user_email'=>'required|email',
            'subject'   =>'required',
            'message'   =>'required',

        ],$messages);

        $data = $request->all();
        Mail::to('besanmarwan2000@gmail.com')->send(new Contact($data));
//        toaster()->success("شكرا ع ارسال الرسالة  سيتم النظر اليه لاحقا");
        return route('front.getcontact');

    }
}
