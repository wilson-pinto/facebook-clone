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
    <div class="col-4 m-3 shadow-sm bg-white p-4 rounded-lg">
        <h3 class="text-primary mb-3">Login</h3>
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=""
                    aria-describedby="emailHelp">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input value="12345678" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <p class="text-secondary">Don't have an Account? <a href="/register">Sign Up</a></p>

            <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button>
        </form>
    </div>
</div>

@endsection