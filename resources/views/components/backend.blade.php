<!DOCTYPE html>
<html lang="en">

<head>
    <title> Football Stadium </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" href="logo/favicon.jpg" type="image/gif" sizes="16x16">
    <!-- iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('icon/icofont/icofont.min.css')}}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}">
    {{-- datetimepicker --}}
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.timepicker.min.css')}}">
    <!-- summer note -->
    <link rel="stylesheet" type="text/css" href="{{ asset('summernote/summernote-bs4.css') }}">
    <!-- Multiple Image Upload & Preview CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('multipleimageupload/image-uploader.min.css') }}">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="index.html">
            Football World
        </a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle pt-2" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
            <i class="icofont-navigation-menu"></i>
        </a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="app-search">
                <input class="app-search__input" type="search" placeholder="Search">
                <button class="app-search__button">
                    <i class="icofont-search-2"></i>
                </button>
            </li>
            <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="icofont-user-alt-3"></i>
                </a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href=" {{route('backside.userprofile.edit',Auth::user()->id)}} ">
                            <i class="icofont-ui-user"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icofont-logout"></i>
                            Logout
                        </a>
                        <form id="logout-form" action=" {{route('logout')}} " method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset(Auth::user()->profile)}}" alt="User Image" style="width: 50px; height: 50px;">
            <div>
                <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
                <p class="app-sidebar__user-designation">{{Auth::user()->roles()->pluck('name')[0]}}</p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'dashboard' ? 'active':''}}" href=" {{route('backside.dashboard.index')}} ">
                    <i class="app-menu__icon icofont-dashboard"></i>
                    <span class="app-menu__label">
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'memberlist' ? 'active':''}}" href=" {{route('backside.memberlist.index')}} ">
                    <i class="app-menu__icon icofont-users-social"></i>
                    <span class="app-menu__label">
                        Member List
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'eventdetail' ? 'active':''}}" href="{{route('backside.eventdetail.index')}}">
                    <i class="app-menu__icon icofont-prestashop"></i>
                    <span class="app-menu__label">
                        Event Details
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'rentdetail' ? 'active':''}}" href="{{route('backside.rentdetail.index')}}">
                    <i class="app-menu__icon icofont-ui-tag"></i>
                    <span class="app-menu__label">
                        Rent Details
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'time' ? 'active':''}}" href="{{route('backside.time.index')}}">
                    <i class="app-menu__icon icofont-clock-time"></i>
                    <span class="app-menu__label">
                        Time List
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'price' ? 'active':''}}" href="{{route('backside.price.index')}}">
                    <i class="app-menu__icon icofont-money-bag"></i>
                    <span class="app-menu__label">
                        Price List
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'event' ? 'active':''}}" href="{{route('backside.event.index')}}">
                    <i class="app-menu__icon icofont-package"></i>
                    <span class="app-menu__label">
                        Event List
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'ptich' ? 'active':''}}" href=" {{route('backside.pitch.index')}} ">
                    <i class="app-menu__icon icofont-field"></i>
                    <span class="app-menu__label">
                        Field List
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{Request::segment(2) === 'stadium' ? 'active':''}}" href=" {{route('backside.stadium.index')}} ">
                    <i class="app-menu__icon icofont-field"></i>
                    <span class="app-menu__label">
                        Stadium List
                    </span>
                </a>
            </li>
        </ul>
    </aside>
    {{$slot}}
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('backend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('backend/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    {{-- datetimepicker --}}
    <script type="text/javascript" src="{{asset('backend/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    {{-- timepicker --}}
    <script type="text/javascript" src="{{asset('backend/js/plugins/jquery.timepicker.min.js')}}"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
    <!-- Multiple Image Upload & Preview JS -->
    <script src="{{ asset('multipleimageupload/image-uploader.min.js') }}"></script>
    <script src="{{asset('frontend/js/jquery.uploadPreview.min.js')}}"></script>
    <script type="text/javascript">
    $('#sampleTable').DataTable();

    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }

    </script>
     @yield("script_content")
</body>

</html>
