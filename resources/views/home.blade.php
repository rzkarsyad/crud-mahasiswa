@extends('layouts.app')

@section('custom_styles')
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h1>{{ $mahasiswa }}</h1>
                            <span>Total Mahasiswa</span>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h1>124</h1>
                            <span>Total Dosen</span>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h1>85</h1>
                            <span>Total Staff</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
