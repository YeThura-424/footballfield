<x-backend>
	@php
	$name = $pitch->name;
	$photos = json_decode($pitch->photo);
	$description = $pitch->description;
	$stadium = $pitch->stadia->name;

	@endphp
	<main class="app-content">
		<div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Pitch Detail </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href=" {{route('backside.pitch.index')}} " class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="card mb-3 container-fluid h-100">
				<h5 class="pt-4"> {{$name}} </h5>
				
				<div class="row no-gutters">
					<div class="col-md-6">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							 <div class="carousel-inner">
							 	@foreach($photos as $photo)
							    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="3000">
							      <img src=" {{asset($photo)}} " class="d-block" style="width: 100%; height: 300px;">
							    </div>
							    @endforeach
							  </div>
							  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
						</div>
					</div>
					<div class="col-md-6">

						<div class="card-body">
							
							<p>Stadium : {{$stadium}} </p>
							<p>---Description---{!! $description !!}</p>

						</div>
					</div>
				</div>
			</div>
	</main>
</x-backend>