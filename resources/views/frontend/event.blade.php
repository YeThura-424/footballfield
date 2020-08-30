<x-frontend>
	@php
	$name = $event->name;
	$photo = $event->photo;
	$startdate = $event->startdate;
	$enddate = $event->enddate;
	$teamno = $event->teamno;
	$description = $event->description;
	$rules = $event->rule;
	$pitch = $event->pitch->name;
	$id = $event->id;
    $eventdetail = $eventdetails->count();
    // dd($eventdetail);
	@endphp
	<div id="detail-book">
        <div class="container py-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-uppercase text-center my-4">event detail</h2>
                </div>
                <div class="card mb-3 py-3 pl-3">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img src="{{asset($photo)}}" style="width: 100%; height:450px; object-fit: cover;">
                            <!-- <hr> -->
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{$name}}</h5>
                                <p class="card-text">{!!$description!!}</p>
                                <p><strong>---RULES---</strong></p>
                                <p class="card-text" style="margin-left: 20px !important;">{!!$rules!!}</p>
                                <p class="card-text"><small class="text-muted">Start At: {{$startdate}} </small> <span>AND </span> <small class="text-muted">End At: {{$enddate}} </small></p>
                                <p class="card-text"></p>
                                <h5 class="card-title">Pitch : {{$pitch}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-3 formbook">
            @if($eventdetail <= $teamno)
            <form action=" {{route('eventbooking',$id)}} " method="GET">
            	@csrf
                <div class="row ">
                    <div class="col-12">
                        <h2 class="text-uppercase text-center">Event join field</h2>
                    </div>
                    <div class="col-12 justify-content-center">
                        <div class="form-group row py-3">
                            <label for="fieldname" class="col-sm-2 col-form-label">Team Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="fieldname" placeholder="What is your team name?" name="teamname">
                            </div>
                            <label for="membername" class="col-sm-2 col-form-label">Team Member</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="membername" placeholder="How many player you have in your team?" name="teammember">
                            </div>
                        </div>
                        <div class="form-group row py-3">
                            <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="startdate" readonly="readonly" value="{{$startdate}}" name="startdate">
                            </div>
                            <label for="enddate" class="col-sm-2 col-form-label">End Date</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="enddate" readonly="readonly" value="{{$enddate}}" name="enddate">
                            </div>
                        </div>
                        
                        <div class="form-group row py-3 justify-content-center">
                            <button type="submit" class="btn btn-success form-control col-2 bookbtn">Join Now</button>
                        </div>
                    </div>
                </div>
            </form>
            @else 
            <div class="row ">
                <div class="col-12">
                    <h2 class="text-uppercase text-center"> Teams Number For This Event Has Complete!
                    Please Join Next Time!</h2>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-frontend>