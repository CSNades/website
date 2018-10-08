<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>

  <link href="/css/global.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <title>CS:GO Smokes and Nades</title>
</head>
<body>
    <div id="wrap">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('home') }}">CSNades
                            <span class="label label-primary">BETA</span>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="nav navbar-nav">

                            @if (Auth::user())
                            <li class="dropdown visible-xs">
                                @include('partials.authenticated-menu')
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('get.maps.all') }}">Browse Maps</a>
                            </li>
                            <li>
                                <a href="{{ route('get.nades.add') }}">Add Nade</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                              <a href="#" title="Search"><span class="visible-xs">Search</span><span class="hidden-xs glyphicon glyphicon-search"></span></a>
                            </li>
                            <li>
                              <a href="{{ route('get.donations') }}" title="Donations"><span class="visible-xs">Donations</span> <span class="hidden-xs glyphicon glyphicon-heart"></span></a>
                            </li>
                            @if (Auth::user())
                            <li class="dropdown hidden-xs">
                              @include('partials.authenticated-menu')
                            </li>
                            <li class="visible-xs">
                              <a href="{{ route('get.users.logout') }}">Logout</a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ route('get.users.register') }}">Register</a>
                            </li>
                        @endif
                        </ul>
                    </div>
              </div>
            </nav>
            <div class="row">
                @if(Session::has('flash_danger'))
                <div class="col-xs-12">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('flash_danger') }}
                    </div>
                </div>
                @endif

                @if(Session::has('flash_warning'))
                <div class="col-xs-12">
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('flash_warning') }}
                    </div>
                </div>
                @endif

                @if(Session::has('flash_info'))
                <div class="col-xs-12">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            {{ Session::get('flash_info') }}
                        </div>
                </div>
                @endif

                @if(Session::has('flash_success'))
                <div class="col-xs-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('flash_success') }}
                    </div>
                </div>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-12">
                    @if(isset($heading))
                    <h1>{{{ $heading }}}</h1>
                    <hr>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#"  data-toggle="modal" data-target="#about">About</a>
                        </li>
                        <li>
                            <a href="{{ route('get.features') }}" >Features</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
      <!-- Modals -->
    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="meinModalLabel">Search</h4>
                </div>
                <form role="form" action="index.php?action=Search" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="map">Map</label>
                            <select class="form-control" name="map">
                                <option>Select...</option>
                                @foreach($maps as $map)
                                <option value="{{{ $map->slug }}}">{{{ $map->name }}}</option>
                                @endforeach;
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="popspot">Pop Spot</label>
                            <select class="form-control" name="popspot">
                                <option></option>
                                <option>A site</option>
                                <option>B Site</option>
                                <option>Mid</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="about" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="meinModalLabel">About</h4>
            </div>
            <div class="modal-body">
                <p>
                    Re-developed/designed by <a href="http://steamcommunity.com/id/fatboyxpc">FatBoyXPC</a> and <a href="http://steamcommunity.com/id/Jung3o">Jung3o</a>.<br>
                    Initially created by <a href="http://steamcommunity.com/id/imnns/">NowNewStart</a>.
                </p>
                <p>
                    <ul>
                        <li><a href="http://steamcommunity.com/id/Jung3o">Jung3o</a> - Front-end</li>
                        <li><a href="http://steamcommunity.com/id/fatboyxpc">FatBoyXPC</a> - Back-end</li>
                        <li><a href="http://steamcommunity.com/id/imnns/">NowNewStart</a> - Initial working concept & Upgrading</li>
                    </ul>
                </p>
                <p>
                    Please send suggestions &amp; problems to <a href="mailto:support@csnades.com">support@csnades.com</a>.
                </p>
                <p>
                    <a href="{{ route('get.features') }}">List of planned features</a>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="/js/equalizer.js"></script>
    <script>
        $('.map-display > div').eqHeights({parentSelector:'.map-display'});
        $('.features > div').eqHeights({parentSelector:'.features'});
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-56023761-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
