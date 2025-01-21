@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="wrapper">
    <div class="section-header text-center pt-4">
        <h1 class="fw-bold">Edit Product</h1>
        <hr class="custom-hr">
    </div>
    
    <!-- Success -->
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <i class="bi bi-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif
    <!-- Error -->
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   
    <form method="POST" action="{{ url('products', $product->id ) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name" placeholder="Masukkan title..." required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" class="form-control" value="{{ $product->stock }}" id="stock" name="stock" placeholder="Masukkan Notelp..." required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" value="{{ $product->price }}" id="price" name="price" placeholder="Masukkan Pesan..." required>
        </div>
        <button type="submit" class="btn btn-warning">Edit</button>
        <a href="/products" class="btn btn-secondary">Kembali</a> 

</div>
</div>
@endsection