@extends('layouts.app')
@section('title', 'Semua Product')
@section('content')
<div class="wrapper">
    <div class="section-header text-center pt-4">
        <h1 class="fw-bold">Semua Product</h1>
        <hr class="custom-hr">
    </div>
    @if (session('success'))
    <div class="alert-success">
        <p>{{ session("success") }}</p>
    </div>
    @endif
    <a href="/products/create" class="btn btn-outline-success mb-3">
        <i class="bi bi-plus-circle"> Tambah</i>
    </a>
    <table border="1" class="table table-striped table-bordered shadow-lg text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Stock</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td style="width: 100px">{{ $product->id}}</td>
                <td style="width: 300px">{{ $product->name}}</td>
                <td style="width: 200px">{{ $product->stock}}</td>
                <td style="width: 400px">Rp{{ number_format($product->price, 0, ',', '.') }}</td>

                <td style="width: 100px"><a href="{{ route('products.edit', $product->id) }}"><button
                            class="btn btn-warning">
                            <i class="bi bi-pencil-square"> Edit</i></button></a></td>

                <!-- Tombol Hapus -->
                <td style="width: 110px">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                    <i class="bi bi-trash3-fill"> Hapus</i>
                    </button>
                </td>
            </tr>
             <!-- Modal Konfirmasi Hapus -->
             <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="deleteModalLabel{{ $product->id }}">Konfirmasi Hapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus product ini?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="{{ url('products', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection