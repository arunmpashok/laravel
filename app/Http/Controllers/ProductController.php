<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class ProductController extends Controller
{
    public function index() {
        $products = product::all();
        $data = [
            'title' => 'product',
            'products' => $products
        ];
        return view('products.layout', $data);
    }
    public function create(Request $req) {
        $product = new product();
        $product->title = $req->input('title');
        $product->price = $req->input('price');
        $product->category = $req->input('category');
        $product->save();
        return redirect()->back();
    }
    public function update_form($id) {
        $product = product::find($id);
        $data = [
            'title' => 'product',
            'product' => $product
        ];
        return view('products.form', $data);
    }
    public function update($id, Request $req) {
        $product = product::find($id);
        $product->title = $req->input('title');
        $product->price = $req->input('price');
        $product->category = $req->input('category');
        $product->save();
        return redirect('/product');
    }
    public function delete($id) {
        $product = product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
