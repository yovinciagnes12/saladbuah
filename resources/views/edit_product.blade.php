@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Nama Paket Layanan</label>
                                <input type="text" name="nama_paket_layanan" placeholder="Nama Paket Layanan" class="form-control"
                                    value="{{ $product->nama_paket_layanan }}">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control"
                                    value="{{ $product->deskripsi }}">
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" placeholder="Harga" class="form-control"
                                    value={{ $product->harga }}>
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control"
                                    value={{ $product->stock }}>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection