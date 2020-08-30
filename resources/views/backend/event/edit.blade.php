<x-backend>
    @php
    $name = $event->name;
    $photo = $event->photo;
    $pitchid = $event->pitch_id;
    $pitch = $event->pitch->name;
    $startdate = $event->startdate;
    $enddate = $event->enddate;
    $teamno = $event->teamno;
    $description = $event->description;
    $rules = $event->rule;
    $id = $event->id;
    @endphp
	<main class="app-content">
        <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Event Edit Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href=" {{route('backside.event.index')}} " class="btn btn-outline-primary">
                        <i class="icofont-double-left icofont-1x"></i>
                    </a>
                </ul>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action=" {{route('backside.event.update',$id)}} " method="POST" enctype="multipart/form-data">
                            	 @csrf
                                 @method('PUT')
                                 <input type="hidden" name="oldPhoto" value="{{$photo}}">
                                 <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="oldphoto" role="tabpanel" aria-labelledby="home-tab"><img src="{{asset($photo)}}" class="img-fluid w-25"></div>
                                        <div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="profile-tab"><input type="file" id="photo_id" name="photo">
                                            <div class="text-danger form-control-feedback">
                                                {{$errors->first('photo') }} 
                                            </div></div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value=" {{$name}} ">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Field </label>
                                    <div class="col-sm-10">
                                      <select class="form-control" name="fieldid">
                                        <option> Choose Category </option>
                                        @foreach($pitches as $pitch)
                                        <option value=" {{$pitch->id}}" @if($pitchid == $pitch->id) {{'selected'}} @endif> {{$pitch->name}} </option>
                                        @endforeach
                                    </select> 	
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="teamno" class="col-sm-2 col-form-label"> Team Number </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="teamno" name="teamno" value=" {{$teamno}} ">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="startdate" class="col-sm-2 col-form-label"> Start Date </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control date" id="startdate" name="startdate" value=" {{$startdate}} ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="enddate" class="col-sm-2 col-form-label"> End Date </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control date" id="enddate" name="enddate" value=" {{$enddate}} " placeholder="">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="i_description" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" id="i_description" name="description"> {{$description}} </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="i_description" class="col-sm-2 col-form-label"> Rule And Regulation </label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" id="rulesandregulation" name="rulesandregulation"> {{$rules}} </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </main>
    @section('script_content')

      <script type="text/javascript">
        $(document).ready(function() {

          $('#i_description').summernote();
          $('#rulesandregulation').summernote();
          $('#startdate,#enddate').datepicker({
            format: 'yyyy-mm-dd',
            startDate : new Date
          });

        });
      </script>
    @endsection
</x-backend>