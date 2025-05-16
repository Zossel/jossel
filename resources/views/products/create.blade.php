@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
 <div class="col-md-8">
 <div class="card">
 <div class="card-header">
 <div class="float-start">
 Add New Product
 </div>
 <div class="float-end">
 <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
 </div>
 </div>
 <div class="card-body">
 @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif

 <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" id="productForm">
 @csrf
 <div class="mb-3 row">
 <label for="code" class="col-md-4 col-form-label text-md-end text-start">Code</label>
 <div class="col-md-6">
 <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
 @error('code')
 <span class="text-danger">{{ $message }}</span>
 @enderror
 </div>
 </div>
 <div class="mb-3 row">
 <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
 <div class="col-md-6">
 <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
 @error('name')
 <span class="text-danger">{{ $message }}</span>
 @enderror
 </div>
 </div>
 <div class="mb-3 row">
 <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
 <div class="col-md-6">
 <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">
 @error('quantity')
 <span class="text-danger">{{ $message }}</span>
 @enderror
 </div>
 </div>
 <div class="mb-3 row">
 <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
 <div class="col-md-6">
 <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
 @error('price')
 <span class="text-danger">{{ $message }}</span>
 @enderror
 </div>
 </div>
 <div class="mb-3 row">
 <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
 <div class="col-md-6">
 <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
 @error('description')
 <span class="text-danger">{{ $message }}</span>
 @enderror
 </div>
 </div>
 <div class="mb-3 row">
 <label for="image" class="col-md-4 col-form-label text-md-end text-start">Product Image</label>
 <div class="col-md-6">
 <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="previewImage(this)">
 @error('image')
 <span class="text-danger">{{ $message }}</span>
 @enderror
 <div id="imagePreview" class="mt-2" style="display: none;">
 <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px;">
 </div>
 </div>
 <div class="mb-3 row">
 <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
 </div>
 </form>
 </div>
 </div>
 </div> 
</div>

@push('scripts')
<script>
    // Store the file input value in sessionStorage when a file is selected
    document.getElementById('image').addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                sessionStorage.setItem('selectedFile', e.target.result);
                sessionStorage.setItem('selectedFileName', this.files[0].name);
            }.bind(this);
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Restore the file input value when the page loads
    window.addEventListener('load', function() {
        const selectedFile = sessionStorage.getItem('selectedFile');
        const selectedFileName = sessionStorage.getItem('selectedFileName');
        
        if (selectedFile && selectedFileName) {
            const fileInput = document.getElementById('image');
            const preview = document.getElementById('preview');
            const previewDiv = document.getElementById('imagePreview');
            
            // Show preview
            preview.src = selectedFile;
            previewDiv.style.display = 'block';
            
            // Create a new file object
            fetch(selectedFile)
                .then(res => res.blob())
                .then(blob => {
                    const file = new File([blob], selectedFileName, { type: blob.type });
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;
                });
        }
    });

    // Clear sessionStorage when form is successfully submitted
    document.getElementById('productForm').addEventListener('submit', function() {
        sessionStorage.removeItem('selectedFile');
        sessionStorage.removeItem('selectedFileName');
    });

    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewDiv = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewDiv.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            previewDiv.style.display = 'none';
        }
    }
</script>
@endpush
@endsection