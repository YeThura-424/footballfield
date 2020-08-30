<x-backend>
	@php
	$name = $event->name;
	$photo =$event->photo;
	$startdate = $event->startdate;
	$enddate = $event->enddate;
	$teamno = $event->teamno;
	$description = $event->description;
	$rule = $event->rule;
	$pitch = $event->pitch->name;

	@endphp
	<main class="app-content">
		<div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Event Detail </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href=" {{route('backside.event.index')}} " class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>
       <div class="card mb-3 container-fluid h-100">
				<h5 class="pt-4"> {{$name}} </h5>
				<div class="row no-gutters">
					<div class="col-md-5">
						<img src=" {{asset($photo)}} " class="card-img" height="350px;">    
					</div>
					<div class="col-md-7">

						<div class="card-body">
							<p>Pitch : {{$pitch}} </p>
							<p><u>Description :</u> <span>{!! $description !!}</span> </p>
							<p><u>Rules :</u> {!!$rule!!}</p>
						</div>
					</div>
				</div>
			</div>
	</main>
</x-backend>