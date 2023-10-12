@extends('layouts.app')
@section('title', 'Checksheet')

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
                                    <li><a class="dropdown-item" href="{{ route('checksheet.index') }}">Semua
                                            Kereta</a></li>
                                    @foreach ($keretas as $item)
                                        <li><a class="dropdown-item"
                                                href="{{ route('checksheet.filter', $item->id) }}">{{ $item->nama_kereta }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <a href="{{route('checksheet.create')}}" class="btn btn-primary"><i class="material-icons">add</i>Tambah</a> --}}
                            <div class="table table-responsive">
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
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->date_time }}</td>
                                                <td>{{ $item->nama_kereta }}</td>
                                                <td>{{ $item->no_kereta }}</td>
                                                <td style="text-align: center">
                                                    {{-- {{$item->tipe == 0 ? "Harian":"P1"}} --}}
                                                    @if ($item->tipe == '0')
                                                        <span class="badge bg-success">Harian</span>
                                                    @else
                                                        <span class="badge bg-warning">P1</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->jam_engine }}</td>
                                                <td>
                                                    <a href="{{ route('checksheet.show', $item->id) }}"
                                                        class="btn btn-sm btn-primary mb-1">
                                                        <i class="material-icons">visibility</i>Lihat
                                                    </a>
                                                    <a href="{{ route('checksheet.print', $item->id) }}"
                                                        class="btn btn-sm btn-success mb-1">
                                                        <i class="material-icons">print</i>Cetak
                                                    </a>
                                                    <button type="submit" class="btn btn-sm btn-danger mb-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal-{{ $item->id }}"><i
                                                            class="material-icons">delete</i>Hapus</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada data</td>
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
        @foreach ($checksheets as $item)
            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Checksheet
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Apakah anda yakin akan menghapus checksheet ini?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('checksheet.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
