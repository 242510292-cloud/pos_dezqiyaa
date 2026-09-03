@extends('layouts.app')


@section('content')


<div class="container mt-5">


    <div class="text-center mb-4">

        <h2 class="fw-bold text-primary">
            <i class="bi bi-person-vcard me-2"></i>
            identitas diri
        </h2>

        <p class="text-muted">
            Biodata Pengembang Aplikasi POS
        </p>

    </div>


    <div class="card shadow-lg border-0">


        <div class="card-body">


            <div class="row">


                <div class="col-md-4 text-center">


                    <img src="{{ asset('images/foto.jpg') }}"
                         class="img-thumbnail rounded-circle"
                         width="200"
                         alt="Foto Saya">


                </div>


                <div class="col-md-8">


                    <table class="table">


                        <tr>
                            <th width="200">Nama</th>
                            <td>: DEZQIYA NUR ANNISA</td>
                        </tr>


                        <tr>
                            <th>NIM</th>
                            <td>: 242510292</td>
                        </tr>


                        <tr>
                            <th>Kelas</th>
                            <td>: XII PPLG 4</td>
                        </tr>


                        <tr>
                            <th>Program Studi</th>
                            <td>: Pengembangan Perangkat Lunak dan Gim</td>
                        </tr>


                        <tr>
                            <th>Universitas</th>
                            <td>: SMKN 4 TASIKMALAYA</td>
                        </tr>


                       <tr>
                       <th>Email</th>
                            <td>: {{ auth()->user()->email }}</td>
                        </tr>


                        <tr>
                            <th>No. HP</th>
                            <td>: 0856-2444-8838</td>
                        </tr>


                        <tr>
                            <th>Alamat</th>
                            <td>: jln.bebedahan1,kp.sukasirna.</td>
                        </tr>


                        <tr>
                            <th>Tentang</th>

                            <td>
                                Saya merupakan mahasiswa Program Studi Sistem Informasi
                                yang sedang mengembangkan aplikasi POS Inventory System
                                menggunakan Laravel sebagai tugas pelajar.
                            </td>

                        </tr>


                    </table>


                </div>


            </div>


        </div>


    </div>


    {{-- TOMBOL KEMBALI --}}

    <div class="mt-4">

        <a href="{{ url('/dashboard') }}"
           class="btn btn-primary fw-bold">

            ← Kembali

        </a>

    </div>


</div>


@endsection