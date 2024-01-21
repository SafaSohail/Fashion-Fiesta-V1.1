<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class TailorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "tailors";
        $tailors = User::where('role','tailor')->get();
        return view('adminPanel.tailors', compact(
            'title',
            'tailors'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'area' => 'required|max:100',
            'price' => 'required|max:100',
            'image' => 'file|image|mimes:jpg,jpeg,gif,png',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($_SERVER['DOCUMENT_ROOT'] . '/storage/tailor', $imageName);
        }
        User::create([
            'name' => $request->name,
            'area' => $request->area,
            'price' => $request->price,
            'image' => $imageName,
        ]);
        $notification = array(
            'message' => "Tailor has been added",
            'alert-type' => 'success',
        );
        return back()->with($notification);
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
        $this->validate($request, ['name' => 'required|max:100', 'area' => 'required|max:100', 'price' => 'required|max:100', 'image' => 'file|image|mimes:jpg,jpeg,gif,png',]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($_SERVER['DOCUMENT_ROOT'] . '/storage/tailor', $imageName);
        }
        $tailor = User::find($request->id);
        if ($imageName) {
            $tailor->update([
                'name' => $request->name,
                'area' => $request->area,
                'price' => $request->price,
                'image' => $imageName,
            ]);
        } else {
            $tailor->update([
                'name' => $request->name,
                'area' => $request->area,
                'price' => $request->price,
            ]);
        }
        $notification = array(
            'message' => "Tailor has been updated",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tailor = User::find($request->id);
        $tailor->delete();
        $notification = array(
            'message' => "Tailor has been deleted",
            'alert-type' => 'warning',
        );
        return back()->with($notification);
    }

    public function approveTailor($id)
    {
        $title = "tailors";
        $tailor = User::find($id);
        $tailor->status = 'Approved';
        $tailor->message = '1500';
        $tailor->save();
        $notification = array(
            'message' => "Tailor Approved",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
    
    public function rejectTailor($id)
    {
        $title = "tailors";
        $tailor = User::find($id);        
        $tailor->status = 'Blocked';
        $tailor->message = '0';
        $tailor->save();
        $notification = array(
            'message' => "Tailor Blocked",
            'alert-type' => 'warning',
        );
        return back()->with($notification);
    }
    
    public function processOrder($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'Processing',
        ]);
        $notification = array(
            'message' => "Status Updated",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
    
    public function approveOrder($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'Approved',
            'tailorId' => auth()->user()->id
        ]);
        $notification = array(
            'message' => "Status Updated",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
    
    public function completeOrder($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'Completed',
        ]);
        $notification = array(
            'message' => "Status Updated",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
}
