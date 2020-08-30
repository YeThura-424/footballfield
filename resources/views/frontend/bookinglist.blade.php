<x-frontend>
	
    <div class="container">
        <div class="row">
        	<div class="col-12">
        		<div class="alert alert-primary text-center mt-3" role="alert">
  					<h2>Welcome <span>{{Auth::user()->name}}</span>, Here is Your Booking List From Our Website!</h2>
				</div>
        	</div>
            <div class="col-12 my-3">
                <table class="table text-center table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Pitch Name</th>
                            <th scope="col">Rent Hour</th>
                            <th scope="col">Price</th>
                            <th scope="col">Rent Date</th>
                            <th scope="col">Starttime</th>
                            <th scope="col">Endtime</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@php $i = 1; @endphp
                    	@foreach($rentdetail as $detail)
                    	@php
						$pitch = $detail->pitch->name;
						$hour = $detail->renthour;
						$price = $detail->totalprice;
						$date = $detail->rentdate;
						$starttime = $detail->starttime;
						$endtime = $detail->endtime;
						@endphp
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$pitch}}</td>
                            <td>{{$hour}}</td>
                            <td>{{$price}}</td>
                            <td>{{$date}}</td>
                            <td>{{$starttime}}</td>
                            <td>{{$endtime}}</td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
        		<div class="alert alert-primary text-center mt-3" role="alert">
  					<h2>You Have Rent Total: {{$renthour}}-Hours From Us, Thanks for using our website!</h2>
				</div>
        	</div>
        	<div class="col-6">
        		<div class="alert alert-primary text-center mt-3" role="alert">
  					<h2>You Have Spent Total: {{$totalprice}}-MMK To Us, Thanks for using our website!</h2>
				</div>
        	</div>
        </div>
    </div>
</x-frontend>
