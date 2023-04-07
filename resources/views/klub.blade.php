@extends('layouts.main')

@section('container')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="{{ route('klub.create') }}" class="btn btn-primary">Tambah Data</a>


<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama Klub</th>
            <th scope="col">Tahun Terbentuk</th>
            <th scope="col">Pemilik</th>
            <th scope="col">Manager</th>
            <th scope="col">Pelatih</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp

        @foreach ($klub as $item)
        <tr>
            <th scope="row">{{ $no }}</th>
            <td>
                <img src="{{ asset('gambarklub/download.png'.$item->gambar) }}" alt="null" style="width: 40px;">
            </td>
            <td>{{ $item->nama_klub }}</td>
            <td>{{ $item->tahun_terbentuk }}</td>
            <td>{{ $item->pemilik }}</td>
            <td>{{ $item->manager }}</td>
            <td>{{ $item->pelatih }}</td>
            <td>
                <a href="{{ route('klub.edit', $item->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('klub.destroy',$item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning" onclick="confirm('Anda yakin akan meenghapus data ini?')">Hapus</button>
               </form>
               
            </td>
        </tr>

        @php
            $no++;
        @endphp
        @endforeach
    </tbody>
</table>
<a href="/sesi/logout" class="btn btn-dark">Logout</a>
@endsection
