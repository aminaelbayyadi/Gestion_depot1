<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue !</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
</head>

<body>
    <div class="container">
        <div class="wave">
            <img src="{{ asset('assets/images/bg.png')}}" alt="">
        </div>

        <nav>
            <ul>
                
                <li><a href="{{ route('login') }}">Se connecter</a></li>
                
            </ul>
            <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 260px;">
        </nav>

        <div class="main-content">

            <div class="image-pista">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('assets/images/img1.png')}}" style="width: 460px;"alt=""></div>
                       
                    </div> 
                </div>
            </div>
            <div class="main-text" >
                <h1 style = "font-weight : bold;"> Gestion  </h1>
                <h1 style = "font-weight : bold;"> de stock </h1>
                <h4>Bienvenue dans l'espace de gestion de dépôt</h4>
                <h4>de la délégation Régionale de l'Education de Guelmim</h4>
            </div>
        </div>

        <div class="right">
            <div class="box">
                <div class="image">
                    <img src="{{ asset('assets/images/img4.png')}}" alt="">
                </div>
                <div class="inner-box">
                <h4>Gestion de Dépôt</h4>
            <p>Une solution efficace pour la gestion</p>
            <p>des stocks et des dépôts d'une administration.</p>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="{{ asset('assets/images/img5.png')}}" alt="">
                </div>
                <div class="inner-box">
                <h4>Traitement Rapide</h4>
            <p>Des fonctionnalités optimisées pour assurer</p>
            <p>un traitement rapide et efficace des opérations.</p>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="{{ asset('assets/images/img6.png')}}" alt="">
                </div>
                <div class="inner-box">
                <h4>Sécurité des Données</h4>
            <p>Une gestion sécurisée des données pour assurer </p>
            <p> la confidentialité et l'intégrité des informations.</p>
                </div>
            </div>
        </div>

        <div class="social-links">
            <i class="fab fa-instagram"></i>
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="far fa-envelope"></i>
        </div>
    </div>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 1,
          spaceBetween: 30,
          loop: true,
        });
      </script>
</body>

</html>