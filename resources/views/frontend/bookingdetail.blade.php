<x-frontend>
	@php
	$name = $pitch->name;
    $id = $pitch->id;
	$photos = json_decode($pitch->photo);
	$photo = $photos[0];
	$description = $pitch->description;
	$stadium = $pitch->stadia->name;
    // dd($rentdetail);
	@endphp
   
	<div id="detail-book">
        <div class="container py-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-uppercase text-center">field detail</h2>
                </div>
                <div class="card mb-3 py-3 pl-3">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img src=" {{asset($photo)}} " style="width: 100%; height:410px; object-fit: cover;">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"> {{$name}} </h5>
                                <p class="card-text"> {!!Str::limit($description,60)!!} </p>
                                <p class="card-text">Home Stadium: {{$stadium}} </p>
                                <p>Price List</p>
                                @foreach($prices as $unitprice)
                                @php
                                $starttime = $unitprice->starttime;
                                $endtime = $unitprice->endtime;
                                $price = $unitprice->price;
                                @endphp
                                <p class="text-muted"><span>From: {{$starttime}}</span> <span>To: {{$endtime}} </span> <span>Price: {{$price}} </span></p>
                                @endforeach
                                <div class="owl-carousel">
                                	@foreach($photos as $photo)
                                    <img src=" {{asset($photo)}} " style="width: 170px; height:150px; object-fit: cover;">
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-3 formbook">
            <form action=" {{route('rentdetail',$id)}} " method="GET">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-uppercase text-center">book field</h2>
                    </div>
                    <div class="col-12 justify-content-center">
                        @foreach($prices as $unitprice)
                        @php
                        $starttime = $unitprice->starttime;
                        $endtime = $unitprice->endtime;
                        $price = $unitprice->price;
                        $id = $unitprice->id;
                        @endphp
                        <input type="hidden" name="starttime" value="{{$starttime}}" id="{{$id."start"}}">
                        <input type="hidden" name="endtime" value="{{$endtime}}" id="{{$id."end"}}">
                        <input type="hidden" name="price" value="{{$price}}" id="{{$id."price"}}">
                        @endforeach
                        <div class="form-group row py-3">
                            <label for="fieldname" class="col-sm-2 col-form-label">Field Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="fieldname" readonly="readonly" value=" {{$name}} " name="fieldname">
                            </div>
                            <label for="membername" class="col-sm-2 col-form-label">Member Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="membername" readonly="readonly" value=" {{Auth::user()->name}} " name="member">
                            </div>
                        </div>
                        <div class="form-group row py-3">
                            <label for="pickdate" class="col-sm-2 col-form-label">Pick Date</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="pickdate" name="rentdate">
                            </div>
                            <label for="picktime" class="col-sm-2 col-form-label">Pick Time</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="picktime1" name="starttime">
                                    <option>From</option>
                                    @foreach($times as $time)
                                    <option value="{{$time->starttime}}" class="pickatime"> {{$time->starttime}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control" id="picktime2" name="endtime">
                                    <option>To</option>
                                    @foreach($times as $time)
                                    <option value=" {{$time->endtime}} " class="pickatime"> {{$time->endtime}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row py-3">
                            <label for="totalhour" class="col-sm-2 col-form-label">Total Hour</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="totalhour" readonly="readonly" name="totalhour">
                            </div>
                            <label for="totalprice" class="col-sm-2 col-form-label">Total Price</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="totalprice" readonly="readonly" name="totalprice">
                            </div>
                        </div>
                        <div class="form-group row py-3 justify-content-center">
                            <button type="submit" class="btn btn-success form-control col-2 bookbtn">Book Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-frontend>