<x-backend>
	<main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i>Rent Detail List </h1>
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
                                        <th> StartTime</th>
                                        <th> EndTime</th>
                                        <th> Date</th>
                                        <th> Hour</th>
                                        <th> Price</th>
                                        <th> Status </th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($rentdetails as $rentdetail)
                                    @php
                                    $id=$rentdetail->id;
                                    $user = $rentdetail->user->name;
                                    $email = $rentdetail->user->email;
                                    $pitch = $rentdetail->pitch->name;
                                    $starttime = $rentdetail->starttime;
                                    $endtime = $rentdetail->endtime;
                                    $rentdate = $rentdetail->rentdate;
                                    $renthour = $rentdetail->renthour;
                                    $totalprice = $rentdetail->totalprice;
                                    $status = $rentdetail->status;

                                    if($status == 0) {
                                        $status = "Pending";
                                    } elseif( $status == 1) {
                                        $status = "Confirm";
                                    } else {
                                        $status = "Cancle";
                                    }
                                    @endphp
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$user}} </td>
                                        <td> {{$pitch}} </td>
                                        <td> {{$starttime}} </td>
                                        <td> {{$endtime}} </td>
                                        <td> {{$rentdate}} </td>
                                        <td> {{$renthour}} </td>
                                        <td> {{$totalprice}} </td>
                                        <td> {{$status}} </td>

                                        <td>
                                            @if($status=='Pending')
                                             <form action="{{ route('confirm') }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to confirm?')">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <input type="hidden" name="name" value="{{$user}}">
                                            <input type="hidden" name="email" value="{{$email}}">
                                            <button class="btn btn-outline-success" type="submit"> 
                                                <i class="icofont-check icofont-1x"></i>
                                            </button>
                                            
                                            </form>

                                            <form action="{{ route('cancel') }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to cancle?')">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <input type="hidden" name="name" value="{{$user}}">
                                            <input type="hidden" name="email" value="{{$email}}">
                                            <button class="btn btn-outline-danger" type="submit"> 
                                                <i class="icofont-close icofont-1x"></i>
                                            </button>
                                            
                                            </form>
                                            @else
                                            <a href="" class="btn btn-outline-success">
                                                <i class="icofont-check icofont-1x"></i>
                                            </a>
                                            @endif
                                        </td>
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