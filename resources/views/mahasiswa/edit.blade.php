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
                                <h3 class="card-title">Edit Mahasiswa</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('mahasiswa/' . $mahasiswa->nim) }}" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" name="nim" class="form-control" id="nim"
                                            placeholder="Masukkan NIM" value="{{ $mahasiswa->nim }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Mahasiswa</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            placeholder="Masukkan Nama Mahasiswa" value="{{ $mahasiswa->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi_id">Prodi</label>
                                        <select name="prodi_id" id="prodi_id" class="form-control select2bs4"
                                            style="width: 100%;">
                                            @foreach ($prodi as $p)
                                                <option value="{{ $p['id'] }}">
                                                    {{ $p['id'] == $mahasiswa->prodi_id ? 'SELECTED' : '' }}{{ $p['nama_prodi'] }}
                                                </option>
                                            @endforeach
                                            ?>
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp" place
                                            holder="Masukkan Nomor HP" value="{{ $mahasiswa->no_hp }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat"
                                            placeholder="Masukkan Alamat" value="{{ $mahasiswa->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label><br>
                                        <img src="{{ asset('dist/img/' . $mahasiswa->foto) }}" alt="">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto"
                                                    name="foto">
                                                <label class="custom-file-label" for="foto">Pilih Foto</label>
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
