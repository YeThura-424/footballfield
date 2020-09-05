<x-frontend>
    <!-- header section start -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($stadia as $stadium)
            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach

        </ol>
        <div class="carousel-inner">
            @foreach($stadia as $stadium)
            @php
            $name = $stadium->name;
            $photo = $stadium->photo;
            @endphp
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="3000">
                <img src=" {{asset($photo)}} " class="d-block w-100" style="height: 90vh;">
                <div class="carousel-caption d-none d-md-block">
                    <h5> {{$name}} </h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- header section end -->
    <div id="main">
        <div id="avaliable-pitch">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-white  pt-5">
                        <h2 class="text-uppercase text-center">avaliable pitch</h2>
                    </div>
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                            @foreach($pitches as $pitch)
                            @php
                            $name = $pitch->name;
                            $photos = json_decode($pitch->photo);
                            $photo = $photos[0];
                            $description = $pitch->description;
                            $id = $pitch->id;
                            @endphp
                            <div class="card cardfield">
                                <img src=" {{asset($photo)}} " class="card-img-top" style="max-width: auto !important; object-fit: cover; height: 250px;">
                                <div class="card-body">
                                    <h5 class="card-title"> {{$name}} </h5>
                                    <p class="card-text"> {!!Str::limit($description,20)!!} </p>
                                    @if(Auth::check())
                                    <a href=" {{route('bookingdetail',$id)}} " class="btn btn-primary"> View Detail </a>
                                    @else
                                    <a href=" {{route('login')}} " class="btn btn-primary"> View Detail </a>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="upcomingevent">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-white  pt-5 pb-3">
                        <h2 class="text-uppercase text-center">upcoming event</h2>
                    </div>
                    @foreach($events as $event)
                    @php
                    $name = $event->name;
                    $photo = $event->photo;
                    $startdate = $event->startdate;
                    $teamno = $event->teamno;
                    $id = $event->id;
                    @endphp
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src=" {{asset($photo)}} " class="card-img" style="max-width: auto !important; object-fit: cover; height: 250px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"> {{$name}} </h5>
                                        <div class="alert alert-danger" role="alert">
                                            Team Number: {{$teamno}}
                                        </div>
                                        <div class="alert alert-info" role="alert">
                                            Start At: {{$startdate}}
                                        </div>
                                        @if(Auth::check())
                                        <a href=" {{route('event',$id)}} " class="btn btn-primary float-right" disabled>Join Event</a>
                                        @else
                                        <a href=" {{route('login')}} " class="btn btn-primary"> Join Event </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="offer">
            <div class="container">
                <div class="row justify-content-center text-white">
                    <div class="col-12 pt-5 pb-3">
                        <h2 class="text-uppercase text-center">what we offer</h2>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                        <i class="icofont-jersey offericon"></i>
                        <h5 class="py-3">Free Jersey</h5>
                        <p>During the promotion, we provide free jersey for customers with play hours.</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                        <i class="icofont-water-bottle offericon"></i>
                        <h5 class="py-3">Free Water</h5>
                        <p>We provide free water for every customer during play time.</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                        <i class="icofont-stopwatch offericon"></i>
                        <h5 class="py-3">Free Hour</h5>
                        <p>Customers have chance to get free one hour for three hours of paid play</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend>