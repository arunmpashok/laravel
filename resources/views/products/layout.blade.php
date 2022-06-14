@extends('layouts.index')

@section('title', 'Product Management')

@section('content')
<h1>Product Management</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Price</th>
      <th>Category</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>
            <td>
              {{ $product->category }}
            </td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                    <button type="button" class="btn btn-secondary" onClick="location.href='{{ url('product/edit/'.$product->id) }}'">
                        Update
                    </button>
                    <button type="button" class="btn btn-secondary" onClick="location.href='{{ url('product/delete/'.$product->id) }}'">
                        Delete
                    </button>
                </div>
            </td>
        </tr>
    @endforeach
    <form method="post" action="{{ url('product/create') }}">
        <tr>
            <th>#</th>
            <td><input type="text" class="form-control" name="title" placeholder="Title" required></td>
            <td>
              <select name="category" class="form-control">
                <option value="">select</option>
                <option value="Telivision">Telivision</option>
                <option value="Head Phones">Head Phones</option>
              </select>
            </td>
            <td><input type="number" class="form-control" name="price" placeholder="price"></td>
            <td>
            {{ csrf_field() }}
            <input type="submit" class="btn btn-secondary" value="Add New">
            </td>
        </tr>
    </form>
    
  </tbody>
</table>
<button type="button" class="btn btn-secondary" onClick="location.href='{{ url('order/actions') }}'">
  Create a New Order
</button>
<button type="button" class="btn btn-secondary" onClick="location.href='{{ url('order/list') }}'">
 List  Orders
</button>
@endsection