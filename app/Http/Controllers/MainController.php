<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        $tailors = User::where('role', 'tailor')->where('status', 'Approved')->get();
        $admin = User::where('role', 'admin')->get()->first();
        return view('main.index', compact('tailors', 'admin'));
    }

    public function tailors()
    {
        $tailors = User::where('role', 'tailor')->where('status', 'Approved')->get();
        $admin = User::where('role', 'admin')->get()->first();
        return view('main.category', compact('tailors', 'admin'));
    }

    public function showTailorDesigns($id)
    {
        $wishlist = Wishlist::get();
        $tailor = User::with('tailorReviews')->with('tailorOrders')->find($id);

        $phoneNumber = $tailor->number;
        $message = $tailor->message;
        $encodedMessage = urlencode($message);
        $whatsappUrl = "https://api.whatsapp.com/send?phone={$phoneNumber}&text={$encodedMessage}";
        $admin = User::where('role', 'admin')->get()->first();

        $countCompletedOrders = Order::where('tailorId', $id)
            ->where('status', "Completed")
            ->count();
        return view('main.tailorDesigns', compact('wishlist', 'tailor', 'countCompletedOrders', 'whatsappUrl', 'admin'));
    }

    public function showOrders()
    {
        $orders = Order::where('userId', auth()->user()->id)->where('status', '!=', 'Requested')->get();
        $admin = User::where('role', 'admin')->get()->first();

        return view('main.orders', compact('orders', 'admin'));
    }

    public function reviews($id, Request $request)
    {
        $insert = array(
            'tailorId' => $id,
            'userId' => auth()->user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        );
        Review::insert($insert);
        return back();
    }

    public function about()
    {
        $admin = User::where('role', 'admin')->get()->first();

        return view('main.about', compact('admin'));
    }

    public function contact()
    {
        $admin = User::where('role', 'admin')->get()->first();

        return view('main.contact', compact('admin'));
    }
    

    public function services()
    {
        $admin = User::where('role', 'admin')->get()->first();

        return view('main.services', compact('admin'));
    }

    public function destroy(Request $request)
    {
        Auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('main.index');
    }

    public function addwish($id)
    {
        $insert = array(
            'tailorId' => $id,
            'userId' => Auth()->user()->id,
        );
        $wish = Wishlist::where('tailorId', $id)->where('userId', Auth()->user()->id)->first();
        if (!isset($wish)) {
            Wishlist::insert($insert);
        } else {
            Wishlist::where('tailorId', $id)->where('userId', Auth()->user()->id)->delete();
        }
        return back();
    }

    public function list()
    {
        $wishlists = Wishlist::where('userId', Auth()->user()->id)->with('user')->get();
        $admin = User::where('role', 'admin')->get()->first();
        return view('main.wishlist')->with('wishlists', $wishlists)->with('admin', $admin);
    }
    
    public function addorder()
    {
        $insert = array(
            'userId' => auth()->user()->id,
            'status' => "Requested"
        );

        $orderId = order::insertGetId($insert);
        $admin = User::where('role', 'admin')->get()->first();
        return view('main.thankyou', compact('orderId', 'admin'));
    }


    public function addTailorOrder($id)
    {
        $insert = array(
            'userId' => auth()->user()->id,
            'tailorId' => $id,
            'status' => "Requested"
        );

        $orderId = order::insertGetId($insert);
        $admin = User::where('role', 'admin')->get()->first();
        return view('main.thankyou', compact('orderId', 'admin'));
    }

    public function checkoutPage(Request $request)
    {
        $amount = $request->get('amount');
        $orderId = $request->get('orderId');

        return view('main.checkout', compact('amount', 'orderId'));
    }

    public function processCheckout(Request $request)
    {
        $validatedData = $request->validate([
            'shippingAddress' => 'required',
            'shippingcontact' => 'required',
            'shippingdistrict' => 'required',
            'shippingcity' => 'required',
        ]);

        $orderId = $request->input('orderId');
        $userId = auth()->user()->id;
        $admin = User::where('role', 'admin')->get()->first();

        // Find the order by ID and customer ID
        $order = Order::where('id', $orderId)
            ->where('userId', $userId)
            ->first();

        $imageName = null;
        if ($request->hasFile('sample')) {
            $imageName = time() . '.' . $request->file('sample')->extension();
            $request->file('sample')->move($_SERVER['DOCUMENT_ROOT'] . '/storage/users', $imageName);
        }
        if ($order) {
            // Update the order with the new data
            $updateData = [
                'shippingaddress' => $request->input('shippingAddress'),
                'shippingcontact' => $request->input('shippingcontact'),
                'shippingdistrict' => $request->input('shippingdistrict'),
                'shippingcity' => $request->input('shippingcity'),
                'description' => $request->input('description'),
                'measurements' => $request->input('measurements'),
                'budget' => $request->input('budget'),
                'fabric' => $request->input('fabricType'),
                'image' => $imageName,
                'status' => "Pending",
            ];
            $order->update($updateData);

            return view('main.orderCompleted', compact('orderId', 'admin'));
        } else {
            return redirect()->route('main.orderNotFound');
        }
    }

    public function orderNotFound()
    {
        $admin = User::where('role', 'admin')->get()->first();
        return view('main.order_not_found', 'admin');
    }
}
