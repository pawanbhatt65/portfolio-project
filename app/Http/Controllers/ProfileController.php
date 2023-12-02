<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\LoginMail;
use App\Models\ContactModel;
use App\Models\UserRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        return view('project');
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

        $sendMail = '2712chandra@gmail.com';

        $name = $req->name;
        $phone = $req->phone;
        $email = $req->email;
        $subject = $req->subject;
        $message = $req->message;

        $contactModal = new ContactModel;
        $contactModal->name = $name;
        $contactModal->phone = $phone;
        $contactModal->email = $email;
        $contactModal->subject = $subject;
        $contactModal->message = $message;

        if ($contactModal->save()) {
            try {
                $new_user = ContactModel::latest()->limit(1)->get();
                $new_user_id = $new_user[0]->contact_id;
                Mail::to($sendMail)->send(new ContactMail($new_user));
                return redirect('/contact-us')->response()->json(['message' => 'mail_send']);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            return redirect('/contact-us')->response()->json(['message' => 'mail_not_send']);
        }

    }
    // user register functionality
    public function registerECommerce(Request $req)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules = [
                'registerName' => 'required|string|max:255',
                'registerPhone' => 'required|min:7|max:14|string',
                'registerEmail' => 'required|email|max:255|unique:user_registers,email',
                'registerPassword' => 'required|string|min:8',
                'registerConfirmPassword' => 'required|string|same:registerPassword',
            ];
            $req->validate($rules);
            $name = $req->registerName;
            $phone = $req->registerPhone;
            $email = $req->registerEmail;
            $password = bcrypt($req->registerPassword);
            $confirm_password = bcrypt($req->registerConfirmPassword);
            $date = Carbon::now();
            // dd($name, $phone, $password);
            $check_user = UserRegister::where('email', '=', $email)->get();
            if (COUNT($check_user) > 0) {
                return response()->json(['message' => 'already_register']);
            } else {
                try {
                    $new_user = new UserRegister;
                    $new_user->name = $name;
                    $new_user->phone = $phone;
                    $new_user->email = $email;
                    $new_user->password = $password;
                    $new_user->confirm_password = $confirm_password;
                    $new_user->added_at = $date;
                    if ($new_user->save()) {
                        try {
                            $new_person = UserRegister::latest()->limit(1)->get();
                            Mail::to($email)->send(new LoginMail($new_person));
                            return response()->json(['message' => 'mail_send']);
                        } catch (Exception $e) {
                            return $e->getMessage();
                        }
                    } else {
                        return response()->json(['message' => 'user_data_not_saved']);
                    }
                } catch (Exception $e) {
                    return $e->getMessage();
                }
            }
        }
    }
    // user login functionality
    public function logInECommerce(Request $req)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rules = [
                'loginEmail' => 'required|email',
                'loginPassword' => 'required|string|min:8',
            ];
            $req->validate($rules);

            $email = $req->loginEmail;
            $pass = $req->loginPassword;

            $password = bcrypt($pass);
            $check_user = UserRegister::where('email', $email)->get();

            if (count($check_user) > 0) {
                $user_password = $check_user[0]->password;
                $user_email_verify = $check_user[0]->email_verify;
                if ($user_email_verify === "yes") {
                    if ($password === $user_password) {
                        return response()->json(['message' => 'logged_in']);
                    } else {
                        return response()->json(['message' => 'password_not_matched']);
                    }
                } else {
                    return response()->json(['message' => 'email_verify']);
                }
            } else {
                return response()->json(['message' => 'user_not_found']);
            }
        }
    }

    // user logged in
    public function loginFunction(Request $req)
    {
        if (session()->has('isUser')) {
            return view('logged_user.dashboard');
        } else {
            return view('project');
        }
    }
    // logged user dashboard
    public function userDashboard()
    {
        return view('logged_user.dashboard');
    }
}
