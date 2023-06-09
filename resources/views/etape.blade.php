<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GESTION AGRICOLE</title>
    <link rel="shortcut icon" href="{{ URL::asset('iconagri.png') }}" type="image/x-icon" />
    <!-- ? Swiper CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <!-- ? My CSS -->
    <link rel="stylesheet" href="pageServices.css" />

    <!-- ? Fonts Google -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <!-- ?Arrow up -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <!-- ? Ion icons :  -->
    <link
      href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"
      rel="stylesheet"
    />
    <!-- ? KUTE cdn  -->
    <script src="
    https://cdn.jsdelivr.net/npm/kute.js@2.2.4/dist/kute.min.js
    "></script>

    <!-- ? Animate.css CDN  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- ? jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous"
    ></script>
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
    <!-- ! header -->
    <header class="header">
      <div class="container">
        <div class="header-main">
          <div class="logoro">
            <img
              src="./imgs/Green and White Modern Beauty Studio Website (1).png"
              alt=""
            />
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

    <div class="middle">
      <div class="card">
        <div class="vidCard">
        <video  class="bigVid" controls>
         
         <source src="./imgs/bigONev2.mp4" type="video/mp4" />
     </video>
        </div>
      </div>
    </div>

    <div class="holder2">
      <div class="progressive">
        <div class="pulse pl1">
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
        <div class="pulse pl2">
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
        <div class="pulse pl3">
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
        <div class="pulse pl4">
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
      </div>

      <div class="LesEtapes">
        <div class="apt rp1">
          <div class="pulse pl1 3wj">
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
          <h1 class="no"><span class="bluy">Authentifiez</span> Vous</h1>
          <p>
            Cliquez sur l'option "COMMENCER" pour accéder au formulaire
            d'aythentification. Remplissez les informations demandées dans le
            formulaire.
          </p>
          <div class="vidInside vid1"><video style="width:100%; height=100%; " muted autoplay loop>
         
    <source src="./imgs/loginver3.mp4" type="video/mp4" />
</video></div>
        </div>
        <div class="apt rp2">
          <div class="pulse pl2 3wj">
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
          <h1 class="no">Acceder au <span class="bluy"> Dashboard</span></h1>
          <p>
            Une fois connecté, recherchez et sélectionnez l'option "Dashboard"
            dans le menu principal ou dans la barre de navigation supérieure.
            Vous serez redirigé vers la page du dashboard, où vous trouverez un
            aperçu des différentes fonctionnalités
          </p>
          <div class="vidInside vid2">
          <video style="width:100%; height=100%; " muted autoplay loop>
         
         <source src="./imgs/dashboardver3.mp4" type="video/mp4" />
     </video>
          </div>
        </div>
        <div class="apt rp3">
          <div class="pulse pl3 3wj">
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
          <h1 class="no">
            <span class="bluy">Enregistrez</span> Vos Parcelles
          </h1>
          <p>
            Après avoir accédé au dashboard, vous pouvez sélectionner l'option
            "Parcelles" pour accéder à un formulaire permettant de saisir et
            sauvegarder les informations relatives aux différentes parcelles.
          </p>
          <div class="vidInside vid3"> <video style="width:100%; height=100%; " muted autoplay loop>
         
         <source src="./imgs/parcellever3.mp4" type="video/mp4" />
     </video></div>
        </div>
        <div class="apt rp4">
          <div class="pulse pl4 3wj">
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
          <h1 class="no"><span class="bluy">GESTIONNER !</span></h1>
          <p>
            Suite au choix du parcelle vous puvez commencer la gestion des
            employes,du materiels,Finance,etc......
          </p>
          <div class="vidInside vid4"> <video style="width:100%; height=100%; " muted autoplay loop>
         
         <source src="./imgs/gestionner lastver3.mp4" type="video/mp4" />
     </video></div>
        </div>
      </div>
      <div class="SomeVideos">
        <div class="vid vid1">
        <video style="width: 100%;height: 100%;background-size: cover;background-position: center;" muted autoplay loop>
         
         <source src="./imgs/loginver3.mp4" type="video/mp4" />
     </video>

        </div>
        <div class="vid vid2">
        <video style="width: 100%;height: 100%;background-size: cover;background-position: center;" muted autoplay loop>
         
         <source src="./imgs/dashboardver3.mp4" type="video/mp4" />
     </video>

        </div>
        <div class="vid vid3">
