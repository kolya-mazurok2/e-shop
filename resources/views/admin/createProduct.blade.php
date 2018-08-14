@extends('layouts.admin')

@section('body')

    <div class="table-responsive">

        <form action="{{ route('createProductAction') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>

            <div class="form-group">
                <label for="image">Update image</label>
                <input type="file" name="image" id="image" placeholder="Image" required>
            </div>

            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description">
            </div>

            <div class="form-group">
                <label for="name">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" required>
            </div>

            <div class="form-group">
                <label for="name">Type</label>
                <input type="text" class="form-control" name="type" placeholder="Type" required>
            </div>

            <button type="submit" name="submit" class="btn btn-default">Submit</button>

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

@section('top_menu')
    <ul class="nav navbar-nav">
        <li><a href="{{ route('createProduct') }}">Create product</a></li>
    </ul>
@endsection