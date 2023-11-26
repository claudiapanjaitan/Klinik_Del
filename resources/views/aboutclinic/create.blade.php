@extends('layouts.main')
@section('content')
<h1 class="h3 mb-2 text-gray-800 text-center">Tambah Fasilitas</h1>
<div class="container">
    <div class="row mt-4">
            <div class="col-10">
                <form action="{{ route('aboutclinic.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" name="nama" id="" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Fasilitas" autofocus value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Fasilitas</label>
                        <input type="text" name="deskripsi" id="" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan Deskripsi Fasilitas" autofocus value="{{ old('deskripsi') }}">
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tambah Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" name="gambar" onChange="previewImage()" id="image" class="form-control @error('gambar') is-invalid @enderror" placeholder="Masukkan gambar">
                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary mt-2" value="Tambah">
                        <a href="{{ route('aboutclinic.index') }}" type="submit" class="btn btn-primary mt-2">Batal</a>
                    </div>
                </form>
            </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection