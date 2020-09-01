<x-backend>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1> <i class="icofont-list"></i> Event Form </h1>
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
            <form action=" {{route('backside.event.store')}} " method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                <div class="col-sm-10">
                  <input type="file" name="photo">
                  <div class="text-danger form-control-feedback">
                    {{$errors->first('photo') }}
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name_id" name="name">
                </div>
              </div>

              <div class="form-group row">
                <label for="photo_id" class="col-sm-2 col-form-label"> Field </label>
                <div class="col-sm-10">
                  <select class="form-control" name="fieldid">
                    <option> Choose Category </option>
                    @foreach($pitches as $pitch)
                    <option value=" {{$pitch->id}} "> {{$pitch->name}} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="teamno" class="col-sm-2 col-form-label"> Team Number </label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="teamno" name="teamno">
                </div>
              </div>
              <div class="form-group row">
                <label for="startdate" class="col-sm-2 col-form-label"> Start Date </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="startdate" name="startdate">
                </div>
              </div>
              <div class="form-group row">
                <label for="enddate" class="col-sm-2 col-form-label"> End Date </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="enddate" name="enddate">
                </div>
              </div>
              <div class="form-group row">
                <label for="i_description" class="col-sm-2 col-form-label"> Description </label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="i_description" name="description"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="i_description" class="col-sm-2 col-form-label"> Rule And Regulation </label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="rulesandregulation" name="rulesandregulation"></textarea>
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
      $('#rulesandregulation').summernote();

    });
  </script>
  @endsection
</x-backend>