<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaravelApp</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- BOOTSTRAP CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- AOS SCRIPT --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

    <div class="">
        @include('navbar')
        @yield('main')
    </div>

    @yield('footer')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function setActiveMenu() {
                var currentPath = window.location.pathname;
                var hash = window.location.hash.substring(1);

                var activeMenuId = currentPath.includes('siswa') ? 'siswaMenu' :
                    currentPath.includes('kelas') ? 'kelasMenu' :
                    currentPath.includes('hobi') ? 'hobiMenu' :
                    currentPath.includes('user') ? 'userMenu' : '';

                // Jika hash adalah 'about' dan halaman beranda, tetapkan activeMenuId ke 'aboutMenu'
                if (hash === 'about' && currentPath === '/') {
                    activeMenuId = 'aboutMenu';
                }

                $(".nav-link").removeClass('active');
                $("#" + activeMenuId).addClass('active');
            }

            // Set active menu saat halaman dimuat
            setActiveMenu();

            // Set active menu saat perubahan hash
            $(window).on('hashchange', function() {
                setActiveMenu();
            });

            // Set active menu saat pengguna menggulir
            $(window).on('scroll', function() {
                var aboutSectionPosition = $('#about').offset().top;
                var aboutSectionHeight = $('#about').height();
                var scrollPosition = $(this).scrollTop();

                // Jika pengguna berada di bagian "About" pada halaman beranda
                if (scrollPosition >= aboutSectionPosition && scrollPosition < aboutSectionPosition +
                    aboutSectionHeight) {
                    setActiveMenu();
                }
            });

            // Set active menu saat menekan tautan internal
            $('a[href^="#"]').on('click', function(e) {
                e.preventDefault();

                var target = this.hash;
                var $target = $(target);

                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top
                }, 900, 'swing', function() {
                    window.location.hash = target;
                    setActiveMenu();
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/laravelku.js') }}"></script>
    {{-- GSAP SCRIPT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>
    <script>
        gsap.registerPlugin(TextPlugin)
        gsap.to('.lead', {
            duration: 1.2,
            delay: 1,
            text: 'Laravel Developer'
        })
        gsap.from('.navbar', {
            duration: 0.8,
            y: -100,
            opacity: 0
        });
        gsap.from('.jumbotron img', {
            duration: 1,
            y: -100,
            opacity: 50,
            ease: 'bounce'
        });
        gsap.from('.display-4', {
            duration: 1,
            x: -50,
            opacity: 0,
            delay: 0.5,
            ease: 'back'
        });
    </script>
    <!-- AOS SCRIPT -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
</body>

</html>
