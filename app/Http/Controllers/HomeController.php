<?php
namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        // echo $usertype;
        if($usertype == '1'){
            return view('admin.home');
        }else{
            $data = product::paginate(3);

            $user = Auth()->user();
            $count = cart::where('phone',$user->phone)->count();

            return view('user.home',compact('data','count'));
    
        }


    }


    public function index(){
        if(Auth::id())
        return redirect('redirect');
        else{
            $data = product::paginate(3);
            return view('user.home',compact('data'));
        }
       
    }


    public function search(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $data = product::paginate(3);
            return view('user.home',compact('data'));
        }
        $data = product::where('title','like','%'.$search.'%')->get();

        return view('user.home',compact('data'));
    }

    public function addcart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user = Auth()->user();
            $cart = new cart;
            $product = product::find($id);

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;

            $cart->save();


            return redirect()->back()->with('message','Cart Added Successfully');
            
        }
        else{
            return redirect('login');
        }

    }

    public function showcart()
    {
        $user = Auth()->user();
        $count = cart::where('phone',$user->phone)->count();
        $cart = cart::where('phone',$user->phone)->get();

        return view('user.showcart',compact('count','cart'));
    }

    public function deletecart($id)
    {
        $data = cart::find($id);

        $data->delete();

        return redirect()->back()->with('message','Cart deleted Successfully');

    }



    public function confirmOrder(Request $request)
    {
        
        $user = Auth()->user();
       

        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;

    foreach($request->product_name as $key=>$productName)
      {
       $order = new order;

       $order->name= $name;
       $order->phone =$phone;
       $order->address = $address;

      $order->product_title = $request->productName[$key];
       $order->price = $request->price[$key];
       $order->quantity = $request->quantity[$key];
       $order->status = 'not delevered';

      

       $order->save();
      }

    //   DB::table('carts')->where('phone',$cart->phone)->delete();
      return redirect()->back()->with('message','Product orderd Successfully');

    }
    
}
