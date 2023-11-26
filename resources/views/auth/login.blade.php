<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Klinik Del</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('images/bg2.png') }}" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
        {{-- CSS Toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-5 rounded-lg mt-5">
                                    <div class="card-body">
                                            <div class="card-body p-5 text-center mb-9">
                                                <img src="{{ asset('images/bg2.png') }}" width="150px">
                                                <div class="h3 fw-light mt-2">Silahkan Login</div>
                                        </div>
                                        <hr class="my-1" />
                                        <!-- Login form-->
                                        <form action="{{ url('login') }}" method="post">
											@csrf
                                            <!-- Form Group (Username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                                <input class="form-control @error('username')is-invalid @enderror" id="inputUsername" type="text" name="username" placeholder="Masukkan Username"autofocus value="{{ old('username') }}" />
												@error('username')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
                                            </div>
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control  @error('password')is-invalid @enderror" id="inputPassword" type="password" name="password"  placeholder="Password" />
                                                @error('password')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
                                            </div>
                                            <!-- Form Group (login box)-->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn form-control btn-primary rounded submit px-3">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="{{ url('register') }}">Belum memiliki akun? Daftar disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
				<footer class="footer-admin mt-auto footer-light">
					<div class="container-xl px-4">
						<div class="row">
							<div class="col-md-6 small">Copyright &copy; PA1 | Kelompok 17 2021</div>
						</div>
					</div>
				</footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        {{-- Toastr Alert --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{-- @if(session()->has('success'))
            <script>
                toastr.success("{!! session('success') !!}");
            </script>
        @endif --}}

        @if(session()->has('success'))
            <script>
                toastr.success("{!! session('success') !!}", "Sukses");
            </script>
        @endif

        @if(session()->has('LoginError'))
            <script>
                toastr.error("{!! session('LoginError') !!}");
            </script>
        @endif
    </body>
</html>
