@extends('layouts.app')
@section('title', 'Data Foto')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Foto Checksheet</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Foto Laporan Checksheet</h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="alert alert-success alert-style-light" role="alert">
                                    {{ session()->get('status') }}
                                </div>
                            @endif
                            <div class="table table-responsive">
                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Checksheet Bulan {{ $item->nama_bulan }}</td>
                                                <td>
                                                    <a href="{{ route('photo.print', ['bulan' => $item->month, 'tahun' => $item->year]) }}"
                                                        class="btn btn-sm btn-success mb-1">
                                                        {{-- <a href="" class="btn btn-sm btn-success mb-1"> --}}
                                                        <i class="material-icons">print</i>Cetak
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Apakah anda yakin akan menghapus kategori ini?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                        {{-- <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete') --}}
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
