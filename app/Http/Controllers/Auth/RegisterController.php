<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->save();

        if ($user->id)
        {
            $email = $user->email;

            $code = bcrypt(md5(time().$email));
            $url = route('user.verify.account',['id' => $user->id,'code' => $code]);

            $user->code_active = $code;
            $user->time_active = Carbon::now();
            $user->save();

            $data = [
                'route' => $url
            ];

            Mail::send('email.verify_account', $data, function($message) use ($email) {
                $message->to($email, 'Eng Me')->subject('Xác nhận tài khoản!');
            });

            return redirect()->route('get.login');
        }
        return redirect()->back();
    }

    public function verifyAccount(Request $request)
    {
        $code = $request->code;
        $id = $request->id;

        $checkUser = User::where([
            'code_active' => $code,
            'id' => $id
        ])->first();

        if (!$checkUser)
        {
            return redirect('/')->with('danger','Xin lỗi! Đường dẫn xác nhận mật khẩu không tồn tại, vui lòng thử lại');
        }

        $checkUser->active = 2;
        $checkUser->save();

        return redirect('/')->with('success','Xác nhận tài khoản thành công!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max      : 255',
            'email'    => 'required|string|email|max: 255|unique: users',
            'password' => 'required|string|min      : 6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
