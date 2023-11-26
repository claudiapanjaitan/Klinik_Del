@extends('layouts.main')

@section('content')
@auth
    @if(Auth::user()->role_id==1)
    <span class="d-flex mx-4 ">
        <a href="{{ route('aboutclinic.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Fasilitas</a>
    </span>
    @else
        <h1 class="h3 mb-2 text-gray-800 text-center">Gambar Fasilitas Klinik</h1>
    @endif
@else
    <h1 class="h3 mb-2 text-gray-800 text-center">Gambar Fasilitas Klinik</h1>
@endauth
<hr class="mt-0 mb-4 mx-4" />
<div class="container-xl px-4">
        <div class="row justify-content-center">
            @foreach ($aboutclinic as $item)
                <div class="card mt-2 mx-2 col-lg-3 ">
                        <img class="card-img-top mt-2" src="fasilitas/{{ $item->gambar }}" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            @auth
                                @if(Auth::user()->role_id==1)
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('aboutclinic.edit', $item->id) }}" class="btn btn-sm btn-info shadow mx-1">Edit</a>
                                        <form class="mx-1" onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('aboutclinic.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                </div>
            @endforeach
        </div>
            <div class="text-center dataTable-pagination mt-4">{{ $aboutclinic->links() }}</div>
</div>
@endsection