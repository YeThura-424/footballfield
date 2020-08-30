<x-backend>
	<main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i>Member List </h1>
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
                                        <th> Phone</th>
                                        <th> Address</th>
                                        <th> Status</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($users as $user)
                                    @php
                                   
                                    $name = $user->name;
                                    $phone = $user->phone;
                                    $address = $user->address;
                                    $status = $user->status;
                                    $id = $user->id;

                                    if($status == 0) {
                                        $status = "Active"; 
                                    } else {
                                        $status = "Pending";
                                    }
                                    @endphp
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$name}} </td>
                                        <td> {{$phone}} </td>
                                        <td> {{$address}} </td>
                                        <td> {{$status}} </td>
                                        <td>
                                           
                                            <form action="{{ route('backside.memberlist.update',$id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('PUT')

                                            <button class="btn btn-outline-danger" type="submit"> 
                                                <i class="icofont-close icofont-1x"></i>
                                            </button>
                                            
                                            </form>
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