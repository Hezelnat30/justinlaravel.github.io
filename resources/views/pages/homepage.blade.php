@extends('template')
@section('main')
    <section id="homepage"class="jumbotron text-center" style="padding-top: 8em; background-color: #b3daf7; border: none;">
        <img src="{{ asset('images/fotojustin3.jpg') }}" alt="Justin Hezelnat" width="250px"
            class="rounded-circle img-thumbnail" />
        <div class="typography mt-2">
            <h1 class="display-4 fw-medium">Justin Hezelnat</h1>
            <p class="lead fw-normal"></p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f3f5f8" fill-opacity="1"
                d="M0,64L48,85.3C96,107,192,149,288,149.3C384,149,480,107,576,85.3C672,64,768,64,864,90.7C960,117,1056,171,1152,186.7C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- ABOUT START -->
    <section id="about">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2 class="fw-medium">ABOUT ME</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-5 text-center">
                <div class="col-md-4 mb-3" data-aos="fade-right" data-aos-duration="1000">Hello my name is Justin
                    Hezekiel Ramli, you can call me Justin or Hezelnat. I was born in Semarang on 4 May 2003. I'm the
                    2nd from 5 siblings. I like play basketball and playing games. </div>
                <div class="col-md-4 mb-3" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="150">I'm
                    currently studying at <a class="text-decoration-none " href="https://www.unika.ac.id/">Soegijapranata
                        Catholic University,</a> majoring at information systems in the faculty of computer science. I
                    Enjoy Studies here because i can get friends and good lecturer. I hope i can graduate as soon as
                    possible.
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0d6efd" fill-opacity="1"
                d="M0,128L48,154.7C96,181,192,235,288,240C384,245,480,203,576,202.7C672,203,768,245,864,250.7C960,256,1056,224,1152,197.3C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- ABOUT END -->
@stop
@section('footer')
    @include('footer')
@stop
