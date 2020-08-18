<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admins\admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\cats;
use App\orders;
use App\products;
class admincontroller extends Controller
{
  
  public function login()
  {
    return view('dashboards.login');
    //  return view('dashboards.login');
  }
 
    public function user()
    {
      return view('dashboards.dashboard');
      //  return view('dashboards.login');
    }
    public function addcat()
    {
      return view('dashboards.addcat');
      //  return view('dashboards.login');
    }
    public function admin()
    {
      return view('dashboards.dashboard');
       // return view('layouts.master');
    }
    public function savecat(Request $request)
    {
      /*
      $request->validate([
        'title'=>'required|max:100',
        'body'=>'required|max:500',
        'coverimage'=>'image|mimes:jpeg,jpg,png,bmp|max:1999'
    ]

    );
    */
    if ($request->hasFile('photo')) {
        $file=$request->file('photo');
        $ext=$file->getClientOriginalExtension();
        $filename="photo_" . time() .".". $ext;
        $path=$file->storeAs('public/photo',$filename);
        
    }
    /*
    $post=new post();
    $post->title=$request->title;
    $post->body=$request->body;
    $post->image=$filename;
    $post->user_id=auth()->user()->id;
    $post->save();
    */
      $cats=new cats();
      $cats->name=$request->name;
      $cats->code=$request->code;
      $cats->photo=$filename;
      $cats->save();
     return redirect()->route('addcat')->with('status','post saved succesfuly');
      
    }
    public function showcat()
    {
      $catt=new cats();
      $cat=$catt::get();
    //  dd($cat);
     return view('dashboards.showcat',compact('cat'));
    }
   
   public function check(Request $request)
    {
     // dd($request);
      $credentials = $request->only('email', 'password');
     //   dd(Auth::guard('web')->attempt($credentials));
      if (Auth::attempt($credentials)) {
          // Authentication passed...
          return redirect()->route('log');
      }
      else
      {
        
        return redirect()->route('login');
      }

    }
    public function checkadmin(Request $request)
    {
   // $admin=new admin();
    $credentials = $request->only('email', 'password');
   //   if(Auth::attempt($credentials)){
    //dd(Auth::attempt($credentials));
   //}
//dd(Auth::attempt($credentials));

    
     // dd(Auth::guard('admins')->attempt( $credentials));
      if (Auth::guards('admins')->attempt($credentials)) {
          // Authentication passed...
        dd(Auth::guards('admins')->attempt($credentials));
          return redirect()->route('log');
      }
      else
      {
       // dd(Auth::guard('admins')->attempt($credentials));
        return redirect()->route('login');
      }

    }
    public function destory($id)
    {
      $cat=cats::find($id);
     // dd($cat);
     $cat->delete();
     return redirect()->route('showcat');

    }
    public function editecat($id)
    {
      $cat=cats::find($id);
      return view('dashboards.editecat',compact('cat'));

    }
    public function updatecat(Request $request,$id)
    {
      if ($request->hasFile('photo')) {
        $file=$request->file('photo');
        $ext=$file->getClientOriginalExtension();
        $filename="photo_" . time() .".". $ext;
        $path=$file->storeAs('public/photo',$filename);
        
    }
      $cat=cats::find($id);
      //dd($cat);
      $cat->name=$request->name;
      $cat->code=$request->code;
      $cat->photo=$filename;
      $cat->save();

return redirect()->route('showcat');


    }
  
    public function add_product()
    {
      $catt=new cats();
      $cat=$catt::get();
     
     // dd($cat);
      return view('dashboards.addproduct',compact('cat'));
    }
    public function save_product(Request $request)
    {
      if ($request->hasFile('photo')) {
        $file=$request->file('photo');
        $ext=$file->getClientOriginalExtension();
        $filename="photo_" . time() .".". $ext;
        $path=$file->storeAs('public/photo',$filename);
        
    }
     // dd($request);
    // return $request;
     
      $product=new products();
      $product->name=$request->name;
      $product->price=$request->price;
      $product->number=$request->number;
      $product->cat_id=$request->cat;
      $product->photo=$filename;
      $product->save();
      return redirect()->route('addproduct')->with('status','post saved succesfuly');
      
    }
    public function show_product(Request $request)
    {
      
      if (isset($request->name)) {
       // $p= products::get();
       // dd($p);
        $product=products::where('name' ,"LIKE","%{$request->name}%")->get();
        return view('dashboards.showproduct',compact('product'));
       // dd($product);
      } else {
        $product=products::get();
       // return($product);
       // $pro=$product->cats;
       //return($pro);
       return view('dashboards.showproduct',compact('product'));
       // dd($product);
      }
      

     
    }
     public function  deletproduct()
     {
      $s=orders::where('number',0)->get();
      $product=products::get();
     
      return view('dashboards.deletproduct',compact('product','s'));
     }
        public function order(Request $request)
       {
         if (isset($_POST['show'])) {
          $product=products::get();
          $s=orders::join('products','orders.product_id','=','products.product_id')->where('orders.number',$request->op)->get();
         // dd($s);
          // $p=orders::where('number', $order->number)->get();
           return view('dashboards.deletproduct',compact('product','s'));

         }
        $product=products::get();
        $cat=$request->cat;
        
        $total=$request->number;
        $pr=products::where('name',$cat)->first();
        
      $order=new orders();
     
      $order->name=$cat;
      $order->number=$request->op;
      $order->n_o_p=$total;
      $order->product_id=$pr['product_id'];
      $order->save();
        
      $s=orders::join('products','orders.product_id','=','products.product_id')->where('orders.number',$request->op)->get();
     
     // $p=orders::where('number', $order->number)->get();
      return view('dashboards.deletproduct',compact('product','s'));

     // dd($p);
       }
       public function maps()
       {
         return view('dashboards.map');
       }
    //
}
