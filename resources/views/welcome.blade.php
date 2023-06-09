<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GESTION AGRICOLE</title>
    <link rel="shortcut icon" href="{{ URL::asset('iconagri.png') }}" type="image/x-icon" />
    <!-- ? Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- ? My CSS -->
    <link rel="stylesheet" href="pageAccueil.css" />


    <!-- ? Fonts Google -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- ? Animate.css CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<!-- ?Arrow up -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<!-- ? Ion icons :  -->
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet" />
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
    <!-- <header class="header">
      <div class="logo">
        <img
          src="./imgs/Green and White Modern Beauty Studio Website (1).png"
          alt=""
        />
      </div>
      <div class="navigation">
        <input type="checkbox" id="nav-checkbox" />
        <label for="nav-checkbox" class="nav-toggle">
          <i class="open">
            <ion-icon name="menu-sharp"></ion-icon>
          </i>
          <i class="close">
            <ion-icon name="close"></ion-icon>
          </i>

        </label>

        <ul class="nav-menu">
          <li><a href="#" class="link">Contact</a></li>
          <li><a href="#" class="link">About Us</a></li>
          <li><a href="#" class="link">Services</a></li>
          <li><a href="#" class="link">Etapes</a></li>

          <li class="simp"><a href="#">COMMENCER</a></li>
        </ul>
      </div>
    </header> -->

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

    <div class="hero">
        <h1><span>GESTION</span> AGRICOLE</h1>
        <h3>Meilleure application de gestion des parcelles</h3>
        <!-- ? link -->
        <a href="#"><span></span>Voir Nos Services</a>
    </div>
    <div class="goDown">
        <a href="#content1">
            <span class="material-symbols-outlined"> expand_more </span></a>
    </div>
    <div class="content" id="content1">
        <div class="textArea1 para1">
            <img src="./imgs/parcellepic1.jpg" alt="" class="ir1" />
            <div class="apt pr1">
                <h1>Gestion des parcelles</h1>
                <p>
                    Avec notre application web, vous pouvez facilement gérer vos
                    parcelles de culture. Ajoutez, modifiez et supprimez des parcelles
                    en quelques clics. Suivez l'évolution de vos cultures et recevez des
                    alertes en cas de problèmes.
                </p>
                <div id="container">
                    <button class="learn-more">
                        <div class="circle">
                            <span class="icon arrow"></span>
                        </div>
                        <p class="button-text">Savoir Plus !</p>
                    </button>
                </div>
            </div>
        </div>
        <!-- <div class="layer1 spacer1"></div> -->
        <div class="textArea1 para2">
            <div class="apt pr2">
                <h1 class="no">Gestion des récoltes</h1>
                <p>
                    Gardez une trace de toutes vos récoltes avec notre application.
                    Entrez les détails de chaque récolte, y compris la date, la quantité
                    et la qualité. Comparez les récoltes au fil du temps pour mieux
                    comprendre les variations et améliorer vos rendements.
                </p>
                <div id="container">
                    <button class="learn-more">
                        <div class="circle">
                            <span class="icon arrow"></span>
                        </div>
                        <p class="button-text">Savoir Plus !</p>
                    </button>
                </div>
            </div>
            <img src="./imgs/recoltepic1.jpg" alt="" class="oreo ir2" />
        </div>
        <!-- <div class="spacer1 layer2"></div> -->
        <!-- <div class="spacer layer1"></div> -->
        <div class="textArea1 para3">
            <img src="./imgs/culturepic2.jpg" alt="" class="ir3" />
            <div class="apt pr3">
                <h1 class="meh">Gestion de cultivation</h1>
                <p>
                    Notre site web vous offre une solution complète pour gérer efficacement la cultivation dans vos
                    parcelles de
                    terrain. Vous pouvez facilement ajouter, organiser et suivre l'évolution de vos cultures en
                    enregistrant les
                    dates de semis, de récolte et les traitements effectués.
                </p>
                <div id="container">
                    <button class="learn-more">
                        <div class="circle">
                            <span class="icon arrow"></span>
                        </div>
                        <p class="button-text">Savoir Plus !</p>
                    </button>
                </div>
            </div>
        </div>
        <!-- <div class="spacer1 layer3"></div> -->

        <!-- <div class="spacer2 layer3"></div> -->
        <div class="textArea1 para4">
            <div class="apt pr4">
                <h1 class="no">Gestion des employés</h1>
                <p>
                    Si vous avez des employés, notre application vous permet de suivre
                    leur temps de travail, leur salaire et leurs congés. Assignez des
                    tâches à vos employés et suivez leur progression.
                </p>
                <div id="container">
                    <button class="learn-more">
                        <div class="circle">
                            <span class="icon arrow"></span>
                        </div>
                        <p class="button-text">Savoir Plus !</p>
                    </button>
                </div>
            </div>
            <img src="./imgs/employepic1.jpg" alt="" class="oreo ir4" />
        </div>
        <!-- <div class="spacer1 layer4"></div> -->
    </div>

    <div class="beforegifs">
        <h2><span>Maximiser </span> Votre productivité</h2>
        <p>
            En offrant des outils puissants et faciles à utiliser, cette application
            vise à simplifier la gestion des parcelles, du recolte et des employés
            pour que les utilisateurs puissent se concentrer sur ce qui est le plus
            important pour eux.
        </p>
    </div>
    <div class="gifs">
        <div class="gif cr1">
            <div class="image">
                <img src="./imgs/money-bag.gif" alt="" />
            </div>
            <h2>Economiser</h2>
            <div class="stext">
                Cette application est également conçue pour aider les utilisateurs à
                garder et à économiser leur budget. Grâce à des fonctionnalités
                avancées telles que le suivi des dépenses, la budgétisation et la
                planification financière, les utilisateurs peuvent avoir une vue
                d'ensemble claire de leurs finances.
            </div>
        </div>
        <div class="gif cr2">
            <div class="image">
                <img src="./imgs/award.gif" alt="" />
            </div>
            <h2>Controler la qualité</h2>
            <div class="stext">
                Cette application offre des outils pour suivre la croissance des
                cultures, surveiller les niveaux d'humidité et de température, et
                évaluer la qualité des récoltes en temps réel. Grâce à ces
                fonctionnalités, les utilisateurs peuvent surveiller leur production
                agricole de manière proactive.
            </div>
        </div>
        <div class="gif cr3">
            <div class="image">
                <img src="./imgs/line-chart.gif" alt="" />
            </div>
            <h2>Productivité</h2>
            <div class="stext">
                Cette application est conçue pour aider les utilisateurs à augmenter
                leur productivité en offrant une variété d'outils et de
                fonctionnalités. Elle permet aux utilisateurs de suivre leur temps,
                d'organiser leur emploi du temps et de gérer leur travail de manière
                plus efficace.
            </div>
        </div>
        <div class="gif cr4">
            <div class="image">
                <img src="./imgs/support.gif" alt="" />
            </div>
            <h2>Service Client</h2>
            <div class="stext">
                Cette application dispose également d'un service client de qualité
                pour aider les utilisateurs en cas de besoin. Les utilisateurs peuvent
                contacter facilement le service client via différentes options de
                communication telles que le chat en direct, l'e-mail ou le téléphone.
            </div>
        </div>
    </div>

    <!-- ? Slider -->
    <!-- <swiper-container
      class="mySwiper"
      pagination="true"
      pagination-clickable="true"
      navigation="true"
      space-between="30"
      centered-slides="true"
      autoplay-delay="2500"
      autoplay-disable-on-interaction="false"
    >
      <swiper-slide>
        <div class="cmnt">
          <div class="imageCmnt"><img src="./imgs/farmer1.jpg" alt="" /></div>
          <div>
            <h4>Mohammed</h4>
          </div>
          <div class="comment">
            <h5>
              J'ai été impressionné par l'application de gestion de parcelles et
              de cultures que vous avez développée. L'interface est conviviale
              et facile à naviguer, ce qui facilite l'utilisation de
              l'application même pour les personnes qui ne sont pas très
              familières avec la technologie.
            </h5>
          </div>
        </div>
      </swiper-slide>
      <swiper-slide>Slide 2</swiper-slide>
      <swiper-slide>Slide 3</swiper-slide>
      <swiper-slide>Slide 4</swiper-slide>
      <swiper-slide>Slide 5</swiper-slide>
      <swiper-slide>Slide 6</swiper-slide>
      <swiper-slide>Slide 7</swiper-slide>
      <swiper-slide>Slide 8</swiper-slide>
      <swiper-slide>Slide 9</swiper-slide>
    </swiper-container> -->
    <div class="beforegifs beforeGifsmobile">
        <h2><span>Avis</span> de nos clients</h2>
    </div>
    <section class="sliderPlsWork">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="cmnt">
                        <div class="imageCmnt">
                            <img src="./imgs/farmer1.jpg" alt="" />
                        </div>
                        <div>
                            <h4>Mohammed(Agriculteur)</h4>
                        </div>
                        <div class="comment">
                            <h5>
                                J'ai été impressionné par l'application de gestion de
                                parcelles et de cultures que vous avez développée. L'interface
                                est conviviale et facile à naviguer
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="cmnt">
                        <div class="imageCmnt">
                            <img src="./imgs/farmer2.jpg" alt="" />
                        </div>
                        <div>
                            <h4>Youness(Agriculteur)</h4>
                        </div>
                        <div class="comment">
                            <h5>
                                Je suis très satisfait de l'application de gestion de parcelles et de cultures que vous
                                avez créée. Elle
                                m'a aidé à optimiser mes activités agricoles, à planifier mes cultures de manière plus
                                efficace et à
                                prendre des décisions éclairées.
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="cmnt">
                        <div class="imageCmnt">
                            <img src="./imgs/famer4.jpg" alt="" />
                        </div>
                        <div>
                            <h4>Saad(Agriculteur)</h4>
                        </div>
                        <div class="comment">
                            <h5>
                                Je suis très impressionné par l'application de gestion de
                                parcelles et de cultures que vous avez développée. Elle est
                                extrêmement complète et offre une multitude de fonctionnalités
                                utiles pour les agriculteurs.
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="contenar">
                        <div class="imgSlider">
                            <img src="imgs/list.gif" alt="" />
                        </div>
                        <div class="textSlider">
                            <h2><span>Beneficer</span> de notre application</h2>
                            <div id="container">
                                <button class="learn-more">
                                    <div class="circle">
                                        <span class="icon arrow"></span>
                                    </div>
                                    <a href="{{ route('login') }}"><p class="button-text">Commencer !</p></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>
        <div class="pagination_">
            <div class="swiper-button-prev">
                <img src="./imgs/back.svg" alt="" />
            </div>
            <div class="swiper-button-next">
                <img \ src="./imgs/forward.svg" alt="" />
            </div>
        </div>
    </section>

    <!-- <a href="" id="scrollUp">
      <ion-icon name="arrow-round-up"></ion-icon>
    </a> -->
    <a href="" id="scrollUP">
        <span class="material-symbols-outlined"> arrow_upward </span>
    </a>
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
                <li class="simp footer">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">COMMENCER</a>

                        @endauth
                    @endif
                </li>
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
    <script src="pageAccueil.js"></script>
    <!-- ? Swiper CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <script type="module">
    import Swiper from "https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.esm.browser.min.js";
    const swiper = new Swiper(".swiper", {
      speed: 400,
      spaceBetween: 10,
      slidesPerView: 1,
      pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true,
        bulletActiveClass: "swiper-pagination-bullet-active",
        bulletClass: "swiper-pagination-bullet",
        dynamicBullets: true,
        dynamicMainBullets: 3,
      },

      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      loop: true,
      autoplay: {
        delay: 3000,
      },
    });
  </script>

    <!-- ? Waypoints cdn :  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"
        integrity="sha512-ZKNVEa7gi0Dz4Rq9jXcySgcPiK+5f01CqW+ZoKLLKr9VMXuCsw3RjWiv8ZpIOa0hxO79np7Ec8DDWALM0bDOaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ? JQUERY SCRIPT -->
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

        let offset = {
            offset: "80%"
        };
        // ir1 and pr1
        $(".ir1").waypoint(function() {
            $(".ir1").addClass("animate__animated animate__fadeInLeft");
        }, offset);
        $(".pr1").waypoint(function() {
            $(".pr1").addClass("animate__animated animate__fadeInRight");
        }, offset);

        // ir2 and pr2
        $(".ir2").waypoint(function() {
            $(".ir2").addClass("animate__animated animate__fadeInRight");
        }, offset);
        $(".pr2").waypoint(function() {
            $(".pr2").addClass("animate__animated animate__fadeInLeft");
        }, offset);

        // ir3 and pr3
        $(".ir3").waypoint(function() {
            $(".ir3").addClass("animate__animated animate__fadeInLeft");
        }, offset);
        $(".pr3").waypoint(function() {
            $(".pr3").addClass("animate__animated animate__fadeInRight");
        }, offset);

        //or4 and pr4
        $(".ir4").waypoint(function() {
            $(".ir4").addClass("animate__animated animate__fadeInRight");
        }, offset);
        $(".pr4").waypoint(function() {
            $(".pr4").addClass("animate__animated animate__fadeInLeft");
        }, offset);

        //cr[1-4]
        $(".cr1").waypoint(function() {
            $(".cr1").addClass("animate__animated animate__fadeInLeft");
        }, offset);
        $(".cr2").waypoint(function() {
            $(".cr2").addClass("animate__animated animate__fadeInLeft");
        }, offset);
        $(".cr3").waypoint(function() {
            $(".cr3").addClass("animate__animated animate__fadeInLeft");
        }, offset);
        $(".cr4").waypoint(function() {
            $(".cr4").addClass("animate__animated animate__fadeInLeft");
        }, offset);
    </script>

    <!-- ? ION ICONS  -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
<!-- #00CBCC -->
