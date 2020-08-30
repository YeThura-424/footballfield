<x-frontend>
	<div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-white pt-5">
                    <h2 class="text-uppercase text-center text-dark">avaliable pitch</h2>
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
                <div class="col-6">
                   
                    <div class="card cardfield">
                        <img src=" {{asset($photo)}} " class="card-img-top" style="max-width: auto !important; object-fit: cover; height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title"> {{$name}} </h5>
                            <p class="card-text"> {!!Str::limit($description,25)!!} </p>
                            <div class="alert alert-dark" role="alert">
  								Home Stadium: {{$stadium}}
							</div>
                            @if(Auth::check())
                                    <a href=" {{route('bookingdetail',$id)}} " class="btn btn-primary"> View Detail </a>
                                    @else
                                    <a href=" {{route('login')}} " class="btn btn-primary"> View Detail </a>
                                    @endif
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-frontend>