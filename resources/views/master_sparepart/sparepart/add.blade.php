@extends('layouts.app')
@section('title', 'Data Sparepart')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Sparepart</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tambah Daftar Sparepart</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('sparepart.store') }}" autocomplete="off" id="form-tambah-sparepart">
                                        {{-- create input with csrf token and bootstrap class --}}
                                        @csrf
                                        <div class="form-group w-25">
                                            <label for="id_kategori_sparepart">Kategori Sparepart</label>
                                            <select name="id_kategori_sparepart" id="id_kategori_sparepart" class="form-select">
                                                <option value="0">Pilih Kategori</option>
                                                @foreach ($kategori_spareparts as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori_sparepart')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_sparepart">Nama Sparepart</label>
                                            <input type="text" id="nama_sparepart" class="form-control"
                                                placeholder="Masukkan nama sparepart" name="nama_sparepart">
                                            @error('nama_sparepart')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" id="jumlah" class="form-control"
                                                placeholder="Masukkan jumlah" name="jumlah">
                                            @error('jumlah')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan">Satuan</label>
                                            <input type="text" id="satuan" class="form-control"
                                                placeholder="Masukkan satuan" name="satuan">
                                            @error('satuan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-tambah-sparepart"><i
                                        class="bi bi-save me-2"></i>
                                    Simpan</button>
                                <a href="{{ route('sparepart.index') }}" class="btn btn-danger ms-2"><i
                                        class="bi bi-x-circle me-2"></i>
                                    Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
