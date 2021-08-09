
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidbar-brand">
            <h2><span class="lab la-accusoft"></span><span>JADWA</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li><a href="" ><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li><a href=""><span class="las la-users"></span>
                    <span>CLients</span></a>
                </li>
                <li><a href="{{ route('projects.index') }}" class="active"><span class="las la-clipboard-list"></span>
                    <span>Products</span></a>
                </li>
                <li><a href="{{ route('categorys.index') }}"><span class="las la-clipboard-list"></span>
                    <span>Categories</span></a>
                </li>
                <li><a href=""><span class="las la-shopping-bag"></span>
                    <span>Commandes</span></a>
                </li>
                <li><a href=""><span class="las la-user-circle"></span>
                    <span>Reviews</span></a>
                </li>
                <li><a href="{{ route('home') }}"><span class="las la-receipt"></span>
                    <span>Home page</span></a>
                </li>
                <li><a href=""><span class="las la-clipboard-list"></span>
                    <span>Tasks</span></a>
                </li>
            </ul>

        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            {{-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here"/>
            </div> --}}
            <div class="user-wrapper">
                <img src="{{asset('img/2.jpg')}}" width="40px" height="40px" alt="">
                <div>
                    <h4>Salma DAIOUF</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>

        <main>
            {{-- <div class="recent-grid"> --}}
                <div class="project" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent categories</h2>

                            <button><a class="btn btn-success" href="{{ route('categorys.create') }}" title="Create a category"> <i class="fas fa-plus-circle"></i>
                            </span>Add new category</a></button>
                        </div>


                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>categorie name</td>
                                            <td>Image</td>
                                            <td>Date Created</td>
                                            <td width="280px">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorys as $category)
                                        <tr>
                                            <td>{{ $category->id}}</td>
                                            <td>{{ $category->name}}</td>
                                            <td>{{ $category->image }}</td>
                                            <td>{{ date_format($category->created_at, 'jS M Y') }}</td>
                                            <td>
                                                <form action="{{ route('categorys.destroy', $category->id) }}" method="POST">

                                                    <a href="{{ route('categorys.show', $category->id) }}" title="show">
                                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                                    </a>

                                                    <a href="{{ route('categorys.edit', $category->id) }}">
                                                        <i class="fas fa-edit  fa-lg"></i>

                                                    </a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                        <i class="fas fa-trash fa-lg text-danger"></i>

                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

        </main>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</body>
</html>

