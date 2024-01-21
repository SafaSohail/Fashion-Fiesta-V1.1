<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $title = "register";
        return view('auth.register', compact(
            'title',
        ));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required|max:200|confirmed',
        ]);

        if ($request->role != '0') {
            $role = $request->role;
        } else {
            $title = "register";
            return view('auth.register', compact(
                'title',
            ));
        }
        if($role=='tailor'){
            $status='Pending';
        }else{
            $status='';
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'security_question' => $request->security_question,
            'security_answer' => $request->security_answer,
            'password' => Hash::make($request->password),
            'role' => $role,
            'status' => $status,
        ]);
        auth()->attempt($request->only('email', 'password'));
        
        if (auth()->user()->role == 'user') {
            return redirect()->route('main.index');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
}
