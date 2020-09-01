<x-frontend>
    <div id="register">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center my-3 mt-5">
                    <div class="alert alert-primary m-auto" role="alert" style="width: 65% !important">
                        <h2> Register </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action=" {{route('register')}} " method="POST">
                        @csrf
                        <div class="form-row my-4">
                            <div class="col">
                                <label class="small mb-1" for="inputName"> Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="col">
                                <label class="small mb-1" for="inputName"> Phone Number</label>
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                            </div>
                        </div>
                        <div class="form-row my-4">
                            <div class="col">
                                <label class="small mb-1" for="inputName"> Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-row my-4">
                            <div class="col">
                                <label class="small mb-1" for="inputName"> Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="col">
                                <label class="small mb-1" for="inputName"> Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
                            </div>
                        </div>
                        <div class="form-row my-4">
                            <div class="col">
                                <label class="small mb-1" for="inputName"> Address</label>
                                <textarea class="form-control row-2" name="address"></textarea>
                            </div>
                        </div>
                        <div class="text-center my-4">
                            <button type="submit" class="btn btn-primary"> Create Account </button>
                        </div>
                        <div class=" mt-3 text-center my-4">
                            <a href=" {{route('login')}} " class="text-white text-decoration-none">Have an account? Go to login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-frontend>