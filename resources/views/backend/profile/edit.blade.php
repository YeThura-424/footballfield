<x-backend>
    @php
    // dd($user);
    $name = $user->name;
    $profile = $user->profile;
    $email = $user->email;
    $phone = $user->phone;
    $address = $user->address;
    $id = $user->id;
    @endphp
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> User Profile </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.dashboard.index') }}" class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('backside.userprofile.update',$id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card my-3">
                        <div class="row no-gutters">
                            <div id="image-preview" class="col-md-4">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" />
                                <input type="hidden" name="oldimage" id="image-preupload" value="{{$profile}}" />
                            </div>
                            <div class="col-md-6">
                                <div class="card-body mt-5">
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 col-form-label">User Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="username" name="username" value="{{$name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="email" name="email" value="{{$email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{$phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="address" rows="2" name="address">{{$address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
    
    @section('script_content')
    <script type="text/javascript">
    $(document).ready(function() {
        var image = '{{$user->profile}}';
        var public_path = "{{asset('/')}}";
        var imgpre_arr = public_path + image;
        console.log(imgpre_arr);
        $("#image-preview").css("background-image", "url(" + imgpre_arr + ")");
        $("#image-preview").css("background-size", "cover");
        $("#image-preview").css("background-position", "center center");
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose Profile", // Default: Choose File
            label_selected: "Change Profile", // Default: Change File
            no_label: false, // Default: false

        });
    });

    </script>
    @endsection
</x-backend>
