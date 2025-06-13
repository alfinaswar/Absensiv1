@extends('layouts.app')
@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <!-- BEGIN NAVBAR LOGO -->

                <!-- END NAVBAR LOGO -->
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="mb-3">Maaf, absen gagal!</h2>
                    <p class="text-secondary mb-4">Barcode yang Anda gunakan telah digunakan atau telah kadaluarsa. Silakan
                        coba lagi.</p>
                    <div class="my-4">
                        <a href="#" class="btn btn-primary w-100"> Coba lagi </a>
                    </div>
                    <p class="text-secondary">Jika Anda memerlukan bantuan, jangan ragu untuk <a href="#">menghubungi
                            kami</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
