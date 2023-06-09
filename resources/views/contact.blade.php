<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GESTION AGRICOLE</title>
    <link rel="shortcut icon" href="{{ URL::asset('iconagri.png') }}" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="pageContact.css" />
    <!-- ? KUTE cdn  -->
    <script src="
                https://cdn.jsdelivr.net/npm/kute.js@2.2.4/dist/kute.min.js
                "></script>
    <!-- ? jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <style>
        .fot {
            color: #ffffff;
            transform: translate(47px, 55px);
            position: absolute;
            font-size: 19px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-main">
                <div class="logoro">
                    <img src="./imgs/Green and White Modern Beauty Studio Website (1).png" alt="" />
                </div>
                <div class="open-nav-menu">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="menu-overlay"></div>
                <nav class="nav-menu">
                    <div class="close-nav-menu">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                    <ul class="menu">
                        <li class="menu-item">
                            <!-- ? link -->
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="menu-item">
                            <!-- ? link -->
                            <a href="{{ route('welcome') }}">Services</a>
                        </li>
                        <li class="menu-item">
                            <!-- ? link -->
                            <a href="{{ route('etape') }}">Etapes</a>
                        </li>
                        <li class="menu-item simp">
                            <!-- ? link -->
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/home') }}">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}">COMMENCER</a>

                                @endauth
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="wayli">
        <div class="left">
            <div class="form-wrapper">
                <div class="contact-heading">
                    <h1>Travaillons Ensemble <span>.</span></h1>
                    <!-- <p class="text">
              Or reach us via
              <a href="G.Agricole"
                >G.Agricole@gmail.com</a
              >
            </p> -->
                </div>

                <form action="{{ route('submitForm') }}" class="contact-form" method="post">
                    @csrf
                    <div class="input-wrap">
                        <input type="text" class="contact-input" autocomplete="off" name="nom" required />
                        <label>Nom</label>
                        <img class="icon" src="./imgs/id-card-solid.svg" alt="" />
                    </div>

                    <div class="input-wrap">
                        <input type="text" class="contact-input" autocomplete="off" name="prenom" required />
                        <label>Prénom</label>
                        <img class="icon" src="./imgs/id-card-solid.svg" alt="" />
                    </div>

                    <div class="input-wrap w-100">
                        <input type="email" class="contact-input" autocomplete="off" name="email" required />
                        <label>Email</label>
                        <img class="icon" src="./imgs/envelope-solid.svg" alt="" />
                    </div>

                    <div class="input-wrap textarea w-100">
                        <textarea name="message" auto-complete="off" class="contact-input" required></textarea>
                        <label>Message</label>
                        <img class="icon" src="./imgs/message-solid.svg" alt="" />
                    </div>

                    <div class="contact-buttons w-100">
                        <button class="btn" type="submit">
                            Envoyer <img src="./imgs/paper-plane-solid.svg" class="sir" />
                        </button>
                    </div>
                </form>
            </div>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.675516001693!2d-7.698921189686119!3d33.53582114471282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62da06b334d0d%3A0x26b75f3ce8cb292c!2sOulfa%20farah%20essalam!5e0!3m2!1sfr!2sma!4v1683927261847!5m2!1sfr!2sma"
                    style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <footer>
        <div class="contenar2">
            <ul class="contacLinks">
                <!-- ? link -->
                <li><a href="{{ route('contact') }}">Contactez-nous</a></li>
                <li><a href="#">A propos </a></li>
                <li><a href="#">Services</a></li>
            </ul>

            <ul class="comm">
                <h3><span>GESTIONNER</span> Votre Parcelle</h3>
                <li class="simp footer"><a href="{{route('login')}}">COMMENCER</a></li>
            </ul>
            <ul class="moreLinks">
                <!-- ? link -->
                <li><a href="#">Etapes</a></li>
                <li><a href="#">Dev Team</a></li>
                <li><a href="{{ route('contact') }}">Inscrire</a></li>
            </ul>
        </div>

        <div class="logoAicons">
            <div class="logo2">
                <p>© 2023 by &nbsp;</p>
                <div class="holder">
                    <a href="mailto:saadboutirhiten@gmail.com" class="fot">S.A.M.Y</a>
                </div>
            </div>
            <div class="icons">
                <span>
                    <ion-icon name="logo-facebook"></ion-icon>
                </span>
                <span>
                    <ion-icon name="logo-twitter"></ion-icon>
                </span>
                <span>
                    <ion-icon name="logo-youtube"></ion-icon>
                </span>
                <span>
                    <ion-icon name="logo-github"></ion-icon>
                </span>
                <span>
                    <ion-icon name="logo-linkedin"></ion-icon>
                </span>
            </div>
        </div>
        <svg class="blob-motion1" id="visual" viewBox="0 0 900 600" width="900" height="600"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
            <g transform="translate(483.35964054826786 264.5188399381987)">
                <path id="blob1"
                    d="M182.5 -34.6C215.5 42 206.5 156.9 144 203.6C81.5 250.3 -34.5 228.7 -126.8 164.1C-219.2 99.4 -287.9 -8.2 -262.8 -74C-237.8 -139.8 -118.9 -163.6 -22 -156.5C74.8 -149.3 149.6 -111.1 182.5 -34.6"
                    fill="#025555"></path>
            </g>
            <g transform="translate(493.94422302715816 292.5955318587451)">
                <path id="blob2"
                    d="M182.6 -63.2C201 -2.8 155.6 74.5 85.2 128.1C14.9 181.8 -80.4 211.8 -158.2 167.2C-236 122.6 -296.3 3.4 -267.1 -72.1C-237.8 -147.6 -118.9 -179.3 -18.4 -173.3C82.1 -167.3 164.2 -123.7 182.6 -63.2"
                    fill="#025555"></path>
            </g>
        </svg>
        <svg id="visual" class="blob-motion2" viewBox="0 0 900 600" width="900" height="600"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
            <g transform="translate(402.8073318996174 279.51326344686004)">
                <path id="blob11"
                    d="M262.9 -73.9C288.1 -7.9 219.6 100 134.4 154.8C49.2 209.5 -52.7 211.2 -112 165.4C-171.2 119.7 -187.8 26.6 -162.1 -40.1C-136.3 -106.8 -68.2 -147.2 25.4 -155.4C118.9 -163.6 237.8 -139.8 262.9 -73.9"
                    fill="#84BD3A"></path>
            </g>
            <g transform="translate(418.3762369981514 331.724540914671)">
                <path id="blob22"
                    d="M260.1 -93.2C282.4 -15.8 208.2 84.3 130.4 128.9C52.6 173.5 -28.8 162.6 -95.8 117.4C-162.9 72.1 -215.5 -7.5 -197.2 -79.5C-178.8 -151.4 -89.4 -215.7 14.7 -220.5C118.9 -225.3 237.8 -170.6 260.1 -93.2"
                    fill="#84BD3A"></path>
            </g>
        </svg>

        <script>
            const tween1 = KUTE.fromTo(
                "#blob1", // the initial path
                {
                    path: "#blob1",
                }, {
                    path: "#blob2",
                }, {
                    repeat: 999,
                    duration: 3000,
                    yoyo: true,
                }
            );
            const tween2 = KUTE.fromTo(
                "#blob11", // the initial path
                {
                    path: "#blob11",
                }, {
                    path: "#blob22",
                }, {
                    repeat: 999,
                    duration: 3000,
                    yoyo: true,
                }
            );
            tween1.start();
            tween2.start();
        </script>
    </footer>
    <script>
        console.log("Working");
        $(window).bind("scroll", () => {
            var gap = 50;
            if ($(window).scrollTop() > gap) {
                $("header").addClass("active");
            } else {
                $("header").removeClass("active");
            }
        });
    </script>
    <script src="pageContact.js"></script>
    <!-- ? ION ICONS  -->
    <script
        type="module"
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
      ></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
