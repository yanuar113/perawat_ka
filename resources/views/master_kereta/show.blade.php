@extends('layouts.app')

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
                            <button id="addButton" class="btn btn-primary"><i class="material-icons">add</i>Tambah</button>
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kereta</th>
                                        <th>Username</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trains as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama_kereta}}</td>
                                            <td>{{$item->username}}</td>
                                            <td>{{$item->foto}}</td>
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
@endsection
