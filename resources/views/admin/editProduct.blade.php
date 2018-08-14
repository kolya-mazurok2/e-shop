@extends('layouts.admin')

@section('body')

    <div class="table-responsive">

        <form action="/admin/products/update/{{ $product->id }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $product->description }}" >
            </div>

            <div class="form-group">
                <label for="name">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label for="name">Type</label>
                <input type="text" class="form-control" name="type" placeholder="Type" value="{{ $product->type }}" required>
            </div>

            <button type="sumbit" name="submit" class="btn btn-default">Submit</button>

        </form>

    </div>

@endsection

@section('sidebar')
    <ul class="nav">
        <!-- Main menu -->
        <li><a href="{{ route('admin') }}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
        <li><a href="{{ route('adminProducts') }}"><i class="glyphicon glyphicon-calendar"></i> Products</a></li>
    </ul>
@endsection