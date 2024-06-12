@extends()

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

        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url("mahasiswa/$mahasiswa->nim") }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nimmahasiswa">NIM</label>
                                    <input type="text" name="nimmahasiswa" class="form-control" id="nim"
                                        placeholder="Masukan NIM Mahasiswa" value="{{ $mahasiswa->nim }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="namamahasiswa">Nama Mahasiswa</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Masukan Nama Mahasiswa" value="{{ $mahasiswa->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Program Studi</label>
                                    <select class="from-control select2bs4" style="width: 100%" id="prodi"
                                        name="prodi">
                                        <option value="">Pilih Prodi</option>
                                        @foreach ($prodi as $data)
                                            <option value="{{ $data['id'] }}">
                                                {{ $data['id'] == $mahasiswa->prodi_id ? 'SELECTED' : '' }}>{{ $data['nama_prodi'] }}
                                            </option>
                                        @endforeach
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nohp">Nomor HP</label>
                                    <input type="text" name="no_hp" class="form-control" id="nohp"
                                        placeholder="Masukan No HP" value="{{ $mahasiswa->no_hp }}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat"
                                        placeholder="Masukan Alamat" value="{{ $mahasiswa->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Foto</label>
                                    <input type="file" name="photo" class="container-fluid" id="photo"
                                        name="photo" accept="image/*">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
            <!-- /.row -->
            <!-- /.row -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
@endsection
