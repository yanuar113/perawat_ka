@extends('layouts.app')
@section('title', 'Detail Checksheet')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Detail Checksheet</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="mb-3">
                                <table class="align-top">
                                    <tr>
                                        <td style="width: 40%;"><b>Nama Kereta</b></td>
                                        <td style="width:5%">:</td>
                                        <td style="width: 55%">{{ $detail->nama_kereta }}</td>
                                    </tr>
                                    <tr>
                                        <td>No Kereta</td>
                                        <td>:</td>
                                        <td>{{ $detail->no_kereta }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jam Engine</td>
                                        <td>:</td>
                                        <td>{{ $detail->jam_engine }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>{{ $detail->date_time }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tipe Laporan</td>
                                        <td>:</td>
                                        <td>{{ $detail->tipe == 0 ? 'Harian' : 'Bulanan' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <h5 class="card-title">Detail Checksheet Perawatan</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('checksheet.index') }}" class="btn btn-danger"><i
                                    class="material-icons">arrow_back</i>Kembali</a>
                            <a href="#" class="btn btn-success"><i class="material-icons">print</i>Cetak Laporan</a>

                            @foreach ($categories as $category)
                                <div class="alert alert-primary mt-4">{{ $category->nama }}</div>
                                <div class="table table-responsive">

                                    <table class="table table-bordered display" style="width:100%">
                                        <thead>
                                            <tr style="vertical-align : middle;text-align:center;">
                                                <th rowspan="2" class="text-center">No</th>
                                                <th rowspan="2">Uraian Pekerjaan</th>
                                                <th colspan="2">Dilakukan</th>
                                                <th colspan="2">Hasil</th>
                                                <th rowspan="2">Keterangan</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th>Ya</th>
                                                <th>Tidak</th>
                                                <th>Baik</th>
                                                <th>Tidak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($category->lists as $list)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $list->nama_item }}</td>
                                                    <td class="text-center">
                                                        @if ($list->dilakukan == '1')
                                                            <i class="material-icons text-dark">check</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($list->dilakukan == '0')
                                                            <i class="material-icons text-dark">check</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($list->hasil == '1')
                                                            <i class="material-icons text-dark">check</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($list->hasil == '0')
                                                            <i class="material-icons text-dark">check</i>
                                                        @endif
                                                    </td>
                                                    <td>{{ $list->keterangan }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
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
                            Apakah anda yakin akan menghapus checksheet ini?
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
