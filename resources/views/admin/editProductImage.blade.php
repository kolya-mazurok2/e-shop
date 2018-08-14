@extends('layouts.admin')

@section('body')

    <div class="table-responsive">

        @if($errors->any())

            <div class="alert alert-danger">
                <ul>
                    <li>{!! print_r($errors->all()) !!}</li>
                </ul>
            </div>

        @endif

    </div>

    <h3>Current image</h3>
    <div><img src="{{asset('storage')}}/product_images/{{$product['image']}}" width="200" height="200"></div>

    <form action="/admin/products/updateImage/{{ $product->id }}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="image">Update image</label>
            <input type="file" name="image" id="image" placeholder="Image" value="{{$product->image}}" required>
        </div>

        <button type="submit" name="submit" class="btn btn-default">Submit</button>

    </form>

@endsection

@section('sidebar')
    <ul class="nav">
        <!-- Main menu -->
        <li><a href="{{ route('admin') }}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
        <li><a href="{{ route('adminProducts') }}"><i class="glyphicon glyphicon-calendar"></i> Products</a></li>
    </ul>
@endsection