<x-backend>
    @php
    $id = $pitch->id;
    $name = $pitch->name;
    $oldphoto = $pitch->photo;
    $stadiumid = $pitch->stadia_id;
    $description = $pitch->description;
    $field_size = $pitch->field_size;
    @endphp
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
                        <form action=" {{route('backside.pitch.update',$id)}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="oldphoto" value="{{$pitch->photo}}">

                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                <div class="col-sm-10">
                                    <div class="input-images"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_id" name="name" value=" {{$name}} ">
                                    {{$errors->first('name') }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Select1" class="col-sm-2 col-form-label"> Stadium </label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="Select1" name="stadiumid">
                                        <option>Choose Stadium</option>
                                        @foreach($stadia as $stadium)
                                        <option value=" {{$stadium->id}} " @if($stadiumid==$stadium->id) {{'selected'}} @endif> {{$stadium->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="i_description" class="col-sm-2 col-form-label"> Description </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="i_description" name="description"> {{$description}} </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Field Size </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_id" name="field_size" placeholder="138ft x 68ft" value="{{$field_size}}">
                                    {{$errors->first('field_size') }}
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

            var images = JSON.parse('{!! $pitch->photo !!}');
            var public_path = "{{asset('/')}}";

            console.log(images);
            var imgpre_arr = [];

            for (i = 0; i < images.length; i++) {
                var imgpre_obj = {};

                imgpre_obj.id = i;
                imgpre_obj.src = public_path + images[i];

                imgpre_arr.push(imgpre_obj);

            }

            $('.input-images').imageUploader({
                preloaded: imgpre_arr,
                preloadedInputName: 'oldPhoto',
            });

        });
    </script>
    @endsection
</x-backend>