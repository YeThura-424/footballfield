<x-frontend>
	<div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-white pt-5">
                    <h2 class="text-uppercase text-center text-dark">avaliable pitch</h2>
                    <div class="alert alert-dark" role="alert">
                    	@php
						$stadium = $stadia->name;
						@endphp
  						<h2 class="text-uppercase text-dark">home stadium: {{$stadium}} </h2>
					</div>
                </div>
                @foreach($pitches as $pitch)
                @php
                $name = $pitch->name;
                $photos = json_decode($pitch->photo);
                $photo = $photos[0];
                $description = $pitch->description;
                $stadium = $pitch->stadia->name;
                $id = $pitch->id;
                @endphp
                <div class="card mb-3 py-3 pl-3">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img src=" {{asset($photo)}} " style="width: 100%; height:350px; object-fit: cover;">
                            <!-- <hr> -->
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"> {{$name}} </h5>
                                <p class="card-text"> {!!Str::limit($description,30)!!} </p>
                                @if(Auth::check())
                                <a href="{{route('bookingdetail',$id)}}" class="btn btn-primary ml-auto">Book Now</a>
                                @else
                                <a href="{{route('login')}}" class="btn btn-primary ml-auto">Book Now</a>
                                @endif
                                <div class="owl-carousel" style="margin-top: 115px">
                                	@foreach($photos as $photo)
                                    <img src=" {{asset($photo)}} " style="width: 100%; height:150px; object-fit: cover;">
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-frontend>