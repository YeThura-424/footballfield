<x-backend>
	<main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i>Today Rentlist </h1>
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
                                        <th>No.</th>
                                        <th>MemberName</th>
                                        <th>PitchName</th>
                                        <th>Starttime</th>
                                        <th>Endtime</th>
                                        <th>Rent Hour</th>
                                        <th>Price</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp

                                    @foreach($rentdetails as $rentdetail)
                                    @php

                                    $user = $rentdetail->user->name;
                                    $pitch = $rentdetail->pitch->name;
                                    $starttime = $rentdetail->starttime;
                                    $endtime = $rentdetail->endtime;
                                    $rentdate = $rentdetail->rentdate;
                                    $renthour = $rentdetail->renthour;
                                    $totalprice = $rentdetail->totalprice;
                                    $status = $rentdetail->status;
                                    @endphp
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$user}} </td>
                                        <td> {{$pitch}} </td>
                                        <td> {{$starttime}} </td>
                                        <td> {{$endtime}} </td>
                                        <td> {{$renthour}} </td>
                                        <td>{{$totalprice}}</td>
                                        
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