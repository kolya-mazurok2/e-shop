@extends('layouts.admin')

@section('body')

    <div class="table-responsive">

        <form action="/admin/products/remove/{{ $product->id }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $product->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $product->description }}" disabled>
            </div>

            <div class="form-group">
                <label for="name">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $product->price }}" disabled>
            </div>

            <div class="form-group">
                <label for="name">Type</label>
                <input type="text" class="form-control" name="type" placeholder="Type" value="{{ $product->type }}" disabled>
            </div>

        </form>

    </div>

@endsection