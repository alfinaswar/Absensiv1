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
                            Edit Ketidakhadiran
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #1F573A;">
                        <h3 class="card-title">Form Edit Ketidakhadiran</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ketidakhadiran.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis</label>
                                <select name="Jenis" class="form-select">
                                    <option>Pilih Jenis Cuti / Ketidakhadiran</option>
                                    @foreach ($jenis as $j)
                                        <option value="{{$j->id}}" {{ $data->Jenis == $j->id ? 'selected' : '' }}> {{$j->Nama}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 d-flex gap-3">
                                <div class="flex-fill">
                                    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                                    <input type="date" class="form-control" id="tanggal_awal" name="TanggalAwal"
                                        value="{{ $data->TanggalAwal }}" required>
                                </div>
                                <div class="flex-fill">
                                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="tanggal_akhir" name="TanggalAkhir"
                                        value="{{ $data->TanggalAkhir }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="Keterangan"
                                    value="{{ $data->Keterangan }}" placeholder="Keterangan">
                            </div>
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">Dokumen</label>
                                @if($data->Dokumen)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->Dokumen) }}" target="_blank"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Preview Dokumen
                                        </a>
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="dokumen" name="Dokumen">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah dokumen</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection