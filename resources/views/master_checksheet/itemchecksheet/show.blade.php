@extends('layouts.app')

@section('title', 'Item Checksheet')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Uraian Pekerjaan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daftar Uraian Pekerjaan</h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="alert alert-success alert-style-light" role="alert">
                                    {{ session()->get('status') }}
                                </div>
                            @endif
                            <div class="btn-group mb-3">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Pilih Kereta
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('item_checksheet.index') }}">Semua
                                            Kereta</a></li>
                                    @foreach ($keretas as $item)
                                        <li><a class="dropdown-item"
                                                href="{{ route('item_checksheet.filter', $item->id) }}">{{ $item->nama_kereta }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="{{ route('item_checksheet.create') }}" id="addButton" class="btn btn-primary mb-3"><i
                                    class="material-icons">add</i>Tambah</a>
                            <div class="table table-responsive">

                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kereta</th>
                                            <th>Kategori Checksheet</th>
                                            <th>Uraian Pekerjaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_kereta }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nama_item }}</td>
                                                <td>
                                                    <a href="{{ route('item_checksheet.edit', $item) }}"
                                                        class="btn btn-sm btn-warning mb-1">
                                                        <i class="material-icons">edit</i>Edit
                                                    </a>
                                                    <button type="submit" class="btn btn-sm btn-danger mb-1"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                            class="material-icons">delete</i>Hapus</button>
                                                </td>
                                            </tr>
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
                        <form action="{{ route('item_checksheet.destroy', $item->id) }}" method="POST" class="d-inline">
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
