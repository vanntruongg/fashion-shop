<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return view('pages.login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'empty-username' => 'Vui long nhap tai khoan',
            'empty-password' => 'Vui long nhap mat khau',
        ]);

        $username = $request->username;
        $password = $request->password;
        $user = User::where('email', $username)->orWhere('ND_SDT', $username)->first();

        if($user) {
            if(Auth::attempt(['email' => $username,'password' => $password]) || Auth::attempt(['ND_SDT' => $username, 'password' => $password])) {
                Auth::login($user);
                if($user->ND_VT == 1)
                    return redirect()->route('admin-dashboard');
                else 
                    return redirect()->route('home');
            } else {
                session()->flash('incorrect-password', 'Sai mat khau');
                return redirect()->route('login');
            }
        } else {
            session()->flash('invalid-username', 'Tai khoan khong ton tai');
            return redirect()->route('login');
        }
        //dd($request->all());
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function registerview() {
        return view('pages.register');
    }

    public function register(Request $request) {
        $request->validate([
            'phone' => 'required|regex:/^0[3,5,7,9][0-9]{8,9}$/',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:16',
        ], [
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Vui lòng nhập đúng định dạng',
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất phải 8 ký tự',
            'password.required' => 'Mật khẩu tối đa 16 ký tự',

        ]);

        $name = explode(" ",$request->input('name'));
        
        $firstname = $name[0];
        $lastname = "";
        foreach($name as $key => $val) {
            if($key > 0) {
                $lastname = $lastname . " " . $val;
            }
        }
        
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = bcrypt($request->input('password'));

        $userEmail = User::Where('email', $email)->first(); 
        $userPhone = User::Where('email', $phone)->first();
        
        if($userPhone) {
            session()-flash('already-phone', 'Số điện thoại đã được sử dụng');
            return redirect()->route('register');
        }

        if($userEmail) {
            session()-flash('already-email', 'Email đã được sử dụng');
            return redirect()->route('register');
        }

        $user = User::create([
            'ND_SDT' => $phone,
            'email' => $email,
            'password' => $password,
            'ND_Ho' => $firstname,
            'ND_Ten' => $lastname
        ]);

        return redirect()->route('login');


    }
}
