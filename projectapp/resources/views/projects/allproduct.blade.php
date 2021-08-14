<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('css/view.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/auth.css')}}"> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body>
        <div class="all">
            <div class="navbar">
                <div class="logo">
                    <img src=" {{ asset('img/LOGO.png') }}">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('produits') }}">Product</a></li>
                        {{-- <li><a href="">About</a></li> --}}
                        <li><a href="">Contact</a></li>
                        <li><a href="">Account</a></li>
                    </ul>
                </nav>
                <img src="{{ asset('img/cart.png') }}" width="30px" height="30px">
                <img src="{{ asset('img/menu.png') }}" class="menu-icon" onclick="menutoggle()">
            </div>

        </div>

    <div class="all_container">
        <h2 class="title">All Products</h2>
        <div class="select">
            <select>
                <option>Default Shorting</option>
                <option>Short by price</option>
                <option>Short by popularity</option>
                <option>Short by rating</option>
                <option>Short by sale</option>
            </select>
        </div>

        <div class="row">
            @foreach ($projects as $project)
            <div class="cartes_shop col-lg-3 col-sm-6 ">
                <div class="content_shop">
                    <div class="content-overlay"></div>
                    <img class="content-image" src="{{ asset($project->image) }}">
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
        {{-- <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div> --}}
    </div>
<!-- ------------------------------------------footer------------------------------- -->
    {{-- <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>MC-Beaute</h3>
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
    </div> --}}
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
