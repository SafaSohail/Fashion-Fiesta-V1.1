<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sales;
use App\Models\Setting;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Notifications\StockAlert;
use App\Events\ProductReachedLowStock;

class DashboardController extends Controller
{
    public function index(){   
        $title = "dashboard";
        
        $total_tailors = User::where('role', 'tailor')->count();
        $orders = Order::where('status', '!=', 'Requested')->count();
        if(auth()->user()->role=='tailor'){
            $admin=User::where('role','admin')->get()->first();
            $phoneNumber=$admin->phone;
            $whatsappUrl = "https://api.whatsapp.com/send?phone={$phoneNumber}";

            return view('adminPanel.dashboard',compact(
                'title','orders','total_tailors','whatsappUrl'
            ));
        }
        return view('adminPanel.dashboard',compact(
            'title','orders','total_tailors'
        ));
    }

    public function orders(){   
        $title = "orders";
        if(auth()->user()->role=='admin'){
            $orders = Order::with('user','tailor')->where('status','!=','Pending')->where('status','!=','Requested')->get();
        }else{
            $orders = Order::with('user','tailor')->where('tailorId',auth()->user()->id)->get();
        }
        $newOrders = Order::with('user', 'tailor')->where('status', 'Pending')->whereNull('tailorId')->get();
        return view('adminPanel.orders',compact(
            'title','orders','newOrders'
        ));
    }
}
