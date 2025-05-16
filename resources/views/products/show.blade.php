@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Product Information
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Product Details - Left Side -->
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Code:</strong></label>
                            <div class="col-md-8" style="line-height: 35px;">
                                {{ $product->code }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                            <div class="col-md-8" style="line-height: 35px;">
                                {{ $product->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Quantity:</strong></label>
                            <div class="col-md-8" style="line-height: 35px;">
                                {{ $product->quantity }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label>
                            <div class="col-md-8" style="line-height: 35px;">
                                {{ $product->price }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                            <div class="col-md-8" style="line-height: 35px;">
                                {{ $product->description }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Image - Right Side -->
                    <div class="col-md-6">
                        <div class="text-center">
                            @if($product->image && file_exists(public_path('storage/products/' . $product->image)))
                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 400px; width: auto;">
                            @else
                                <img src="{{ asset('storage/products/default-product.jpg') }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 400px; width: auto;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection