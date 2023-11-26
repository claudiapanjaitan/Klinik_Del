@extends('layouts.main')
@section('content')
    @auth
        @if(Auth::user()->role_id==1)
        <span class="d-flex mx-2">
            <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Jadwal</a>
        </span>
        @else
        <h1 class="h3 mb-2 text-gray-800 text-center">Jadwal Staff Klinik</h1>
        @endif
    @else
        <h1 class="h3 mb-2 text-gray-800 text-center">Jadwal Staff Klinik</h1>
    @endauth
        @if(session('message'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#check-circle-fill"/></svg>
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    <form class="col-lg-2 mx-2">
    <div class="input-group input-group-joined input-group-solid">
        <input class="form-control pe-0" type="search" name="search" value="{{ request()->search }}" placeholder="Search" aria-label="Search" autocomplete="off" />
        <div class="input-group-text"><i data-feather="search"></i></div>
    </div>
    </form>
    <div class="table-responsive col-lg-10 mx-2">
        <table class="table table-hover table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>PETUGAS</th>
                    <th>NIK</th>
                    <th>HARI</th>
                    <th>WAKTU</th>
                    @auth
                        @if(Auth::user()->role_id==1)
                            <th>ACTION</th>
                        @endif
                    @endauth
                </tr>
            </thead>

            <tbody class="text-center">
                @foreach ($datas as $index => $item)
                <tr>
                    <td>{{ $index + $datas->firstItem() }}</td>
                    <td>{{ $item->petugas }}</td>
                    <td>{{ $item->NIP }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->waktu }} - {{ $item->waktu2 }}</td>
                    @auth
                        @if(Auth::user()->role_id==1)
                        <td class="text-center">
                                <div class="d-flex justify-content-center ">
                                    <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-sm btn-info shadow mx-1" >Edit</a>
                                    <form class="mx-1" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('jadwal.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                        </td>
                        @endif
                    @endauth
                </tr>
                @endforeach
        </table>
        <div class="dataTable-bottom">
            <div class="dataTable-info">
                Showing
                {{ $datas->firstItem() }}
                to
                {{ $datas->lastItem() }}
                of
                {{ $datas->total() }}
                entries
            </div>
            <nav class="dataTable-pagination">{{ $datas->links() }}</nav>
        </div>
    </div>
@endsection