@extends('layouts.index')

@section('title', 'Create Order')

@section('content')
<h1>Create Order</h1>
<form method="post" action="{{url('order/store')}}">
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Customer name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="customer_name" placeholder="Customer Name" value="">
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Customer Mobile</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" name="customer_mobile" placeholder="customer_mobile">
    </div>
</div>
<div class="form-group row">
    <label for="author" class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" name="quantity" placeholder="quantity">
    </div>
</div>
<div class="form-group row">
    <label for="product" class="col-sm-2 col-form-label">Product</label>
    <div class="col-sm-10">
        <select name="product"  class="form-control">
            <?php foreach($products as $product){ ?>
            <option value="{{$product['id']}}" >{{$product['title']}}</option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12 text-right">
    <input type="submit" class="btn btn-secondary" value="Add">
    </div>
</div>
{{ csrf_field() }}
</form>
@endsection