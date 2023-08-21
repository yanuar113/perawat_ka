@extends('layouts.app')
@section('title', 'Checksheet')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Checksheet</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tambah Data Checksheet</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('checksheet.store') }}" autocomplete="off"
                                        id="form-tambah-checksheet">
                                        {{-- create input with csrf token and bootstrap class --}}
                                        @csrf
                                        <div class="form-group w-25">
                                            <label for="date_time">Tanggal Pemeriksaan</label>
                                            <input type="datetime-local" id="date_time" class="form-control"
                                                name="date_time">
                                            @error('date_time')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kereta">Kereta</label>
                                            <select name="id_kereta" id="id_kereta" class="form-select">
                                                <option value="0">Pilih Kereta</option>
                                                @foreach ($keretas as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_kereta }}</option>
                                                @endforeach
                                            </select>
                                            @error('tipe')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_kereta">No Kereta</label>
                                            <input type="text" id="no_kereta" class="form-control"
                                                placeholder="Masukkan No Kereta" name="no_kereta">
                                            @error('no_kereta')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jam_engine">Jam Engine</label>
                                            <input type="text" id="jam_engine" class="form-control"
                                                placeholder="Masukkan jam engine" name="jam_engine">
                                            @error('jam_engine')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tipe">Tipe Laporan</label>
                                            <select name="tipe" id="tipe" class="form-select">
                                                <option value="">Pilih Tipe Laporan</option>
                                                    <option value="0">Harian</option>
                                                    <option value="1">Bulanan</option>
                                            </select>
                                            @error('tipe')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-tambah-checksheet"><i
                                        class="bi bi-save me-2"></i>
                                    Simpan</button>
                                <a href="{{route('item_checksheet.index')}}" class="btn btn-danger ms-2"><i
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
