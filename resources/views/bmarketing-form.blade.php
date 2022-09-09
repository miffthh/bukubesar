@extends('layout.template')

@section('container')
    <div class="container">
        <div class="card">
            <div class="card-body mt-3">
                <h4>Halaman Cetak Biaya Marketing Per Tanggal</h4>
                <hr>
                {{-- <h6>CetaData Biaya Marketing</h6> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container mt-1">
            <div class="container col-lg-8 md-4 mt-3">
                <form action="/cetakpdf" target="blank" method="get" class="d-flex">
                    <label for="tgl_mulai">Dari Tanggal</label>
                    <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control datepicker d-flex ms-2">
                    <label for="tgl_selesai" class="ms-2">Sampai Tanggal</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control datepicker d-flex ms-2">
                    <button target="blank" type="submit" name="filter_tgl"
                        class="btn btn-success datpicker ms-2"> <i class="bi bi-printer"></i></button>
                </form>
            </div>
        @endsection
