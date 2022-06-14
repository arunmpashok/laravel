@extends('layouts.index')

@section('title', 'Orders')

@section('content')
<h1>Orders</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Order Id</th>
      <th>Customer Name</th>
      <th>Customer Phone</th>
      <th>Net Amount</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
        <tr>
            <th>ODNo{{ $order->id }}</th>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->customer_mobile }}</td>
            <td>{{ ($order->products['price'] * $order->quantity ) }}</td>
            <td>
              {{($order->created_at)?$order->created_at->format('h F Y '):''}}
            </td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                    <button type="button" class="btn btn-secondary" onClick="location.href='{{ url('order/edit/'.$order->id) }}'">
                        Update
                    </button>
                    <button type="button" class="btn btn-secondary" onClick="location.href='{{ url('order/delete/'.$order->id) }}'">
                        Delete
                    </button>
                    <button type="button" class="btn btn-secondary" onClick="location.href='{{ url('order/invoice/'.$order->id) }}'">
                      Invoice
                  </button>
                </div>
            </td>
        </tr>
    @endforeach
    
    
  </tbody>
</table>

@endsection