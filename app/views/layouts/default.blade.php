<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trellis</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href=" {{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=" {{ asset('font-awesome-4.1.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-search fa-fw"></i></a>
                 <form action="{{ action('PeopleController@search') }}" method="get" role="form">
                  <div class="input-group custom-search-form">
                      <input type="text" class="form-control" name="query" placeholder="Search for anything...">
                      <span class="input-group-btn">
                      <button class="btn btn-default" type="button">
                          <i class="fa fa-search"></i>
                      </button>
                      </span>
                  </div>
                </form>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a class="{{ setActive('/') }}" href="{{ action('PeopleController@index') }}"><i class="fa fa-user fa-fw"></i> People</a>
                        </li>
                        <li>
                            <a class="{{ setActive('groups') }}" href="{{ action('GroupsController@index') }}"><i class="fa fa-users fa-fw"></i> Groups</a>
                        </li>
                        <li>
                            <a href="{{ action('PeopleController@index') }}"><i class="fa fa-calendar fa-fw"></i> Events</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-3">
                    <h1 class="page-header">{{ $title }}</h1>
                </div>
                <div class="col-lg-9">
                    @if (isset($buttons))
                        @foreach ($buttons as $button)
                            <a href="{{ action($button['action']) }}" class="btn {{ $button['classes']}}">{{ $button['label']}}</a>
                        @endforeach
                    @endif                   
                </div>
            </div>
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

    <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>

</body>

</html>
