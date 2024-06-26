@extends('layouts.app')
@section('title', 'Dashboard')


@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <a href="{{ route('kereta.index') }}" class="text-decoration-none">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">train</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Kereta</span>
                                        <span class="widget-stats-amount">{{ $keretas }}</span>
                                    </div>
                                    {{-- <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                                    <i class="material-icons">train</i>
                                </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <a href="{{ route('sparepart.index') }}" class="text-decoration-none">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">handyman</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Sparepart</span>
                                        <span class="widget-stats-amount">{{ $spareparts }}</span>
                                    </div>
                                    {{-- <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i> 12%
                                </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <a href="{{ route('checksheet.index') }}" class="text-decoration-none">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">checklist_rtl</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Checksheet</span>
                                        <span class="widget-stats-amount">{{ $checksheet }}</span>
                                    </div>
                                    {{-- <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                    <i class="material-icons">keyboard_arrow_up</i> 7%
                                </div> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
