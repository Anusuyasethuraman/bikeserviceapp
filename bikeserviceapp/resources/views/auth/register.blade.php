<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title","Bike Service Station")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<div class="d-flex  align-items-center vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <!-- success message  -->
                    @if(session()->has("success"))
                    <div class="alert alert-success">
                        {{session()->get("success")}}
                    </div>
                    @endif

                    <!-- error message -->
                    @if(session()->has("error"))
                    <div class="alert alert-danger">
                        {{session()->get("error")}}
                    </div>
                    @endif

                    <div class="card shadow p-4">
                        <h2 class="text-center mb-4">Registration Form</h2>
                        <form method = "POST" action = "{{route('register.post')}}" >
                            @csrf
                            <div class="form-group mt-2">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                @if($errors->has('name'))
                                <span class="text-danger">
                                    {{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Enter phone number"
                                 maxlength="10">
                                @if($errors->has('phone_number'))
                                <span class="text-danger">
                                    {{$errors->first('phone_number')}}</span>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                                @if($errors->has('email'))
                                <span class="text-danger">
                                    {{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @if($errors->has('password'))
                                <span class="text-danger">
                                    {{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
                               <button type="submit" class="btn btn-primary btn-block mt-3">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>            
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>