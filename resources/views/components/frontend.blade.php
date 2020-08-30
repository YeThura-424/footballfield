<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football World</title>
    <link rel="stylesheet" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/icon/icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/flickity.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>
    <!-- Nav Bar Start -->
    <div id="navbar">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- logo area -->
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <a class="navbar-brand" href="{{route('index')}}"><span> FOOTBALL<br>
                                -WORLD-</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse pl-4" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href=" {{route('index')}} ">HOME <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href=" {{route('available')}} ">AVALIABLE PITCH</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        STADIUMS <i class="icofont-circled-down"></i>
                                    </a>
                                    <div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
                                        @foreach($data[0] as $stadium)
                                         <hr>
                                        <a class="dropdown-item text-white" href=" {{route('pitch',$stadium->id)}} "> {{$stadium->name}} </a>
                                        
                                        @endforeach

                                    </div>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href=" {{route('about')}} " aria-disabled="true">ABOUT</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('contact')}}" aria-disabled="true">CONTACT</a>
                                </li>
                            </ul>
                            @guest
                            <div id="loginarea" class="navbar-nav mr-auto">
                                <div class="navbar-nav">
                                    <a href="{{route('login')}}" class="nav-link active"> <i class="icofont-login"></i>Login </a>
                                </div>
                                <div class="navbar-nav">
                                    <span class="d-xl-block d-lg-block d-none nav-link">|</span>
                                </div>
                                <div class="navbar-nav">
                                    <a href="{{route('register')}}" class="nav-link active"> <i class="icofont-login"></i>Register</a>
                                </div>
                            </div>
                            @else
                            <div id="userarea" class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{asset(Auth::user()->profile)}}" class="userprofile rounded-circle">
                                        {{Auth::user()->name}}<i class="icofont-circled-down"></i>
                                    </a>
                                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item text-white" href="{{route('profile.edit',Auth::user()->id)}}"><i class="icofont-waiter-alt"></i>Profile</a>
                                        <hr>
                                        <a class="dropdown-item text-white" href="{{route('bookinglist',Auth::user()->id)}}"><i class="icofont-listine-dots"></i>Booking List</a>
                                        <hr>
                                        <a class="dropdown-item text-white" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icofont-logout"></i>Logout</a>
                                        <form id="logout-form" action=" {{route('logout')}} " method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </div>
                            @endif
                            <form class="form-inline my-2 d-lg-block d-none">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <!-- <button class="btn my-2 searchBtn rounded" type="submit">Search</button> -->
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->
    
    {{$slot}}
    <footer id="footer" class="bg-dark">
        <div class="container pt-3">
            <div class="row justify-content-center text-white">
                <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                    <h5 class="py-3">Useful Link</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{route('index')}}" class="usefullink text-white"><i class="icofont-rounded-right"></i>Home</a></li>
                        <li><a href="{{route('available')}}" class="usefullink text-white"><i class="icofont-rounded-right"></i>Avaliabel Pitch</a></li>
                        <li><a href="{{route('about')}}" class="usefullink text-white"><i class="icofont-rounded-right"></i>About</a></li>
                        <li><a href="{{route('contact')}}" class="usefullink text-white"><i class="icofont-rounded-right"></i>Contact</a></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-4 col-12">
                    <h5 class="py-3">Contact Info</h5>
                     <p>No.34,Insine Street,Hlaing Township, Yangon, Myanmar</p>
                      <p>Phone:+959 225 666 840</p>
                    <p>Email:event441@gmail.com</p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                    <h5 class="py-3">Media Links</h5>
                    <i class="icofont-twitter icon"></i>
                    <i class="icofont-facebook icon"></i>
                    <i class="icofont-instagram icon"></i>
                    <i class="icofont-google-plus icon"></i>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('frontend/js/flickity.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/datedropper.pro.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.uploadPreview.min.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>
    @yield("script_content")
</body>

</html>
