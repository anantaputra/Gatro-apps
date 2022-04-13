@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('exist'))                
                <div class="alert alert-danger" role="alert">
                    {{ session('exist') }}
                </div>
            @endif
            @if (session()->has('success'))                
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('failed'))                
            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
            </div>
        @endif
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Kategori </h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>Id_kategori</th>
                            <th>Nama_kategori</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            {{$kategori}}
                            @forelse ($kategori as $k)
                                <tr>
                                    <td> {{ $k->id_kategori}}</td>
                                    <td>{{ $k->nama_kategori}}</td>
                                    <td>
                                        <a href="{{ url('admin/kategori/'. $k->id_kategori .'/edit')}}" class="btn btn-warning">Edit</a>
                                        <a href="{{ url('admin/kategori/'. $k->id_kategori .'/hapus')}}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"> Not Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-header text-right">
                    <a href=" {{ url('admin/kategori/tambah') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection