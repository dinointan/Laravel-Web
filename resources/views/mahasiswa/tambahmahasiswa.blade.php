@extends('template.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Mahasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Mahasiswa</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="NIM">NIM</label>
                                        <input type="text" name="NIM" class="form-control" id="NIM"
                                            placeholder="Masukkan NIM">
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama">Nama Mahasiswa</label>
                                        <input type="text" name="Nama" class="form-control" id="Nama"
                                            placeholder="Masukkan Nama Mahasiswa">
                                    </div>
                                    <div class="form-group">
                                        <label for="ID_Prodi">Prodi</label>
                                        <select name="ID_Prodi" id="ID_Prodi" class="form-control select2bs4"
                                            style="width: 100%;">
                                            <option value="">Pilih Prodi</option>

                                            <?php
                                            foreach ($dataprodi as $prodi): ?>
                                            <option value="{{ $prodi->id }}"> {{ $prodi->nama_prodi }}</option>
                                            <?php
                                        endforeach;
                                         ?>
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <label for="Nomor_HP">Nomor HP</label>
                                        <input type="text" name="Nomor_HP" class="form-control" id="Nomor_HP" place
                                            holder="Masukkan Nomor HP">
                                    </div>
                                    <div class="form-group">
                                        <label for="Alamat">Alamat</label>
                                        <input type="text" name="Alamat" class="form-control" id="Alamat"
                                            placeholder="Masukkan Alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="Foto">Foto</label><br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="Foto"
                                                    name="Foto">
                                                <label class="custom-file-label" for="Foto">Pilih Foto</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>

                                        <!-- /.card-body -->
                                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">

                        <!-- /.card-footer -->
                </div>

        </section>
        <!-- right col -->
    </div>
@endsection
