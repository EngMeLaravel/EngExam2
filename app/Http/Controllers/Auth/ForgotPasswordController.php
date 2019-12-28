<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    public function getFormResetPassword()
    {
        return view('auth.passwords.email');
    }

    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->email;

        $checkUser = User::where('email', $email)->first();

        if (!$checkUser)
        {
            return redirect()->back()->with('danger','Email không tồn tại');
        }

        $code = bcrypt(md5(time().$email));

        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        $url = route('get.link.reset.password',['code' => $checkUser->code, 'email' => $checkUser->email]);

        $data = [
            'route' => $url
        ];

        Mail::send('email.reset_password', $data, function($message) use ($checkUser) {
            $message->to($checkUser->email, 'Laravel Website')->subject('Lấy lại mật khẩu!');
        });

        return redirect()->back()->with('success','Link lấy lại mật khẩu đã vào email của bạn');
    }

    public function resetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;

        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if (!$checkUser)
        {
            return redirect()->with('danger','Xin lỗi! Đường dẫn lấy lại mật khẩu không đúng, vui lòng thử lại');
        }

        return view('auth.passwords.reset', compact('checkUser'));
    }

    public function saveResetPassword(RequestResetPassword $requestResetPassword)
    {
        $code = $requestResetPassword->code;
        $email = $requestResetPassword->email;

        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if (!$checkUser)
        {
            return redirect()->with('danger','Xin lỗi! Đường dẫn lấy lại mật khẩu không đúng, vui lòng thử lại');
        }

        $checkUser->password = bcrypt($requestResetPassword->password);
        $checkUser->save();

        return redirect()->route('get.login')->with('success','Mật khẩu đã được đổi thành công! Mời bạn đăng nhập');
    }
}
