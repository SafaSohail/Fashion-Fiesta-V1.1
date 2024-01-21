<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Reviews;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "users";
        $users  = User::where('role','user')->get();
        return view('adminPanel.users',compact(
            'title','users'
        ));
    }

    public function approve($id)
    {
        $title = "users";
        $tailor = User::find($id);
        $tailor->update([
            'status' => 'Approved',
        ]);
        $notification = array(
            'message' => "User Approved",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
    
    public function reject($id)
    {
        $title = "users";
        $tailor = User::find($id);
        $tailor->update([
            'status' => 'Blocked',
        ]);
        $notification = array(
            'message' => "User Blocked",
            'alert-type' => 'warning',
        );
        return back()->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:100',
            'email'=>'required|email',
            'role'=>'required',
            'password'=>'required|confirmed|max:200',
            'avatar'=>'file|image|mimes:jpg,jpeg,gif,png',
        ]);
        $imageName = null;
        if($request->hasFile('avatar')){
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move($_SERVER['DOCUMENT_ROOT'] . '/storage/users', $imageName);

        }
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'avatar'=>$imageName
        ]);
        $user->assignRole($request->role);
        $notification =array(
            'message'=>"User has been added!!!",
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    /**
     * Display currently authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $title = "profile";
        $roles = Role::get();
        return view('adminPanel.profile',compact(
            'title','roles'
        ));
    }

    /**
     * update resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'email'=>'required|email',
            'avatar'=>'file|image|mimes:jpg,jpeg,gif,png',
        ]);
        if($request->hasFile('avatar')){
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move($_SERVER['DOCUMENT_ROOT'] . '/storage/users', $imageName);
        }else{
            $imageName = auth()->user()->avatar;
        }
        auth()->user()->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'area'=>$request->area,
            'paymentType'=>$request->paymentType,
            'paymentNumber'=>$request->paymentNumber,
            'cnic'=>$request->cnic,
            'specialization'=>$request->specialization,
            'price'=>$request->price,
            'avatar'=>$imageName,
        ]);
        $notification =array(
            'message'=>"Profile has been updated !!!",
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    /**
     * Update current user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|max:200|confirmed',
        ]);

        if (password_verify($request->old_password,auth()->user()->password)){
            auth()->user()->update(['password'=>Hash::make($request->password)]);
            $notification = array(
                'message'=>"User password updated successfully!!!",
                'alert-type'=>'success'
            );
            $logout = auth()->logout();
            return back()->with($notification,$logout);
        }else{
            $notification = array(
                'message'=>"Old Password do not match!!!",
                'alert-type'=>'danger'
            );
            return back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
            'email'=>'required|email',
            'password'=>'required|confirmed|max:200',
            'avatar'=>'file|image|mimes:jpg,jpeg,gif,png',
        ]);
        $imageName = auth()->user()->avatar;
        if($request->hasFile('avatar')){
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move($_SERVER['DOCUMENT_ROOT'] . '/storage/users', $imageName);
        }
        $user = User::find($request->id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'avatar'=>$imageName
        ]);
        $user->assignRole($request->role);
        $notification =array(
            'message'=>"User has been updated!!!",
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if($user->hasRole('super-admin')){
            $notification=array(
                'message'=>"Super admin cannot be deleted",
                'alert-type'=>'warning',
            );
            return back()->with($notification);
        }
        $user->delete();
        $notification=array(
            'message'=>"User has been deleted",
            'alert-type'=>'warning',
        );
        return back()->with($notification);
    }

    public function showreviews()
    {
        $title = "Reviews";
        $reviews = Review::where('tailorId',auth()->user()->id)->get();
        return view('adminPanel.reviews', compact(
            'title',
            'reviews',
        ));
    }

    public function showFeatures()
    {
        $title = "Features";
        $features = User::find(auth()->user()->id);
        return view('adminPanel.features', compact(
            'title',
            'features',
        ));
    }
    
    public function features(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move($_SERVER['DOCUMENT_ROOT'] . '/storage/users', $imageName);
                $uploadedImages[] = $imageName;
            }
        }

        $user->update([
            'phone' => $request->number,
            'message' => $request->message,
            'pictures' => $uploadedImages,
        ]);
        $notification = array(
            'message' => "Features has been updated",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
}
