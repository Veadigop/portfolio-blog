<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name')}}</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{ asset('css/admin/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/admin/admin.css')}}" rel="stylesheet">

    {{--select2--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}"> <i class="fa fa-home" aria-hidden="true"></i>Visit Site</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('/admin')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
                <a class="nav-link nav-link-collapse collapsed" href="#collapseUsers" data-toggle="collapse" data-parent="#exampleAccordion"" title="Users">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="nav-link-text">Users</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseUsers">
                    <li>
                        <a href="/admin/users">All Users</a>
                    </li>
                    <li>
                        <a href="/admin/users/create">Add New User</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Blog">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBlog" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Blog</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseBlog">
                    <li>
                        <a href="/admin/articles">All Articles</a>
                    </li>
                    <li>
                        <a href="/admin/articles/create">Add New Article</a>
                    </li>
                    <li>
                        <a href="/admin/comments">Comments</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                    <span class="nav-link-text">Portfolio</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li>
                        <a href="/admin/portfolios">All Portfolio Items</a>
                    </li>
                    <li>
                        <a href="/admin/portfolios/create">Add New Portfolio Items</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categories">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCategories" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Categories</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseCategories">
                    <li>
                        <a href="/admin/categories">All Categories</a>
                    </li>
                    <li>
                        <a href="/admin/categories/create">Add New Category</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <div class="greeting-wrapper">
            <i class="fa fa-user" aria-hidden="true"></i> Hello, <span class="user-name">{{Auth::user()->name}}!</span>
        </div>
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link">
                    <span class="nav-link-text"><i class="fa fa-fw fa-sign-out"></i>Logout</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <span class="nav-link-text"><i class="fa fa-home" aria-hidden="true"></i>Home</span></a>
            </li>
        </ul>
    </div>
</nav>


<div class="content-wrapper">
    <div class="container-fluid">
        @include('layouts.alert')

        @yield('content')

    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
{{--select2--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/admin/admin.min.js') }}"></script>
<script  src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>


<script>
    tinymce.init({
        selector: 'textarea',  // change this value according to your HTML

    });
</script>
<!-- Custom scripts for admin page-->
<script  src="{{ asset('js/admin/admin-custom.js') }}"></script>



</body>

</html>
