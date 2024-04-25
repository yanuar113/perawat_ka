@extends('layouts.app')

@section('title', 'Data Kereta ')

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
                        <div class="card-header">
                            <h5 class="card-title">Daftar Kereta Perawatan</h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="alert alert-success alert-style-light" role="alert">
                                    {{ session()->get('status') }}
                                </div>
                            @endif
                            <a href="{{ route('kereta.create') }}" id="addButton" class="btn btn-primary mb-3"><i
                                    class="material-icons">add</i>Tambah</a>
                            <div class="table table-responsive">
                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kereta</th>
                                            <th>Nomor Kereta</th>
                                            {{-- <th>Username</th> --}}
                                            {{-- <th>Foto</th> --}}
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($keretas as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_kereta }}</td>
                                                <td>
                                                @if (!is_null($item->nomor_kereta))
                                                    @foreach (json_decode($item->nomor_kereta) as $nomor)
                                                        <p>{{ $nomor }}</p>
                                                    @endforeach
                                                @else
                                                    <p>Tidak ada nomor kereta tersedia</p>
                                                @endif
                                                </td>
                                                {{-- <td>{{ $item->username }}</td> --}}
                                                {{-- <td><img src="{{ asset('img/' . $item->foto) }}" alt=""
                                                        width="100px"></td> --}}
                                                        <td>
                                                        <a href="{{ route('kereta.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning mb-1">
                                                        <i class="material-icons">edit</i>Edit
                                                    </a>
                                                            <button type="submit" class="btn btn-sm btn-danger mb-1" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal-{{ $item->id }}">
                                                                <i class="material-icons">delete</i>Hapus
                                                            </button>
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
        </div>
    </div>
    @foreach ($keretas as $item)
            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Kereta
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Apakah anda yakin akan menghapus Kerta ini?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('kereta.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
@endsection
