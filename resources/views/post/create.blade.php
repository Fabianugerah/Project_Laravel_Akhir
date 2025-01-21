@extends('layouts.app')
@section('title', 'Tambah Product')
@section('content')
<div class="wrapper">
    <div class="section-header text-center pt-4">
        <h1 class="fw-bold">Tambah Product</h1>
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

    <form method="POST" action="{{ url('products') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan name...">
        </div>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan stock...">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan Price...">
        </div>
        <button class="btn btn-primary">Submit</button>
        <a href="/products" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection