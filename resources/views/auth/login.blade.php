<x-frontend>
    <div id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center my-3 mt-5" >
                    <div class="alert alert-primary m-auto" role="alert">
                        <h2> Login </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form spad">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center my-3" >
                        <div class="alert alert-primary m-auto" role="alert">
                            <p> Admin Login info</p>
                            <hr>
                            <span>email : admin@gmail.com</span> <br>
                            <span>password : 123456789</span>
                        </div>
                    </div>
                    <div class="col-5">
                        
                    
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" value="{{ old('email') }}"{{-- autofocus="false" --}} />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                    <label class="custom-control-label text-white" for="rememberPasswordCheck">Remember password</label>


                                </div>

                                

                            </div>
                            
                            <div class="text-center">

                                <button type="submit" class="btn btn-primary">LOGIN</button>
                            </div>
                        </form>

                        <div class=" mt-3 text-center my-3">
                            <a href=" {{route('register')}} " class="text-white text-decoration-none">Need an account? Reister Here!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend>