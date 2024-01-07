<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\LoginMail;
use App\Mail\UpdatePasswordSendMail;
use App\Models\ContactModel;
use App\Models\Product;
use App\Models\UserRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

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
            $password = md5(trim($req->registerPassword));
            $confirm_password = md5(trim($req->registerConfirmPassword));
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

            $email = trim($req->loginEmail);
            $pass = trim($req->loginPassword);

            $password = md5($pass);
            $check_user = UserRegister::where('email', $email)->get();

            if (count($check_user) > 0) {
                $user_password = $check_user[0]->password;
                $user_email_verify = $check_user[0]->email_verify;
                $user_register_id = $check_user[0]->user_register_id;
                if ($user_email_verify === "yes") {
                    if ($password == $user_password) {
                        $req->session()->put('isUser', true);
                        $req->session()->put('user_id', $user_register_id);
                        Alert::success('Success Title', 'User successfully logged in!');
                        return redirect('user/dashboard');
                        // return response()->json(['message' => 'logged_in', 'redirect_url' => route('user.dashboard')]);
                    } else {
                        Alert::warning('Sorry', 'Wrong Password!');
                        // return response()->json(['message' => 'password_not_matched']);
                        return back();
                    }
                } else {
                    Alert::warning('Sorry', 'Email not verified!');
                    // return response()->json(['message' => 'email_verify']);
                    return back();
                }
            } else {
                Alert::warning('Sorry', 'User not registered with us!');
                // return response()->json(['message' => 'user_not_found']);
                return back();
            }
        }
    }
    // logout
    public function logout(Request $req)
    {
        $req->session()->flush();
        Auth::logout();
        Alert::success('Success', 'Logged out Successfully', 3500);
        return redirect('/');
    }
    // logged user dashboard
    public function userDashboard()
    {
        if (session()->has('isUser')) {
            $id = session('user_id');
            $products = Product::where('user_id', '=', $id)->get();
            return view('logged_user.dashboard', ['products' => $products]);
        } else {
            return view('project');
        }
    }
    // list of items page
    public function itemsList()
    {
        $user_id = session('user_id');
        $product_list = Product::where('user_id', '=', $user_id)->orderBy('product_id', 'DESC')->get();
        return view('logged_user.item-list', ['product_lists' => $product_list]);
    }
    // logged user add items page
    public function addItems()
    {
        return view('logged_user.add-items');
    }
    // logged user show product content
    public function loggedUserShowProductContent(Request $req)
    {
        $user_id = session('user_id');
        $product_id = $req->product_id;
        $product = Product::where('product_id', '=', $product_id)->where('user_id', '=', $user_id)->first();
        return response()->json(['product' => $product]);
    }
    // store items functionality
    public function storeItems(Request $req)
    {
        $rules = [
            'itemName' => 'required',
            'itemPrice' => 'required',
            'itemImage' => 'required:mimes:jpg,jpeg,png',
            'itemDescription' => 'required',
        ];
        $req->validate($rules);

        $name = $req->itemName;
        $price = $req->itemPrice;
        $image = $req->itemImage;
        $image_name = $name . '-' . time() . '.' . $image->getClientOriginalExtension();
        $public_path = public_path('assets/products/');
        !is_dir($public_path) && mkdir($public_path);
        $image->move($public_path, $image_name);
        $url = "http://127.0.0.1:8000/assets/products/" . $image_name;

        $description = $req->itemDescription;
        $user_id = session('user_id');
        $date = Carbon::now();
        $formatted_date = $date->format('Y-m-d H:i:s');

        try {
            $new_product = new Product;
            $new_product->name = $name;
            $new_product->price = $price;
            $new_product->image = $url;
            $new_product->description = $description;
            $new_product->user_id = $user_id;
            $new_product->added_at = $formatted_date;
            if ($new_product->save()) {
                Alert::success('Congratulation', 'Product added successfully!');
                return redirect('user/item-list');
            } else {
                AlertLog::warning("sorry", "Something have wrong!");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    // logged user edit items page
    public function editItems(Request $req)
    {
        $user_id = session('user_id');
        $product_id = $req->product_id;
        $product = Product::where('user_id', '=', $user_id)->where('product_id', '=', $product_id)->first();
        return view('logged_user.edit-item', ['product' => $product]);
    }
    public function updateItems(Request $req)
    {
        $user_id = session('user_id');
        $product_id = $req->editItemProductId;

        $rules = [
            'itemName' => 'required',
            'itemPrice' => 'required',
            'itemImage' => 'required|mimes:jpg,jpeg,png',
            'itemDescription' => 'required',
        ];
        $req->validate($rules);

        $name = $req->itemName;
        $price = $req->itemPrice;
        $image = $req->itemImage;

        $public_path = public_path('assets/products/');
        !is_dir($public_path) && mkdir($public_path);
        $image_name = $name . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($public_path, $image_name);
        $url = "http://127.0.0.1:8000/assets/products/" . $image_name;

        $description = $req->itemDescription;
        $date = Carbon::now();
        $formatted_date = $date->format('Y-m-d');

        Product::where('product_id', '=', $product_id)->where('user_id', '=', $user_id)
            ->update([
                'name' => $name,
                'price' => $price,
                'image' => $url,
                'description' => $description,
                'edited_at' => $formatted_date,
            ]);
        Alert::success('Congratulation', 'Product updated successfully!');
        return redirect('user/item-list');
    }
    // logged user delete items
    public function deleteItems(Request $req)
    {
        $user_id = session('user_id');
        $product_id = $req->product_id;

        $delete_product = Product::where('product_id', '=', $product_id)
            ->where('user_id', '=', $user_id)
            ->delete();
        Alert::success('Thank you', 'Product successfully deleted!');
        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete product?";
        // confirmDelete($title, $text);
        return back();
    }
    // restore deleted product
    public function restoreItems()
    {
        $user_id = session('user_id');
        Product::where('user_id', '=', $user_id)->withTrashed()->restore();
        return back();
    }
    // updatePasswordSendMail function
    public function updatePasswordSendMail(Request $req)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rules = [
                'updatePasswordEmail' => 'required|email',
                'updateCurrentPassword' => 'required|min:8',
                'updateNewPassword' => 'required|min:8|string',
                'confirmNewUpdatedPassword' => 'required|same:updateNewPassword|string',
            ];
            $req->validate($rules);
            $user_id = session('user_id');
            $email = $req->updatePasswordEmail;
            $current_password = md5($req->updateCurrentPassword);
            $update_new_password = md5($req->updateNewPassword);
            $update_new_confirm_password = md5($req->confirmNewUpdatedPassword);
            $date = Carbon::now();
            $formatted_date = $date->format('Y-m-d H:i:s');

            $check_user = UserRegister::where('user_register_id', '=', $user_id)->where('email', '=', $email)->get();
            if (count($check_user) > 0) {
                $old_password = $check_user[0]->password;
                if ($current_password === $old_password) {
                    if ($update_new_password === $old_password) {
                        Alert::warning("Warning", "New and Old password are same!");
                        return redirect('user/dashboard');
                    } else {
                        $password_updated = UserRegister::where('user_register_id', '=', $user_id)->where('email', '=', $email)
                            ->update([
                                'password' => $current_password,
                                'confirm_password' => $update_new_confirm_password,
                                'edited_at' => $formatted_date,
                            ]);
                        try {
                            if ($password_updated) {
                                Mail::to($email)->send(new UpdatePasswordSendMail());
                                Alert::success("Congratulation", "Your password has been updated!", 3500);
                                return redirect('user/dashboard');
                            } else {
                                Alert::warning("Warning", "Something want wrong, mail not send!");
                                return redirect('user/dashboard');
                            }
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                    }
                } else {
                    Alert::error("Error", "Current password is wrong!");
                    return redirect('user/dashboard');
                }
            } else {
                Alert::error("Error", "User not register with us!");
                return redirect('user/dashboard');
            }
        }
    }
}
