<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('css/view.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>MC-Beaute</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src=" {{ asset('img/LOGO.png') }}">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('produits') }}">Product</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        {{-- <li><a href="" class="btn">Log Out</a></li> --}}
                        {{-- <li><a href=""{{ route('panier') }}"><img src="{{asset('img/cart.png')}}" width="30px" height="30px"></a>
                        <li><img src="menu.png" class="menu-icon" onclick="menutoggle()"></li> --}}
                    </ul>
                </nav>
                <a href=""{{ route('panier') }}"><img src="{{asset('img/cart.png')}}" width="30px" height="30px"></a>
                <img src="{{asset('img/menu.png')}}" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h2>La nature fait bien les choses,<br>laissez-là s'occuper de votre beauté!</h2>
                    <a href="{{ route('produits') }}" class="btn">Our Products  &#8594;</a>
                </div>
                {{-- <div class="col-2"> --}}
                    {{-- <img src="new.png" width="55%" height="55%"> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
    {{-- <section class="about" id="about">
        @foreach ($abouts as $abt)
        <div class="row">
            <div class="col50">
                <h2 class="titleText"><span>A</span>bout Us</h2>
                <p>{{ $abt->caption }}</p>
            </div>
            <div class="col50">
                <div class="imgBx">
                    <img src="{{ $abt->image }}">
                </div>
            </div>
        </div>
        @endforeach
    </section> --}}


    <div class="offer">
        <div class="offer-container">
            <div class="row">
                @foreach ($abouts as $abt)
                <div class="OFFRE">
                    <h2 class="titleText"><span>A</span>bout Us</h2>
                    <p>{{ $abt->caption }}</p>
                </div>

                <div class="OFFRE">
                    <img src="{{ $abt->image }}">
                    {{-- <h2>{{ $ofr->pack }}</h2> --}}
                    {{-- <small>{{ $ofr->caption }}</small> --}}
                {{-- </br> --}}
                    {{-- <a href="" class="btn">Buy Now &#8594;</a> --}}
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- -----------------------Categories--------------------------- -->
    <div class="small-container">
        <h2 class="title">Our Categories</h2>
        <div class="categories">
            <div class="small-container">
                <div class="row">
                    @foreach ($categorys as $category)
                    <div class="col-3">
                        <div class="content_shop">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ $category->image }}">
                        </div>
                        <h4 class="title-pro">{{ $category->name }}</h4>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        <h2 class="title">Latest Products</h2>
        <div class="row">
        @foreach ($projects as $project)
            <div class="cartes_shop col-lg-3 col-sm-6 ">
                <div class="content_shop">
                    <div class="content-overlay"></div>
                    <img class="content-image" src="{{ $project->image }}">
                    <div class="content-details fadeIn-bottom">
                    <a class="m-2" href="#">
                        <i class="fas fa-heart fa-2x"></i>
                    </a>
                    <a class="m-2" href="{{ route('panier.card',['id' => $project->id,'qty' => 1]) }}">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </a>
                    <a class="m-2" href="#">
                        <i class="fas fa-eye fa-2x"></i>
                    </a>
                    </div>
                </div>
                <h4 class="title-pro">{{ $project->name }}<br> {{ $project->cost }} DH</h4>
            </div>
        @endforeach
        </div>
    </div>
    <!-- -----------------------------------offer-------------------------- -->
    <div class="offer">
        <div class="offer-container">
            <div class="row">
                @foreach ($offers as $ofr)
                <div class="OFFRE">
                    <img src="{{ $ofr->image }}" class="offer-img">
                </div>

                <div class="OFFRE">
                    {{-- <p>{{ $ofr->offer }} %</p> --}}
                    <h2>{{ $ofr->pack }}</h2>
                    <small>{{ $ofr->caption }}</small>
                </br>
                    <a href="" class="btn">Buy Now &#8594;</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- --------------------------------testimonial--------------------------------------------- -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="{{ asset('img/2.jpg') }}"">
                    <h3>Hermez</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="{{ asset('img/2.jpg') }}">
                    <h3>Hermez</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="{{ asset('img/2.jpg') }}">
                    <h3>Hermez</h3>
                </div>
            </div>
        </div>
    </div>

<!-- ------------------------------------------footer------------------------------- -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>mc-beaute</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    <div class="app-logo">
                        <img src="{{asset('img/GGL.png')}}">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="{{ asset('img/logo-bL.png') }}">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instgram</li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <!-- ----------------------------- js for toggle menu -----------------------  -->
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle(){
            if( MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
            else
                {
                    MenuItems.style.maxHeight = "0px";
                }
        }
    </script>
</body>
</html>
