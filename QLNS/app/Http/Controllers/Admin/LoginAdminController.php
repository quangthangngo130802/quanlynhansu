<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Admin;
use App\Models\ChucVu;
use App\Models\HopDong;
use App\Models\NhanVien;
use App\Models\PasswordResetToken;
use App\Models\PhongBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SebastianBergmann\Diff\Chunk;

class LoginAdminController extends Controller
{
    public function formLogin()
    {
        return view('Admin.Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $result = Auth::guard('admin')->attempt($credentials);
        if ($result) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors('The e-mail/password provided is incorrect.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.form');
    }

    public function formRegister()
    {
        return view('Admin.Auth.register');
    }

    public function formDashBoard()
    {
        $totalNV = NhanVien::count();
        $totalHD = HopDong::count();
        $totalPB = PhongBan::count();
        $totalCV = ChucVu::count();

        return view('Admin.DashBoard.dashboard', compact('totalNV', 'totalHD', 'totalPB', 'totalCV'));
    }

    public function forgotPasswordForm(){
        return view('Admin.Auth.forgotpassword');
    }

    public function forgotPassword(Request $request){

        $user = Admin::where('email', $request->email)->first();
        if ($user !== null) {
            $token = Str::random(50);
           // dd($token);
            $tokenData = [
                'token' => $token,
                'email' => $request->email
            ];
            if (PasswordResetToken::create($tokenData)) {
                Mail::to($request->email)->send(new ForgotPassword($user, $token));
                return redirect()
                    ->back()->withErrors(['email' => 'Please check email']);
            }
        } else {
            return redirect()
                ->back()->withErrors(['email' => 'Email does not exist']);
        }

    }

    public function resetPasswordForm($token){

        return view('Admin.Auth.ResetPassword', compact('token'));

    }

    public function resetPassword(Request $request){
        $request->validate([
            'password' => 'required',
            'password2' => 'required|same:password'
        ], [
            'password.required' => 'Password may not be empty.',
            'password2.required' => 'Confirm Password may not be empty.',
            'password2.same' => 'Confirm passwords do not match.'

        ]);
        $tokenData = PasswordResetToken::where('token', $request->token)->first();
        if (!$tokenData) {
            return redirect()->back()->withErrors(['email' => 'Invalid password reset token']);
        }
        $user = $tokenData->user;  // hàm ->user ở trong Model

        $data = [
            'password' => bcrypt($request->password)
        ];
        $check = $user->update($data);
        PasswordResetToken::destroy($tokenData->id);

        if ($check) {
            return redirect()->route('admin.login.form');
        }
        return redirect()
            ->back()->withErrors(['email' => 'Invalid username or password']);

    }
}
