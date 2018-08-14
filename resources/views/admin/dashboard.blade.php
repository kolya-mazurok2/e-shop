@extends('layouts.admin')

@section('sidebar')
    <ul class="nav">
        <!-- Main menu -->
        <li class="current"><a href="{{ route('admin') }}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
        <li><a href="{{ route('adminProducts') }}"><i class="glyphicon glyphicon-calendar"></i> Products</a></li>
    </ul>
@endsection

@section('body')

    <h2>Main admin page</h2>

@endsection