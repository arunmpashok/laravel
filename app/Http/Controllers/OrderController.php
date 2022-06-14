<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;


class OrderController extends Controller
{

    ###############################     Add   #######################################
    public  function add()
    {
        $products = Product::get();
        return view('order.create',['products'=> $products]);
    }
    public  function edit($id = '')
    {
        $orderStatus = Order::where('id', intval($id))->first();
        $orderArray['order']['id'] = '';
        $orderArray['order']['customer_name'] = '';
        $orderArray['order']['customer_mobile'] = '';
        $orderArray['order']['product'] = '';
        $orderArray['order']['quantity'] = '';
        $orderArray['order']['all_products'] = Product::get();
        if ($orderStatus) {
            $orderArray['order'] = $orderStatus->toArray();
            $orderArray['order']['all_products'] = Product::get();
        }

        return view('order.edit', $orderArray);
    }
    ###############################     store   #######################################
    public function store(Request $request)
    {

        $order_id = intval($request->get('order_id'));

        if ($order_id == '') {

            $validator = Validator::make($request->all(), [
                'customer_name' => 'required|unique:orders,customer_name,',
                'customer_mobile' => 'required',
                'product' => 'required',
                'quantity' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withInput();
            }
            $order = new order();
        } else {

           
            $order = order::where('id', $order_id)->first();
        }


        $order->customer_name = $request->get('customer_name');
        $order->customer_mobile = intval($request->get('customer_mobile'));
        $order->product = intval($request->get('product'));
        $order->quantity = intval($request->get('quantity'));
        $order->created_at = date('Y-m-d');

        $order->save();
        if ($order_id == '') {


            return redirect('/order/list')->withsuccess('order added successfully');
        } else {


            return redirect('/order/list')->withsuccess('order Updated successfully');
        }
    }
    ###############################     index   #######################################
    public  function index()
    {
        $orders = order::with('products')->get();
        return view('order.list', ['orders' => $orders]);
    }

     ###############################     index   #######################################
     public  function invoice($id)
     {
         $order = order::where('id',intval($id))->with('products')->first();
         return view('order.invoice', ['order' => $order]);
     }

    ###############################     deleteorder   #######################################
    public function delete($id)
    {
        $order = order::where('id', intval($id))->first();
        if ($order) {
            $order->delete();

            return redirect()->back();

        } else
        return redirect()->back();

    }
}
