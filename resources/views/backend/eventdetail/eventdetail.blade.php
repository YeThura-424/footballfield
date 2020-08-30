<x-backend>
	<main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i>Event Detail List </h1>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                         @if(session('successMsg') != NULL)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> ✅ SUCCESS!</strong>
                                {{ session('successMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th> No.</th>
                                        <th> MemberName</th>
                                        <th> PitchName</th>
                                        <th> EventName</th>
                                        <th> TeamName</th>
                                        <th> Team Member</th>
                                        <th> StartDate</th>
                                        <th> EndDate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($eventdetails as $eventdetail)
                                    @php
                                    $member = $eventdetail->user->name;
                                    $pitch = $eventdetail->pitch->name;
                                    $event = $eventdetail->event->name;
                                    $teamname = $eventdetail->teamname;
                                    $teamno = $eventdetail->teamno;
                                    $startdate = $eventdetail->startdate;
                                    $enddate = $eventdetail->enddate;
                                    @endphp
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$member}} </td>
                                        <td> {{$pitch}} </td>
                                        <td> {{$event}} </td>
                                        <td>{{$teamname}}</td>
                                        <td> {{$teamno}} </td>
                                        <td> {{$startdate}} </td>
                                        <td> {{$enddate}} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-backend>