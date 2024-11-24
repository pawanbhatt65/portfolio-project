<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactModel;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MainController extends Controller
{
    // for /
    public function home(Request $req)
    {
        return view('home');
    }
    // for /about
    public function about()
    {
        return view('about');
    }
    // for /e-commerce
    public function eCommerce()
    {
        $product = Product::orderBy('product_id', 'DESC')->get();
        return view('project', ['products' => $product]);
    }
    // show product content function
    public function showProductContent(Request $req)
    {
        $product_id = $req->product_id;
        $product = Product::where('product_id', '=', $product_id)->first();
        return response()->json(['product' => $product]);
    }
    // for /contact-us
    public function contactUs()
    {
        return view('contact');
    }
    // for /contactUsPost data store
    public function contactUsPost(Request $req)
    {
        // dd($req->all());
        $rules = array(
            'name' => 'required',
            'phone' => 'required|min:7|max:14',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        );
        $req->validate($rules);

        $name = $req->name;
        $phone = $req->phone;
        $email = $req->email;
        $subject = $req->subject;
        $message = $req->message;

        $contactModal = new ContactModel();
        $contactModal->name = $name;
        $contactModal->phone = $phone;
        $contactModal->email = $email;
        $contactModal->subject = $subject;
        $contactModal->message = $message;

        if ($contactModal->save()) {
            Log::info("contactModal");
            Log::info($contactModal);
            try {
                $new_user = ContactModel::latest()->limit(1)->first();
                Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($new_user));
                Alert::success('Thank You!', 'Your form successfully submitted. Our team will be contact you soon!');
                return redirect()->route('contactUs');
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            return redirect('/contact-us')->response()->json(['message' => 'mail_not_send']);
        }

    }
}
