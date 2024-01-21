<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        $title = "forgot password";
        return view('auth.forgot-password', compact(
            'title'
        ));
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Find the user by email
        $user = User::where('email', $request->email)
            ->where('security_question', $request->security_question)
            ->where('security_answer', $request->security_answer)
            ->first();

        if (!$user) {
            // Handle invalid security question/answer
            return redirect()->back()->withErrors(['security_question' => 'Invalid security question/answer combination']);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Optionally, you can log the user in after resetting the password

        return redirect($this->redirectPath())->with('status', 'Password successfully reset');
    }

    public function showForgetPasswordForm()
    {
        $title = "forgot password";
        return view('auth.forgetPassword', compact(
            'title'
        ));
    }

    public function showResetPasswordForm($token)
    {
        $title = "forgot password";
        return view('auth.forgetPasswordLink', compact(
            'title',
            'token'
        ));
    }

    public function sendResetLinkEmail(Request $request)
    {
        $title = "forgot password";
        $this->validateEmail($request);

        $user = User::where('email', $request->email)
            ->where('security_question', $request->security_question)
            ->where('security_answer', $request->security_answer)
            ->first();

        if (!$user) {
            // Handle invalid security question/answer
            return redirect()->back()->withErrors(['security_question' => 'Invalid security question/answer']);
        } else {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        // Pass the token to the reset password form view
        return view('auth.login', compact(
            'title'
        ));
    }
}
