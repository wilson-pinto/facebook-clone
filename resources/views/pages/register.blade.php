@extends('layout.app')
@section('body')

<div class="row align-items-center h-70vh">
    <div class="col-7">
        <h1 class="text-primary">Facebook</h1>
        <p class="text-secondary mt-2">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex placeat repellendus ipsa sed! Quibusdam neque
            nulla excepturi, animi ex earum ea facilis! Nam tempora architecto atque veniam, dolores maiores facilis!
        </p>
    </div>
    <div class="col-4 m-3 shadow-sm bg-white p-4 rounded-lg mt-5">
        <h3 class="text-primary mb-3">Register</h3>
        <form enctype="multipart/form-data" action="/register" method="POST">
            @csrf
            <img id="profilePlaceHolder" class="profile" src="/img/profile.png" />

            <div class="form-group mt-2">
                <input id="profile" type="file" name="profile"
                    class="d-none form-control @error('profile') is-invalid @enderror">
                @error('profile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="name">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    aria-describedby="emailHelp">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    aria-describedby="emailHelp">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror"
                    name="confirmPassword">
                @error('confirmPassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <p class="text-secondary">Have an Account? <a href="/login">Login</a></p>
            <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $("#profilePlaceHolder").click(function(e) {
        $("#profile").click();
    });

    $("#profile").change(function(){
        if (this.files && this.files[0]) {
            var imageFile = this.files[0];
            var reader = new FileReader();    
            reader.onload = function (e) {
                $('#profilePlaceHolder').attr('src', e.target.result);
            }    
            reader.readAsDataURL( imageFile );
         }
    });
</script>
@endsection