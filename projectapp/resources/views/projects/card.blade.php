<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('css/view.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>All products</title>
</head>
<body>


     <div class="container">
        <div class="navbar">
            <div class="logo">
                {{-- <h1>MC-Beaute</h1> --}}
                <img src=" {{ asset('img/LOGO.png') }}">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('produits') }}">Product</a></li>
                    <li><a href="">About</a></li>
                    <li>
                        @auth

                        <a class="dropdown-item" href="#.">
                            <form method="post" action="{{route('logout')}}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                              @csrf
                              <i class="mr-50" data-feather="power"></i> Logout
                            </form>
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        @endauth

                        @guest
                        <a href="{{ route('login') }}">Login/Register</a>
                        @endguest
                    </li>
                </ul>
            </nav>
            <a href="{{ route('panier') }}"><img src="{{asset('img/cart.png')}}" width="30px" height="30px"></a>
            <img src="{{asset('img/menu.png')}}" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
<!-- ----------------cart items------------->
<div class="small-container cart-page">
    <form action="{{ route('commande') }}" method="post">
        @csrf
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                {{-- <th>Subtotal</th> --}}
            </tr>
            @foreach ($projects as $project)
            <input type="hidden" value="{{$project->id}}" name=item[{{ $loop->index}}][id]>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="{{ asset($project->image)}}">
                        <div>
                            <p>{{ $project->name }}</p>
                            <small>{{ $project->cost }}</small>
                            <a href="{{ route('panier.card',['id' => $project->id, 'qty' => 0]) }}">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="{{ $cards[$loop->index]['qty'] }}" name=item[{{ $loop->index }}][quantite]></td>
                {{-- <td>$35.00</td> --}}
            </tr>
            @endforeach
        </table>
        <div class="total-price">
            <table>
                {{-- <tr>
                    <td>Subtotal</td>
                    <td><input onblur="findTotal()" type="text"  name="qty" id="qty1"/ ></td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td><input onblur="findTotal()" type="text" value="10" name="qty" id="qty2"/></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><input type="text" name="total" id="total"/></td>
                </tr> --}}
                <tr>
                <td><button class="btn">Buy Now &#8594; </button></td>
                <td>
                @if(Session::has('alert'))
                     {{ Session::get('alert') }}
                @endif

                </td>
                </tr>
            </table>

    </form>
    </div>

<!-- ------------------------------------------footer------------------------------- -->
    {{-- <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>mc-beaute</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    <div class="app-logo">
                        <img src="GGL.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="bg.jpg">
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
                        <li>Youtube</li>
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

{{-- <script type="text/javascript">
    function findTotal(){
        var arr = document.getElementsByName('qty');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('total').value = tot;
    }
</script> --}}


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
