@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
        <div class="container">
            <div class="header">
                <h1>Tim Kami</h1>
            </div>
            <div class="sub-container">
                <div class="teams d-block lift rounded overflow-hidden mb-2">
                    <img src="{{ asset('aboutus/albert.jpeg') }}" alt="">
                    <div class="name">Albert Manik</div>
                    <div class="desig">Programmer</div>
                    <div class="about">Albert Arta Danyoan Manik 
                        11321016<br> as Project Manager
                        </div>

                    <div class="social-links">
                        <a href="https://www.facebook.com/albertartha.danyoanmanik/"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://instagram.com/albertartaa"><i class="fa-brands fa-instagram"></i></a>
                        <a href="mailto:albertmanik2808@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://wa.me/6281240834846"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="teams d-block lift rounded overflow-hidden mb-2">
                    <img src="{{ asset('aboutus/theo.jpg') }}" alt="">
                    <div class="name">Theofil Nainggolan</div>
                    <div class="desig">Designer</div>
                    <div class="about">Theofil Oktavia Nainggolan 
                        11321052<br> as Members of the Group </div>

                    <div class="social-links">
                        <a href="https://www.facebook.com/profile.php?id=100004123575517"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://instagram.com/theofilngl"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://wa.me/6281269149826"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="teams d-block lift rounded overflow-hidden mb-2">
                    <img src="{{ asset('aboutus/amandaa.jpg') }}" alt="">
                    <div class="name">Amanda Simbolon </div>
                    <div class="desig">Data Analyst</div>
                    <div class="about">Amanda  Regina Simbolon
                        11321055<br> as Members of the Group </div>

                    <div class="social-links">
                        <a href="https://m.facebook.com/amanda.simbolon.714"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://instagram.com/mandaarsx"><i class="fa-brands fa-instagram"></i></a>
                        <a href="mailto:amandamandareginaimb@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://wa.me/6282167148170"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="teams d-block lift rounded overflow-hidden mb-2">
                    <img src="{{ asset('aboutus/claudia.jpeg') }}" alt="">
                    <div class="name">Claudia Panjaitan </div>
                    <div class="desig">Data Analyst</div>
                    <div class="about">Claudia Mesia Panjaitan
                        11321026<br> as Members of the Group </div>

                    <div class="social-links">
                        <a href="https://www.facebook.com/panjaitan.mesia"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://instagram.com/p_claudia03"><i class="fa-brands fa-instagram"></i></a>
                        <a href="mailto:panjaitanclaudia13@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://wa.me/6281329438919"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
@endsection
