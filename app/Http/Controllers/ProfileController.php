<?php

namespace App\Http\Controllers;

use App\Mail\UpdatePasswordSendMail;
use App\Models\Product;
use App\Models\UserRegister;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class ProfileController extends Controller
{

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
        $image = $req->file('itemImage');

        $new_name = str_replace([' ', '/'], ['_', '_'], $name);
        Log::info("new name is", ['new_name' => $new_name]);
        $image_name = strtolower($new_name) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $public_path = public_path('assets/products/');
        !is_dir($public_path) && mkdir($public_path, 0777, true);
        $image->move($public_path, $image_name);
        $url = env('APP_URL') . "assets/products/" . $image_name;

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
                Alert::warning("OOPS", "Something have wrong!");
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
        $image = $req->file('itemImage');

        $new_name = str_replace([' ', '/'], ['_', '_'], $name);
        Log::info("new name is", ['new_name' => $new_name]);
        $public_path = public_path('assets/products/');
        !is_dir($public_path) && mkdir($public_path, 0777, true);
        $image_name = strtolower($new_name) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($public_path, $image_name);
        $url = rtrim(env('APP_URL'), '/') . "/assets/products/" . $image_name;
        // dd($url);

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
        if ($_SERVER['Request_METHOD'] == 'POST') {
            $rules = [
                'updatePasswordEmail' => 'required|email',
                'updateCurrentPassword' => 'required|min:8',
                'updateNewPassword' => 'required|min:8|string',
                'confirmNewUpdatedPassword' => 'required|same:updateNewPassword|string',
            ];
            $req->validate($rules);
            $user_id = (int) session('user_id');
            $email = $req->updatePasswordEmail;
            $current_password = md5($req->updateCurrentPassword);
            $update_new_password = md5($req->updateNewPassword);
            $update_new_confirm_password = md5($req->confirmNewUpdatedPassword);
            $date = Carbon::now();
            $formatted_date = $date->format('Y-m-d H:i:s');

            $check_user = UserRegister::where('user_register_id', '=', $user_id)
                ->where('email', '=', $email)
                ->first();
            if (!$check_user) {
                Alert::error("Error", "User not register with us!");
                return redirect()->route('dashboard');
            }
            $old_password = $check_user->password;
            if ($current_password !== $old_password) {
                Alert::error("Error", "Current password is wrong!");
                return redirect()->route('dashboard');
            }
            if ($update_new_password === $old_password) {
                Alert::warning("Warning", "New and Old password are same!");
                return redirect()->route('dashboard');
            }
            try {
                UserRegister::where('user_register_id', '=', $user_id)
                    ->update([
                        'password' => $current_password,
                        'confirm_password' => $update_new_confirm_password,
                        'edited_at' => $formatted_date,
                    ]);
                Mail::to($email)->send(new UpdatePasswordSendMail($check_user));
                Alert::success("Congratulation", "Your password has been updated!", 3500);
                return redirect()->route('dashboard');
            } catch (Exception $e) {
                Alert::warning("Warning", "Something want wrong, mail not send!");
                echo $e->getMessage();
            }
        }
    }
}
