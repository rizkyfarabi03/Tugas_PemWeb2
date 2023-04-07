@extends('layouts.main')

@section('container')
<h3 class="text-center">Tambah Data Klub</h3>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 border rounded mt-2">
                <form action="{{ route('klub.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                    <div class="mb-3">
                        <label for="gambar_input" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambarInput" id="gambarinput">
                    </div>
                    <div class="mb-3">
                        <label for="nama_input" class="form-label">Nama Klub</label>
                        <input type="text" class="form-control" id="nama_input" name="namaInput">
                    </div>
                    <div class="mb-3">
                        <label for="tahun_input" class="form-label">Tahun Terbentuk</label>
                        <input type="text" class="form-control" id="tahun_input" name="tahunInput">
                    </div>
                    <div class="mb-3">
                        <label for="pemilik_input" class="form-label">Pemilik</label>
                        <input type="text" class="form-control" id="pemilik_input" name="pemilikInput">
                    </div>
                    <div class="mb-3">
                        <label for="manager_input" class="form-label">Manager</label>
                        <input type="text" class="form-control" id="manager_input" name="managerInput">
                    </div>
                    <div class="mb-3">
                        <label for="pelatih_input" class="form-label">Pelatih</label>
                        <input type="text" class="form-control" id="pelatih_input" name="pelatihInput">
                    </div>

                    <div class="row mx-2">
                        <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
