<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;

// use function Ramsey\Uuid\v1;

class adminController extends Controller
{
    public function product(){
        return view('admin.product');
    }

    public function uploadproduct(Request $request)
    {

        $data = new product;
        $image = $request->file;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imageName);
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->des;
        $data->quantity = $request->qty;

        $data->save();

        return redirect()->back()->with('message','Product Added Successfully');


    }


    public function showproduct()
    {
        $data = product::all();
        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {
        $data =  product::find($id);
        $data->delete();

        return redirect()->back()->with('message','Product deleted Successfully');
    }

    public function updateview($id)
    {
        $data =  product::find($id);
      

        return view('admin.updateview',compact('data'));
    }

    public function updateproduct(Request $request, $id)
    {
        $data =  product::find($id);
        
        $image = $request->file;
        if($image)
        {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imageName);
        $data->image = $imageName;
        }
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->des;
        $data->quantity = $request->qty;

        $data->save();

        return redirect()->back()->with('message','Product updated Successfully');
    }

}
