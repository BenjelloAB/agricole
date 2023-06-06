<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300;400;500;600;700&display=swap");

        *,
        *::before,
        *::after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        input {
            font-family: "Poppins", sans-serif;
        }

        main {
            width: 100%;
            min-height: 100vh;
            /* overflow: hidden; */
            background-color: #84BD3A;
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box {
            position: relative;
            width: 100%;
            max-width: 1020px;
            height: 640px;
            background: #fff;
            border-radius: 3.3rem;
            -webkit-border-radius: 3.3rem;
            -moz-border-radius: 3.3rem;
            -ms-border-radius: 3.3rem;
            -o-border-radius: 3.3rem;
            box-shadow: 0 60px 40px -30px rgba(0, 0, 0, 0.27);
            overflow: hidden;
        }

        .inner-box {
            position: absolute;
            width: calc(100% - 4.1rem);
            height: calc(100% - 4.1rem);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
        }

        .forms-wrap {
            position: absolute;
            height: 100%;
            width: 45%;
            top: 0;
            left: -51px;
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            transition: 0.8s ease-in-out;
            -webkit-transition: 0.8s ease-in-out;
            -moz-transition: 0.8s ease-in-out;
            -ms-transition: 0.8s ease-in-out;
            -o-transition: 0.8s ease-in-out;
        }

        form {
            max-width: 260px;
            width: 100%;
            margin: 0 auto;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            transition: opacity 0.02s 0.4s;
            -webkit-transition: opacity 0.02s 0.4s;
            -moz-transition: opacity 0.02s 0.4s;
            -ms-transition: opacity 0.02s 0.4s;
            -o-transition: opacity 0.02s 0.4s;
        }

        form.sign-up-form {
            opacity: 0;
            pointer-events: none;
        }

        .actual-form {
            margin-top: 66px;
            margin-bottom: 56px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 63px;
            transform: translate(-5px, -6px);
        }

        .logo h4 {
            font-size: 1.5rem;
            margin-top: -9px;
            letter-spacing: -0.5px;
            color: #151111;
        }

        .heading h2 {
            font-size: 2.1rem;
            font-weight: 600;
            color: #151111;
        }

        .heading h6 {
            color: rgb(121, 121, 121);
            font-weight: 400;
            font-size: 0.75rem;
            display: inline;
        }

        .toggle {
            color: #151515;
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 500;
            transition: 0.3s;
            -webkit-transition: 0.3s;
            -moz-transition: 0.3s;
            -ms-transition: 0.3s;
            -o-transition: 0.3s;
        }

        .toggle:hover {
            color: #009e9e;
        }

        .input-wrap {
            position: relative;
            height: 37px;
            margin-bottom: 2rem;
        }

        .input-field {
            position: absolute;
            width: 100%;
            height: 100%;
            background: none;
            outline: none;
            border: none;
            border-bottom: 1px solid #bbb;
            padding: 0;
            font-size: 0.95rem;
            color: #151111;
            transition: 0.4s;
            -webkit-transition: 0.4s;
            -moz-transition: 0.4s;
            -ms-transition: 0.4s;
            -o-transition: 0.4s;
        }

        label {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            color: rgb(121, 121, 121);
            pointer-events: none;
            transition: 0.4s;
            -webkit-transition: 0.4s;
            -moz-transition: 0.4s;
            -ms-transition: 0.4s;
            -o-transition: 0.4s;
        }

        .input-field.active {
            border-bottom-color: #151111;
        }

        .input-field.active+label {
            font-size: 0.75rem;
            top: -2px;
        }

        .sign-btn {
            display: inline-block;
            width: 100%;
            height: 43px;
            width: 100%;
            background-color: #151111;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 0.8rem;
            -webkit-border-radius: 0.8rem;
            -moz-border-radius: 0.8rem;
            -ms-border-radius: 0.8rem;
            -o-border-radius: 0.8rem;
            font-size: 0.8rem;
            margin-bottom: 2rem;
            transition: 0.3s;
            -webkit-transition: 0.3s;
            -moz-transition: 0.3s;
            -ms-transition: 0.3s;
            -o-transition: 0.3s;
        }

        .sign-btn:hover {
            background-color: #84BD3A;
        }

        .text {
            color: rgb(121, 121, 121);
            font-size: 0.7rem;
        }

        .text a {
            color: rgb(121, 121, 121);
            transition: 0.3s;
            -webkit-transition: 0.3s;
            -moz-transition: 0.3s;
            -ms-transition: 0.3s;
            -o-transition: 0.3s;
        }

        .text a:hover {
            color: #fd7171;
        }

        main.sign-up-mode form.sign-in-form {
            opacity: 0;
            pointer-events: none;
        }

        main.sign-up-mode form.sign-up-form {
            opacity: 1;
            pointer-events: all;
        }

        main.sign-up-mode .forms-wrap {
            left: 55%;
        }

        main.sign-up-mode .carousel {
            left: 0;
        }

        .carousel {
            position: absolute;
            height: 100%;
            width: 55%;
            left: 45%;
            top: 0;
            background-color: #84BD3A;
            border-radius: 2rem;
            display: grid;
            -webkit-border-radius: 2rem;
            -moz-border-radius: 2rem;
            -ms-border-radius: 2rem;
            -o-border-radius: 2rem;
            grid-template-rows: auto 1fr;
            padding-bottom: 2rem;
            overflow: hidden;
            transition: 0.8s ease-in-out;
            -webkit-transition: 0.8s ease-in-out;
            -moz-transition: 0.8s ease-in-out;
            -ms-transition: 0.8s ease-in-out;
            -o-transition: 0.8s ease-in-out;
        }

        .images-wrapper {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;

        }

        .image {
            /* margin-top: 70px; */
            width: 100%;
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            opacity: 0;
            transition: opacity 0.3s, transform 0.5s;
            -webkit-transition: opacity 0.3s, transform 0.5s;
            -moz-transition: opacity 0.3s, transform 0.5s;
            -ms-transition: opacity 0.3s, transform 0.5s;
            -o-transition: opacity 0.3s, transform 0.5s;
        }

        .img-1 {
            transform: translate(0, -50px);
            -webkit-transform: translate(0, -50px);
            -moz-transform: translate(0, -50px);
            -ms-transform: translate(0, -50px);
            -o-transform: translate(0, -50px);
        }

        .img-2 {
            transform: scale(0.4, 0.5);
            -webkit-transform: scale(0.4, 0.5);
            -moz-transform: scale(0.4, 0.5);
            -ms-transform: scale(0.4, 0.5);
            -o-transform: scale(0.4, 0.5);
        }

        .img-3 {
            transform: scale(0.3) rotate(-20deg);
            -webkit-transform: scale(0.3) rotate(-20deg);
            -moz-transform: scale(0.3) rotate(-20deg);
            -ms-transform: scale(0.3) rotate(-20deg);
            -o-transform: scale(0.3) rotate(-20deg);
        }

        .image.show {
            opacity: 1;
            transform: none;
            -webkit-transform: none;
            -moz-transform: none;
            -ms-transform: none;
            -o-transform: none;
        }

        .text-slider {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            transform: translate(5px, -68%);
        }

        .text-wrap {
            max-height: 2.2rem;
            overflow: hidden;
            margin-bottom: 2.5rem;
        }

        .text-group {
            display: flex;
            flex-direction: column;
            text-align: center;
            transform: translateY(0);
            transition: 0.5s;
            -webkit-transform: translateY(0);
            -moz-transform: translateY(0);
            -ms-transform: translateY(0);
            -o-transform: translateY(0);
            -webkit-transition: 0.5s;
            -moz-transition: 0.5s;
            -ms-transition: 0.5s;
            -o-transition: 0.5s;
        }

        .text-group h2 {
            line-height: 2.2rem;
            font-weight: 600;
            font-size: 1.6rem;
        }

        .bullets {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bullets span {
            display: block;
            width: 0.5rem;
            height: 0.5rem;
            background-color: #000;
            margin: 0 0.25rem;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
            -webkit-transition: 0.3s;
            -moz-transition: 0.3s;
            -ms-transition: 0.3s;
            -o-transition: 0.3s;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
        }

        .bullets span.active {
            width: 1rem;
            background-color: #151111;
            border-radius: 1rem;
            -webkit-border-radius: 1rem;
            -moz-border-radius: 1rem;
            -ms-border-radius: 1rem;
            -o-border-radius: 1rem;
        }

        @media (max-width: 900px) {
            .box {
                height: auto;
                overflow: hidden;
                max-width: 550px;
            }

            .inner-box {
                position: static;
                transform: none;
                width: revert;
                -webkit-transform: none;
                -moz-transform: none;
                -ms-transform: none;
                -o-transform: none;
                height: revert;
                padding: 2rem;
            }

            .forms-wrap {
                position: revert;
                width: 100%;
                height: auto;
            }

            form {
                max-width: revert;
                /* padding: 1.5rem 2.5rem 2rem; */
                padding: 23px;
                transition: transform 0.8s ease-in-out, opacity 0.45s linear;
                -webkit-transition: transform 0.8s ease-in-out, opacity 0.45s linear;
                -moz-transition: transform 0.8s ease-in-out, opacity 0.45s linear;
                -ms-transition: transform 0.8s ease-in-out, opacity 0.45s linear;
                -o-transition: transform 0.8s ease-in-out, opacity 0.45s linear;
            }

            .heading {
                margin: 2rem;
            }

            main.sign-up-mode form.sign-in-form {
                transform: translateX(0%);
                -webkit-transform: translateX(0%);
                -moz-transform: translateX(0%);
                -ms-transform: translateX(0%);
                -o-transform: translateX(0%);
            }

            .carousel {
                position: revert;
                height: auot;
                width: 100%;
                padding: 2rem 3rem;
                display: flex;
            }

            .images-wrapper {
                display: none;
            }

            .text-slider {
                width: 100%;
            }

            .text-slider {
                transform: translate(5px, 1%);
            }
        }

        .text {
            position: relative;
            z-index: 1;
        }

        .text a:hover {
            color: #84BD3A;
        }

        /* ?Terms and conditions :  */
        .checkbox-wrapper-12 {
            position: relative;
            transform: translate(-24px, -36px);
        }

        .checkbox-wrapper-12>svg {
            position: absolute;
            top: -130%;
            left: -170%;
            width: 110px;
            pointer-events: none;
        }

        .checkbox-wrapper-12 * {
            box-sizing: border-box;
        }

        .checkbox-wrapper-12 input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-tap-highlight-color: transparent;
            cursor: pointer;
            margin: 0;
        }

        .checkbox-wrapper-12 input[type="checkbox"]:focus {
            outline: 0;
        }

        .checkbox-wrapper-12 .cbx {
            width: 24px;
            height: 24px;
            top: calc(100px - 12px);
            left: calc(100px - 12px);
        }

        .checkbox-wrapper-12 .cbx input {
            position: absolute;
            top: 1px;
            left: 0;
            width: 19px;
            height: 19px;
            border: 2px solid #bfbfc0;
            border-radius: 50%;
        }

        .checkbox-wrapper-12 .cbx label {
            width: 19px;
            height: 19px;
            background: none;
            border-radius: 50%;
            position: absolute;
            top: 11px;
            left: 0;
            transform: trasnlate3d(0, 0, 0);
            pointer-events: none;
            -webkit-transform: trasnlate3d(0, 0, 0);
            -moz-transform: trasnlate3d(0, 0, 0);
            -ms-transform: trasnlate3d(0, 0, 0);
            -o-transform: trasnlate3d(0, 0, 0);
        }

        .checkbox-wrapper-12 .cbx svg {
            position: absolute;
            top: 4px;
            width: 12px;
            left: 3.2px;
            z-index: 1;
            pointer-events: none;
        }

        .checkbox-wrapper-12 .cbx svg path {
            stroke: #fff;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 19;
            stroke-dashoffset: 19;
            transition: stroke-dashoffset 0.3s ease;
            transition-delay: 0.2s;
            -webkit-transition: stroke-dashoffset 0.3s ease;
            -moz-transition: stroke-dashoffset 0.3s ease;
            -ms-transition: stroke-dashoffset 0.3s ease;
            -o-transition: stroke-dashoffset 0.3s ease;
        }

        .checkbox-wrapper-12 .cbx input:checked+label {
            animation: splash-12 0.6s ease forwards;
            -webkit-animation: splash-12 0.6s ease forwards;
        }

        .checkbox-wrapper-12 .cbx input:checked+label+svg path {
            stroke-dashoffset: 0;
        }

        @-moz-keyframes splash-12 {
            40% {
                background: #84BD3A;
                box-shadow: 0 -18px 0 -8px #84BD3A, 16px -8px 0 -8px #84BD3A,
                    16px 8px 0 -8px #84BD3A, 0 18px 0 -8px #84BD3A, -16px 8px 0 -8px #84BD3A,
                    -16px -8px 0 -8px #84BD3A;
            }

            100% {
                background: #84BD3A;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent,
                    32px 16px 0 -10px transparent, 0 36px 0 -10px transparent,
                    -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
            }
        }

        @-webkit-keyframes splash-12 {
            40% {
                background: #84BD3A;
                box-shadow: 0 -18px 0 -8px #84BD3A, 16px -8px 0 -8px #84BD3A,
                    16px 8px 0 -8px #84BD3A, 0 18px 0 -8px #84BD3A, -16px 8px 0 -8px #84BD3A,
                    -16px -8px 0 -8px #84BD3A;
            }

            100% {
                background: #84BD3A;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent,
                    32px 16px 0 -10px transparent, 0 36px 0 -10px transparent,
                    -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
            }
        }

        @-o-keyframes splash-12 {
            40% {
                background: #84BD3A;
                box-shadow: 0 -18px 0 -8px #84BD3A, 16px -8px 0 -8px #84BD3A,
                    16px 8px 0 -8px #84BD3A, 0 18px 0 -8px #84BD3A, -16px 8px 0 -8px #84BD3A,
                    -16px -8px 0 -8px #84BD3A;
            }

            100% {
                background: #84BD3A;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent,
                    32px 16px 0 -10px transparent, 0 36px 0 -10px transparent,
                    -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
            }
        }

        @keyframes splash-12 {
            40% {
                background: #84BD3A;
                box-shadow: 0 -18px 0 -8px #84BD3A, 16px -8px 0 -8px #84BD3A,
                    16px 8px 0 -8px #84BD3A, 0 18px 0 -8px #84BD3A, -16px 8px 0 -8px #84BD3A,
                    -16px -8px 0 -8px #84BD3A;
            }

            100% {
                background: #84BD3A;
                box-shadow: 0 -36px 0 -10px transparent, 32px -16px 0 -10px transparent,
                    32px 16px 0 -10px transparent, 0 36px 0 -10px transparent,
                    -32px 16px 0 -10px transparent, -32px -16px 0 -10px transparent;
            }
        }

        /* ? Terms and agree sign up button  */
        #signup {
            cursor: not-allowed;
            background-color: #bfbfc0;
        }

        #signup.agree {
            cursor: pointer;
            background-color: #000;
        }

        /* ? Preloader */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.8px);
            -webkit-backdrop-filter: blur(8.8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            background-color: rgba(255, 255, 255, 0.15);
            background-color: #84BD3A;
        }

        .loader img {
            width: 71px;
            height: 71px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .content {
            /* opacity: 0; */
            display: none;
        }

        body {
            background-color: #84BD3A;
        }

        @media screen and (max-width:530px) {
            .logo img {
                width: 52px;

            }

            .heading {
                margin: 39px 0;
            }

            .heading h2 {
                font-size: 23px;
                text-align: center;
            }

            .carousel {
                display: none;
            }

            .inner-box {
                padding: 0;
            }

            .logo h4 {
                font-size: 1.7rem;
            }

            main {
                padding: 1.2rem;
            }
        }

        @media screen and (max-width:280px) {
            .logo h4 {
                font-size: 0.9rem;
            }

            .heading h2 {
                font-size: 21px;
            }

            .heading {
                margin: 39px 0;
                margin-bottom: 0;
            }
        }

        @media screen and (max-width:310px) {
            .logo h4 {
                font-size: 1.3rem;
            }

            .heading {
                margin: 39px 0;
                margin-bottom: 0;
            }

        }
        .errore {
            color: red;
            transform: translate(0px, 111px);
            font-size: 10px;
        }
    </style>

    <!-- ? jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="loader">
        <img src="imgs//816.svg" alt="">
    </div>
    <main class="content">
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form class="sign-in-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="logo">
                            <img src="./imgs/iconagri.png" alt="" />
                            <h4>Gestion Agricole</h4>
                        </div>
                        <div class="heading">
                            <h2>Bienvenue</h2>
                            <!-- <h6>Not Registered ?</h6>
                <a href="" class="toggle">Sign Up</a> -->
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="email" id="email"
                                    class="input-field active @error('email') is-invalid @enderror" name="email"
                                    required autocomplete="email" autofocus />
                                <label for="email">E-mail</label>

                                <div class="errore">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="input-wrap">
                                <input type="password" id="password" minlength="4"
                                    class="input-field active @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" />
                                    {{-- <img src="image/red_eye.png" id="eye" onclick="changer()"> --}}
                                    <label for="password">password</label>
                                <div class="errore1">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" value="Se Connecter" class="sign-btn" />
                            {{-- <p class="text">
                                <!-- ? link -->
                                <a href="#" style="text-decoration: none;"> Mot de passe oublié ?</a>
                            </p> --}}
                        </div>
                    </form>


                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="./imgs/gif3businees.svg" class="image img-1 show" alt="" />
                        <img src="./imgs/gif2business.svg" class="image img-2" alt="" />
                        <img src="./imgs/gif1.svg" class="image img-3" alt="" />
                    </div>
                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>Organiser Vos Parcelles</h2>
                                <h2>Ameliorer Vos Profits</h2>
                                <h2>Gestionner vos employés</h2>
                            </div>
                        </div>

                        <div class="bullets">
                            <span class="active" data-value="1"></span>
                            <span data-value="2"></span>
                            <span data-value="3"></span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </main>
    <script>
        // ? pre loader:
        $(document).ready(function() {
            setTimeout(function() {
                $(".loader").fadeOut("smooth", function() {
                    $(".content").fadeIn("smooth");
                });
            }, 500);
        });
    </script>

    <script>
        const inputs = document.querySelectorAll('.input-field');
        const toggle_btn = document.querySelectorAll('.toggle');
        const main = document.querySelector('main');
        const bullets = document.querySelectorAll('.bullets span');
        const images = document.querySelectorAll('.image');




        toggle_btn.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                main.classList.toggle("sign-up-mode");
                console.log('clicked');
            });

        });







        function moveSlider() {
            let index = this.dataset.value;

            let currentImage = document.querySelector(`.img-${index}`);
            images.forEach((img) => {
                img.classList.remove('show');
            });
            currentImage.classList.add('show');

            const textSlider = document.querySelector('.text-group');
            textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

            bullets.forEach((bull) => {
                bull.classList.remove("active");
            });
            this.classList.add("active");

            // Move to the next bullet element
            const nextBullet = this.nextElementSibling || bullets[0]; // Get the next sibling or the first bullet
            setTimeout(function() {
                nextBullet.click(); // Simulate a click on the next bullet element
            }, 3000); // Wait for 3 seconds before moving to the next slide
        }

        bullets.forEach((bullet) => {
            bullet.addEventListener("click", moveSlider);
        });

        // Simulate the initial click on the first bullet to start the infinite loop
        bullets[0].click();


        console.log("WHYYYYYYYYYYYYYyy");

        //   ?Terms logic
        let checky = document.getElementById("cbx-12");
        let signup = document.getElementById("signup");

        if (checky) {
            checky.addEventListener('change', (e) => {

                if (e.target.checked === true) {
                    signup.classList.add("agree");
                }
                if (e.target.checked === false) {
                    console.log("Checkbox is not checked - boolean value: ", e.target.checked)
                    signup.classList.remove("agree");
                }

            })
        }
    </script>
</body>

</html>
