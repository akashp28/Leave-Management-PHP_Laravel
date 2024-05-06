<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class NewController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function register()
    {
        return view('register');
    }
    public function saveuser()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:30',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:8|min:4|unique:users,username',
            'password' => 'required|string|min:4|max:8',
            'mobno' => 'required|digits:10',
            'designation' => 'required|string|max:30',
            'image' => 'required|image|mimes:jpeg,png,jpg',

        ]);
        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }
        $input = [
            'name' => request('name'),
            'dob' => request('dob'),
            'email' => request('email'),
            'username' => request('username'),
            'password' => bcrypt(request('password')),
            'designation' => request('designation'),
            'mob_no' => request('mobno'),
            'role' => 'user',
        ];
        if (request()->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'user_pic_' . time() . '.' . $extension;
            request('image')->storeAs('images', $fileName);
            $input['image'] = $fileName;
        }

        $user = User::create($input);

        return redirect()->route('register')
            ->with('message', 'User Registered Successfully..!');
    }
    public function userLogin()
    {
        return view('userLogin');
    }
    public function adminLogin()
    {
        return view('adminLogin');
    }

    public function doUserLogin()
    {
        $input = ['username' => request('username'), 'password' => request('password')];
        if (auth()->attempt($input)) {
            $username = request('username');
            $user = User::where('username', $username)->first();
            if ($user->status == 'active') {
                return redirect()->route('user.home', compact('username'));
            } else {
                auth()->logout();
                return redirect()->route('user.login')->with('message', 'User Disabled by Admin..!');
            }

        } else {
            return redirect()->route('user.login')->with('message', 'Login Invalid..!');
        }

    }

    public function userLogout()
    {
        auth()->logout();
        return redirect()->route('user.login')->with('message', 'Logout Success..!');
    }
    public function userHome($username)
    {
        $user = User::where('username', $username)->first();
        return view('userhome', compact('user'));
    }

    public function doAdminlogin()
    {
        $input = ['username' => request('username'), 'password' => request('password')];
        $username = request('username');
        if (auth()->attempt($input)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.home', compact('username'));
            } else {
                return redirect()->route('admin.login')->with('message', 'Login Invalid..! Only Admin can Access..!');
            }
        } else {
            return redirect()->route('admin.login')->with('message', 'Login Invalid..!');
        }
    }

    public function adminHome()
    {
        $userCount = User::count();
        $leaveCount = Leave::count();
        return view('adminHome', compact('userCount', 'leaveCount'));
    }

    public function adminLogout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('message', 'Logout Success..!');
    }
    public function userList()
    {

        $users = User::all();
        return view('userlist', compact('users'));
    }

    public function changeUserStatus(User $user)
    {
        $user->status = ($user->status === 'active') ? 'inactive' : 'active';
        $user->save();
        return redirect()->route('user.list')->with('message', 'User Status Changed Successfully..!');
    }

    public function deleteUser($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
        return redirect()->route('user.list')->with('message', 'User Deleted Successfully..!');
    }

    public function leaveList()
    {
        return view('leavelist');
    }

    public function PasswordForm($id)
    {
        $user = User::find($id);
        return view('changepassword', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4|max:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current Password is Incorrect..!');
        }

        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return redirect()->route('password.form', ['userid' => $user->id])->with('message', 'Password changed Successfully..!');
    }

    public function forgotPassword()
    {
        return view('forgotpassword');
    }

    public function doforgotPassword()
    {
        $user = User::where('email', request('email'))->first();
        if ($user) {
            $token = Str::random(120);
            $user->update(['password_reset_token' => $token]);
            Mail::to(request('email'))->send(new PasswordResetMail($user, $token));
            return redirect()->back()->with('message', 'Please Check your mail for Password Reset Link..!');
        } else {
            return redirect()->back()->with('message', 'Invalid Email Address..!');
        }
    }

    public function resetPassword($token)
    {
        $user = User::where('password_reset_token', $token)->first();
        if ($user) {
            $user->update(['password_reset_token' => 'NULL']);
            return view('reset_password', compact('user'));
        } else {
            return redirect()->route('forgot.password')->with('message', 'Invalid Token');
        }

    }

    public function doresetPassword()
    {
        $validator = Validator::make(request()->all(), [

            'password' => 'required|string|min:4|max:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::where('id', decrypt(request('user_id')))->first();
        if ($user) {
            $user->update(
                [
                    'password' => bcrypt(request('password'))
                ]
            );
            return redirect()->route('user.login')->with('message', 'Please Login with your New Password..!');
        } else {
            return redirect()->route('user.login')->with('message', 'Something Went Wrong..!');
        }

    }

}
