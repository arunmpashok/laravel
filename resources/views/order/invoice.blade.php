@extends('layouts.index')

@section('title', 'Invoice')

@section('content')
<h1>Invoice</h1>
<table class="table table-hover">
    <tr>
        <th>Order Id</th>
        <td>ODNo{{$order['id']}}</td>
    <tr>
        <th>Product</th>
        <td>1.{{$order['products']['title']}} X {{$order['quantity']}}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{$order['quantity'] * $order['products']['price']}}</td>
    </tr>
</table>

@endsection