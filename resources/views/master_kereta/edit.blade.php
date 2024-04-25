@extends('layouts.app')
@section('title', 'Data Kereta')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Edit Data Kereta</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('kereta.update', $kereta->id) }}" autocomplete="off"
                                        id="form-edit-kereta" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama_kereta">Nama Kereta</label>
                                            <input type="text" id="nama_kereta" class="form-control"
                                                placeholder="Masukkan nama kereta" name="nama_kereta" value="{{ $kereta->nama_kereta }}">
                                            @error('nama_kereta')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_kereta" class="col-sm-2 col-form-label">Nomor Kereta</label>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    @foreach ($kereta->nomor_kereta as $nomor)
                                                        <input type="text" class="form-control mb-2" placeholder="Masukkan Nomor Kereta"
                                                            name="nomor_kereta[]" value="{{$nomor}}">
                                                    @endforeach
                                                    @error('nomor_kereta')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-2">
                                                    <a class="btn btn-primary" id="tambah-nomor-kereta"
                                                        onclick="tambahNomorKereta()">
                                                        <i class="material-icons">add</i> Tambah
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-edit-kereta"><i
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
    </div>
    </div>
    </div>
    </div>
    
@endsection

