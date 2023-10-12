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
                            <div class="btn-group mb-3">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Pilih Kereta
                                </button>
                                {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('item_checksheet.index') }}">Semua
                                        Kereta</a></li>
                                @foreach ($keretas as $item)
                                    <li><a class="dropdown-item"
                                            href="{{ route('item_checksheet.filter', $item->id) }}">{{ $item->nama_kereta }}</a>
                                    </li>
                                @endforeach
                            </ul> --}}
                            </div>
                            {{-- <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3"> --}}
                            <a href="" class="btn btn btn-primary mb-3"><i class="material-icons">add</i>Tambah</a>
                            <div class="table table-responsive">
                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hari Tanggal</th>
                                            <th>Kereta</th>
                                            <th>No Kereta</th>
                                            <th>Tipe Laporan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->datetime }}</td>
                                        <td>{{ $item->nama_kereta }}</td>
                                        <td>{{ $item->no_kereta }}</td>
                                        {{-- <td>{{ $item->tipe }}</td> --}}
                                        <td>
                                            @if ($item->tipe == '0')
                                                <span class="badge bg-success">Harian</span>
                                            @else
                                                <span class="badge bg-warning">Bulanan</span>
                                        @endif    
                                        </td>
                                            <td>
                                                {{-- <a href="{{route('checksheet.show', $item->id)}}"
                                                class="btn btn-sm btn-primary mb-1"> --}}
                                                <a href="" class="btn btn-sm btn-primary mb-1">
                                                    <i class="material-icons">visibility</i>Lihat
                                                </a>
                                                <a href="{{ route('photo.print',$item->id) }}" class="btn btn-sm btn-success mb-1">
                                                    {{-- <a href="" class="btn btn-sm btn-success mb-1"> --}}
                                                    <i class="material-icons">print</i>Cetak
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"><i
                                                        class="material-icons">delete</i>Hapus</button>
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
