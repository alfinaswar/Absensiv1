@extends('layouts.app')

@section('content')
    <div class="page-wrapper mb-3">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Master
                        </div>
                        <h2 class="page-title">
                            Tambah Ketidakhadiran
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #1F573A;">
                        <h3 class="card-title">Form Tambah Ketidakhadiran</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ketidakhadiran.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select name="Jenis" class="form-select">
                                    <option>PIlih Jenis Cuti / Ketidakhadiran</option>
                                    @foreach ($jenis as $j)
                                        <option value="{{$j->id}}"> {{$j->Nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 d-flex gap-3">
                                <div class="flex-fill"><label for="tanggal_awal" class="form-label">Tanggal
                                        Awal</label><input type="date" class="form-control" id="tanggal_awal"
                                        name="TanggalAwal" required></div>
                                <div class="flex-fill"><label for="tanggal_akhir" class="form-label">Tanggal
                                        Akhir</label><input type="date" class="form-control" id="tanggal_akhir"
                                        name="TanggalAkhir" required></div>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="Keterangan"
                                    placeholder="Keterangan">
                            </div>
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">Dokumen</label>
                                <input type="file" class="form-control" id="dokumen" name="Dokumen">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection