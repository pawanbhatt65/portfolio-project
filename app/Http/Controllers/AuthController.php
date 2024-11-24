<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Mail\LoginMail;
use App\Models\UserRegister;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
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
            $password = md5(trim($req->registerPassword));
            $confirm_password = md5(trim($req->registerConfirmPassword));
            $date = Carbon::now();
            // dd($name, $phone, $password);
            $check_user = UserRegister::where('email', '=', $email)->first();
            if ($check_user) {
                return response()->json(['message' => 'already_register']);
            }
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
                        $new_person = UserRegister::latest()->limit(1)->first();
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
    // user verify email functionality
    public function verifyMail(Request $req)
    {
        try {
            $id = $req->input('code');
            $user_register = UserRegister::where('user_register_id', $id)->first();
            if (!$user_register) {
                Alert::info("Info", "User not registered with us!");
                return redirect()->route('home')->with(['message' => 'User not registered with us!']);
            }
            $now = Carbon::now()->format('Y-m-d H:i:s');
            $user_register->update(['email_verify' => $now]);
            Alert::success('Success', 'Email updated successfully!');
            return redirect()->route('home')->with(['message' => 'Email updated successfully!']);
        } catch (Exception $e) {
            Alert::info("Info", "Email not verify!");
            return $e->getMessage();
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

            $email = trim($req->loginEmail);
            $pass = trim($req->loginPassword);

            $password = md5($pass);
            $check_user = UserRegister::where('email', $email)->first();

            if (!$check_user) {
                Alert::warning('OOPS', 'User not registered with us!');
                // return response()->json(['message' => 'user_not_found']);
                return back();
            }

            $user_password = $check_user->password;
            $user_email_verify = $check_user->email_verify;
            $user_register_id = $check_user->user_register_id;

            if (!$user_email_verify) {
                Alert::warning('OOPS', 'Email not verified!');
                // return response()->json(['message' => 'email_verify']);
                return back();
            }

            if ($password !== $user_password) {
                Alert::warning('OOPS', 'Wrong Password!');
                // return response()->json(['message' => 'password_not_matched']);
                return back();
            }

            $req->session()->put('isUser', true);
            $req->session()->put('user_id', $user_register_id);
            Alert::success('Success Title', 'User successfully logged in!');
            return redirect()->route('dashboard');
            // return response()->json(['message' => 'logged_in', 'redirect_url' => route('user.dashboard')]);
        }
    }
    // forgot password mail sent
    public function forgotPassword(Request $req)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $req->validate([
                'email' => 'required|email',
            ]);

            $is_user = UserRegister::where('email', $data['email'])->first();
            if (!$is_user) {
                // Alert::info("Info", "User not registered with us!");
                return response()->json(['message' => 'error']);
            }

            Mail::to($data['email'])->send(new ForgotPasswordMail($is_user));
            // Alert::success('success', 'Forgot password mail send successfully!');
            return response()->json(['message' => 'success']);
        }
    }
    // reset password page
    public function resetPassword(Request $req)
    {
        $user = UserRegister::where('user_register_id', $req->input('token'))->first();
        return view('resetPassword', ['user' => $user]);
    }
    // reset password function handler
    public function resetPasswordPost(Request $req)
    {
        $data = $req->validate([
            'id' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'cPassword' => 'required|same:password',
        ]);
        // dd($data);

        $is_user = UserRegister::where('user_register_id', $data['id'])
            ->where('email', $data['email'])
            ->first();
        if (!$is_user) {
            Alert::info('Info', 'User not registered with us!');
            return redirect()->route('home');
        }
        $password = md5($data['password']);
        if ($is_user->password === $password) {
            Alert::info('Info', 'Does not use last password!');
            return redirect()->back();
        }
        $is_user->update(['password' => $password]);
        Alert::success('Success', 'Password updated successfully!');
        return redirect()->route('home');
    }
    // logout
    public function logout(Request $req)
    {
        $req->session()->flush();
        Auth::logout();
        Alert::success('Success', 'Logged out Successfully', 3500);
        return redirect('/');
    }
}
