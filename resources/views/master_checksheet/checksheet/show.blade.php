@extends('layouts.app')
@section('title', 'Detail Checksheet')
 
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Daftar Checksheet</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daftar Checksheet Perawatan</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{route('checksheet.create')}}" class="btn btn-primary"><i class="material-icons">add</i>Tambah</a>
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari Tanggal</th>
                                        <th>Nama Kereta</th>
                                        <th>No Kereta</th>
                                        <th>Tipe Laporan</th>
                                        <th>Jam Engine</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($checksheets as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->date_time}}</td>
                                            <td>{{$item->nama_kereta}}</td>
                                            <td>{{$item->no_kereta}}</td>
                                            <td>{{$item->tipe}}</td>
                                            <td>{{$item->jam_engine}}</td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-sm btn-success">
                                                    <i class="material-icons">visibility</i>Lihat   
                                                </a>
                                                <a href="#"
                                                    class="btn btn-sm btn-warning">
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
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Checksheet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Apakah anda yakin akan menghapus kategori ini?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                        {{-- <form action="{{ route('checksheet.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
