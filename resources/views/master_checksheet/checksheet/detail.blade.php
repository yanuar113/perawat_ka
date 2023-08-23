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
                                        <td><b>No Kereta</b></td>
                                        <td>:</td>
                                        <td>{{ $detail->no_kereta }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Jam Engine</b></td>
                                        <td>:</td>
                                        <td>{{ $detail->jam_engine }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tanggal</b></td>
                                        <td>:</td>
                                        <td>{{ $detail->date_time }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tipe Laporan</b></td>
                                        <td>:</td>
                                        <td>{{ $detail->tipe == 0 ? 'Harian' : 'Bulanan' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <h5 class="card-title">Detail Checksheet Perawatan</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{route('checksheet.index')}}" class="btn btn-danger"><i class="material-icons">arrow_back</i>Kembali</a>
                            <a href="#" class="btn btn-success"><i class="material-icons">print</i>Cetak Laporan</a>
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Uraian Pekerjaan</th>
                                        <th>Dilakukan</th>
                                        <th>Hasil</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
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
