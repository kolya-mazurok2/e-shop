@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{!! Auth::user()->name !!}</p>
                    <p>{!! Auth::user()->email !!}</p>

                        <a href="{{ route('allProducts') }}" class="btn btn-warning">Main Website</a>

                        @if(Auth)
                        <a href="{{ route('admin') }}" class="btn btn-primary">Admin Dashboard</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
