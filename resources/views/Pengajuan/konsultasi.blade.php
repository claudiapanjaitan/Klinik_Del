@extends('layouts.main')
@section('content')
@if(Auth::user()->role_id==2)
        <span class="d-flex mx-2">
            <a href="{{ route('konsultasi.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Pengajuan</a>
        </span>
    @else
        <h1 class="h3 mb-2 text-gray-800 text-center">Daftar Pengajuan Konsultasi</h1>
    @endif
    <form id="content_filter" class="col-lg-2 mx-2">
        <div class="input-group input-group-joined input-group-solid">
            <input class="form-control pe-0" onkeyup="load_list(1);" type="search" name="search" value="{{ request()->search }}" placeholder="Search" aria-label="Search" autocomplete="off" />
            <div class="input-group-text"><i data-feather="search"></i></div>
        </div>
    </form>
    <div class="table-responsive col-lg-11 mx-2">
        <table class="table table-hover table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Keluhan</th>
                    <th>Tanggal Konsultasi</th>
                    <th>Waktu Konsultasi</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody class="text-center">
                @foreach ($datas as $index => $item)
                <tr>
                    <td>{{ $index + $datas->firstItem() }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td>{{ $item->tanggal_konsultasi }}</td>
                    <td>{{ $item->waktu_konsultasi }}</td>
                    <td>
                        <div class="badge bg-blue-soft text-blue">{{ $item->status }}</div>
                    </td>
                    <td class="text-center">
                        @if (Auth::user()->id==$item->user_id)
                        <div class="d-flex justify-content-center ">
                            <a class="btn btn-sm btn-info shadow mx-1" href="{{ route('konsultasi.edit', $item->id) }}">Edit</a>
                                <form class="mx-1" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('konsultasi.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                                @else
                                @if(Auth::user()->role_id==1)
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route('konsultasi.terima',$item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success shadow mx-1">Terima</button>
                                        </form>
                                        <form action="{{ route('konsultasi.tolak',$item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-warning shadow mx-1">Tolak</button>
                                        </form>
                                        <form class="mx-1" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('konsultasi.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                @endif 
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
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
