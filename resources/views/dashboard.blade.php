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

                    <h4>Welcome to your Dashboard!</h4>
                    <p>You are logged in.</p>

                    <div class="mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 