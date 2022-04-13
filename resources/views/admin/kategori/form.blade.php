@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-default">
                <div class="card-header card-header-border-button">
                    <h2>  Kategori</h2>
                </div>
                <div class="card-body">
                    @if(Request::is('admin/kategori/tambah'))
                        <form method="post" action="/kategori/simpan">
                            @csrf
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" class="form-control mb-4" id="kategori" name="nama_kategori" placeholder="nama kategori">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    @else
                        <form method="post" action="/kategori/edit">
                            @csrf
                            <input type="hidden" name="id" value="{{ $kategori->id_kategori }}">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" class="form-control mb-4" id="kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" placeholder="nama kategori">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


