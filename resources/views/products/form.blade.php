@extends('layouts.index')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<form method="get" action="{{ url('product/update/'.$product->id) }}">
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $product->title }}">
    </div>
</div>
<div class="form-group row">
    <label for="author" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $product->price }}">
    </div>
</div>
<div class="form-group row">
    <label for="category" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
        <select name="category"  class="form-control">
            <option value="Telivision" <?php if($product->categoty == "Telivision"){?>selected <?php } ?>>Telivision</option>
            <option value="Head Phones" <?php if($product->categoty == "Head Phones"){?>selected <?php } ?>>Head Phones</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12 text-right">
    <input type="submit" class="btn btn-secondary" value="Edit">
    </div>
</div>
{{ csrf_field() }}
</form>
@endsection