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
                        <div class="card-header">
                            <h5 class="card-title">Daftar Sparepart Perawatan</h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="alert alert-success alert-style-light" role="alert">
                                    {{ session()->get('status') }}
                                </div>
                            @endif
                            <a href="{{ route('sparepart.create') }}" class="btn btn-primary mb-3"><i
                                    class="material-icons">add</i>Tambah</a>
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Sparepart</th>
                                        <th>Nama Sparepart</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($spareparts as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ $item->nama_sparepart }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td>
                                                <a href="{{route('sparepart.edit', $item)}}" class="btn btn-sm btn-warning">
                                                    <i class="material-icons">edit</i>Edit
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"><i
                                                        class="material-icons">delete</i>Hapus</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
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
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Sparepat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Apakah anda yakin akan menghapus kategori ini?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('sparepart.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
