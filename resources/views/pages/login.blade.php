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
    <div class="col-4 m-3 shadow p-4 rounded-lg">
        <h3 class="text-primary mb-3">Login</h3>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button>
        </form>
    </div>
</div>

@endsection