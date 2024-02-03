<x-backend>
	<main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Pitch Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href=" {{route('backside.pitch.index')}} " class="btn btn-outline-primary">
                        <i class="icofont-double-left icofont-1x"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action=" {{route('backside.pitch.store')}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                      <div class="input-images"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" placeholder="Please enter field name">
                                      {{$errors->first('name') }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Select1" class="col-sm-2 col-form-label"> Stadium </label>
                                    <div class="col-sm-10">
	                                    <select class="form-control" id="Select1" name="stadiumid">
	      									<option>Choose Stadium</option>
                                            @foreach($stadiums as $stadium)
	      									<option value=" {{$stadium->id}} "> {{$stadium->name}} </option>
	      									@endforeach
	    								</select>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="i_description" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" id="i_description" name="description"></textarea>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Field Size </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="field_size" placeholder="138ft x 68ft">
                                      {{$errors->first('name') }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Save
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


          $('.input-images').imageUploader();

        });
      </script>
    @endsection
</x-backend>