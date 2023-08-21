@extends('layouts.app')
@section('title', 'Data Kereta')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Kereta Perawatan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tambah Daftar Kereta</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('kereta.store') }}" autocomplete="off"
                                        id="form-tambah-kereta" enctype="multipart/form-data">
                                        {{-- create input with csrf token and bootstrap class --}}
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_kereta">Nama Kereta</label>
                                            <input type="text" id="nama_kereta" class="form-control" placeholder="Masukkan nama kereta"
                                                name="nama_kereta">
                                            @error('nama_kereta')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" class="form-control" placeholder="Masukkan username"
                                                name="username">
                                            @error('username')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" id="password" class="form-control" placeholder="Masukkan password"
                                                name="password">
                                                {{-- create hash password --}}
                                            @error('password')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" id="foto" class="form-control" placeholder="Masukkan foto"
                                                name="foto">
                                            @error('foto')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-tambah-kereta"><i
                                        class="bi bi-save me-2"></i>
                                    Simpan</button>
                                <a href="{{ route('kereta.index') }}" class="btn btn-danger ms-2"><i
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
