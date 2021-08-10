<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('css/view.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
                    <li><a href="">Home</a></li>
                    <li><a href="">Product</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Account</a></li>
                </ul>
            </nav>
            {{-- <img src="cart.png" width="30px" height="30px">
            <img src="menu.png" class="menu-icon" onclick="menutoggle()"> --}}
            <a href=""{{ route('panier') }}"><img src="{{asset('img/cart.png')}}" width="30px" height="30px"></a>
            <img src="menu.png" class="menu-icon" onclick="menutoggle()">
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
                <th>Subtotal</th>
            </tr>
            @foreach ($projects as $project)
            <input type="hidden" value="{{$project->id}}" name=item[{{ $loop->index}}][id]>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="{{ asset($project->image) }}">
                        <div>
                            <p>{{ $project->name }}</p>
                            <small>{{ $project->cost }}</small>
                            <a href="{{ route('panier.card',['id' => $project->id, 'qty' => 0]) }}">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="{{ $cards[$loop->index]['qty'] }}" name=item[{{ $loop->index }}][quantite]></td>
                <td>$35.00</td>
            </tr>
            @endforeach
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$20.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$10.00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$20.00</td>
                </tr>
                <tr>
                <td><button class="btn">Buy Now &#8594; </button></td>
                </tr>
            </table>

        </div>
    </form>
    </div>


<!-- ------------------------------------------footer------------------------------- -->
    <div class="footer">
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
