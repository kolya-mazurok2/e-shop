@extends('layouts.admin')

@section('body')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Type</th>
                <th>Edit Image</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)

                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td><img width="75" height="75" src="{{ Storage::url('product_images/' . $product['image']) }}"></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['type'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td><a class="btn btn-primary" href="{{ route('editProductImage', ['id' => $product['id']]) }}">Edit Image</a></td>
                    <td><a class="btn btn-primary" href="{{ route('editProduct', ['id' => $product['id']]) }}">Edit</a></td>
                    <td><a class="btn btn-warning" href="{{ route('removeProduct', ['id' => $product['id']]) }}">Remove</a></td>
                </tr>

            @endforeach

            </tbody>
        </table>

        {{ $products->links() }}

    </div>

@endsection

@section('sidebar')
    <ul class="nav">
        <!-- Main menu -->
        <li><a href="{{ route('admin') }}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
        <li class="current"><a href="{{ route('adminProducts') }}"><i class="glyphicon glyphicon-calendar"></i> Products</a></li>
    </ul>
@endsection

@section('top_menu')
    <ul class="nav navbar-nav">
        <li><a href="{{ route('createProduct') }}">Create product</a></li>
    </ul>
@endsection