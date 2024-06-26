@extends('layouts.app')
@section('title', 'Kategori Checksheet')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Kategori Checksheet</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tambah Daftar Kelompok Pekerjaan</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('kategori_checksheet.store') }}" autocomplete="off"
                                        id="form-tambah-kategori">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_kereta">Nama Kereta</label>
                                            <select name="id_kereta" id="id_kereta" class="form-select">
                                                <option value="0">Pilih Kereta</option>
                                                @foreach ($keretas as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_kereta }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kereta')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Kelompok Pekerjaan</label>
                                            <input type="text" id="nama" class="form-control"
                                                placeholder="Masukkan kelompok pekerjaan" name="nama">
                                            @error('nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-tambah-kategori"><i
                                        class="bi bi-save me-2"></i>
                                    Simpan</button>
                                <a href="{{route('kategori_checksheet.index')}}" class="btn btn-danger ms-2"><i
                                        class="bi bi-x-circle me-2"></i>
                                    Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        </div>
    </div>
    </div>
@endsection
