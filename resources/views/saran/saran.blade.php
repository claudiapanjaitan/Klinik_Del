@extends('layouts.main')
@section('content')
    @if(Auth::user()->role_id==1)
        <h1 class="h3 mb-2 text-gray-800 mx-3 text-center">Saran Untuk Website Kesehatan Klinik Del</h1>
    @endif
    @if(Auth::user()->role_id==2)
        <h1 class="h3 mb-2 text-gray-800 mx-3 text-center">Masukkan Saran Anda</h1>
        <div class="container">
            <div class="row mt-4">
                <div class="mx-3 col-lg-5">
                    <form action="{{ route('saran.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="text-sm font-medium text-gray-700">Saran</label>
                            <textarea type="text" name="saran" id="" class="form-control @error('saran') is-invalid @enderror" placeholder="Masukkan Saran Anda">{{ old('saran') }}</textarea>
                            @error('saran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            <input type="submit" value="Kirim" class="btn btn-outline-primary mx-0 mt-2">
                    </form>
                </div>
            </div>
        </div>
    @endif
        @foreach($saran as $item)
                <div class="comment even thread-even depth-1 mx-3 mt-4" id="li-comment-{{$item->id}}">
                    <div id="comment-{{$item->id}}" class="comment-wrap clearfix" style="width:1000px;">
                        <div class="comment-meta">
                            <div class="comment-author vcard">
                                <span class="comment-avatar clearfix">
                                <img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <div class="comment-author">
                            <strong><ins>{{ $item->username }}</ins></strong>
                                <p>{{$item->saran}}
                                    <small class="text-muted" title="Permalink to this comment"><br>
                                        {{$item->created_at->diffForHumans()}}
                                        @if (Auth::user()->id==$item->user_id)
                                        {{-- @else (Auth::user()->role=="staff") --}}
                                            <form class="mx-auto" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('saran.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')   
                                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                            </form>
                                        @else
                                            @if(Auth::user()->role_id==1)
                                                <form class="mx-auto" onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('saran.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')   
                                                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                                </form>
                                            @endif
                                        @endif
                                    </small>
                                </p>
                            </div>
                            
                        </div>
                        <div class="clear"></div>
                        {{-- <nav class="dataTable-pagination">{{ $item->links() }}</nav> --}}
                    </div>
                </div>
        @endforeach

    @if(session()->has('success'))
    <script>
        toastr.success("{!! session('success') !!}");
    </script>
@endif
@endsection