<x-backend>
    @php
    $starttime = $time->starttime;
    $endtime = $time->endtime;
    $id = $time->id;
    @endphp
	<main class="app-content">
        <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Time Edit Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href=" {{route('backside.time.index')}} " class="btn btn-outline-primary">
                        <i class="icofont-double-left icofont-1x"></i>
                    </a>
                </ul>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action=" {{route('backside.time.update',$id)}} " method="POST" >
                            	 @csrf
                                 @method('PUT')
                                <div class="form-group row">
                                    <label for="starttime" class="col-sm-2 col-form-label"> Start Time </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="starttime" name="starttime" value=" {{$starttime}} ">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="endtime" class="col-sm-2 col-form-label"> End Time </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="endtime" name="endtime" value=" {{$endtime}} "> 
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

         $('#starttime,#endtime').timepicker({
            interval:60,
         })

        });
      </script>
    @endsection
</x-backend>