<video style="width: 100%;height: 100%;background-size: cover;background-position: center;" muted autoplay loop>
         
         <source src="./imgs/parcellever3.mp4" type="video/mp4" />
     </video>

        </div>
        <div class="vid vid4"><video style="width: 100%;height: 100%;background-size: cover;background-position: center;" muted autoplay loop>
         
         <source src="./imgs/gestionner lastver3.mp4" type="video/mp4" />
     </video></div>
      </div>
    </div>

    <a href="" id="scrollUP">
      <span class="material-symbols-outlined"> arrow_upward </span>
    </a>

    <!-- ! footer -->
    <footer>
      <div class="contenar2">
        <ul class="contacLinks">
          <!-- ? link -->
          <li><a href="#">Contactez-nous</a></li>
          <li><a href="#">A propos </a></li>
          <li><a href="#">Services</a></li>
        </ul>

        <ul class="comm">
          <h3><span>GESTIONNER</span> Votre Parcelle</h3>
          <li class="simp footer"><a href="#">COMMENCER</a></li>
        </ul>
        <ul class="moreLinks">
          <!-- ? link -->
          <li><a href="#">Etapes</a></li>
          <li><a href="#">Dev Team</a></li>
          <li><a href="#">Inscrire</a></li>
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
      <svg
        class="blob-motion1"
        id="visual"
        viewBox="0 0 900 600"
        width="900"
        height="600"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        version="1.1"
      >
        <g transform="translate(483.35964054826786 264.5188399381987)">
          <path
            id="blob1"
            d="M182.5 -34.6C215.5 42 206.5 156.9 144 203.6C81.5 250.3 -34.5 228.7 -126.8 164.1C-219.2 99.4 -287.9 -8.2 -262.8 -74C-237.8 -139.8 -118.9 -163.6 -22 -156.5C74.8 -149.3 149.6 -111.1 182.5 -34.6"
            fill="#025555"
          ></path>
        </g>
        <g transform="translate(493.94422302715816 292.5955318587451)">
          <path
            id="blob2"
            d="M182.6 -63.2C201 -2.8 155.6 74.5 85.2 128.1C14.9 181.8 -80.4 211.8 -158.2 167.2C-236 122.6 -296.3 3.4 -267.1 -72.1C-237.8 -147.6 -118.9 -179.3 -18.4 -173.3C82.1 -167.3 164.2 -123.7 182.6 -63.2"
            fill="#025555"
          ></path>
        </g>
      </svg>
      <svg
        id="visual"
        class="blob-motion2"
        viewBox="0 0 900 600"
        width="900"
        height="600"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        version="1.1"
      >
        <g transform="translate(402.8073318996174 279.51326344686004)">
          <path
            id="blob11"
            d="M262.9 -73.9C288.1 -7.9 219.6 100 134.4 154.8C49.2 209.5 -52.7 211.2 -112 165.4C-171.2 119.7 -187.8 26.6 -162.1 -40.1C-136.3 -106.8 -68.2 -147.2 25.4 -155.4C118.9 -163.6 237.8 -139.8 262.9 -73.9"
            fill="#84BD3A"
          ></path>
        </g>
        <g transform="translate(418.3762369981514 331.724540914671)">
          <path
            id="blob22"
            d="M260.1 -93.2C282.4 -15.8 208.2 84.3 130.4 128.9C52.6 173.5 -28.8 162.6 -95.8 117.4C-162.9 72.1 -215.5 -7.5 -197.2 -79.5C-178.8 -151.4 -89.4 -215.7 14.7 -220.5C118.9 -225.3 237.8 -170.6 260.1 -93.2"
            fill="#84BD3A"
          ></path>
        </g>
      </svg>

      <script>
        const tween1 = KUTE.fromTo(
          "#blob1", // the initial path
          {
            path: "#blob1",
          },
          {
            path: "#blob2",
          },
          {
            repeat: 999,
            duration: 3000,
            yoyo: true,
          }
        );
        const tween2 = KUTE.fromTo(
          "#blob11", // the initial path
          {
            path: "#blob11",
          },
          {
            path: "#blob22",
          },
          {
            repeat: 999,
            duration: 3000,
            yoyo: true,
          }
        );
        tween1.start();
        tween2.start();
      </script>
    </footer>
    <!-- ? Waypoints cdn :  -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"
      integrity="sha512-ZKNVEa7gi0Dz4Rq9jXcySgcPiK+5f01CqW+ZoKLLKr9VMXuCsw3RjWiv8ZpIOa0hxO79np7Ec8DDWALM0bDOaQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
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
        offset: "80%",
      };

      $(".card").waypoint(function () {
        $(".card").addClass("animate__animated animate__fadeInDown");
      }, offset);
      // rp[1-4]
      $(".rp1").waypoint(function () {
        $(".rp1").addClass("animate__animated animate__fadeIn");
      }, offset);
      $(".rp2").waypoint(function () {
        $(".rp2").addClass("animate__animated animate__fadeIn");
      }, offset);
      $(".rp3").waypoint(function () {
        $(".rp3").addClass("animate__animated animate__fadeIn");
      }, offset);
      $(".rp4").waypoint(function () {
        $(".rp4").addClass("animate__animated animate__fadeIn");
      }, offset);
      //vid[1-4]
      $(".vid1").waypoint(function () {
        $(".vid1").addClass("animate__animated animate__fadeInRight");
      }, offset);
      $(".vid2").waypoint(function () {
        $(".vid2").addClass("animate__animated animate__fadeInRight");
      }, offset);
      $(".vid3").waypoint(function () {
        $(".vid3").addClass("animate__animated animate__fadeInRight");
      }, offset);
      $(".vid4").waypoint(function () {
        $(".vid4").addClass("animate__animated animate__fadeInRight");
      }, offset);
    </script>
    <script src="pageServices.js"></script>
    <!-- ? ION ICONS  -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
