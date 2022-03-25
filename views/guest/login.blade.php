@extends('layout.guest')


@section('container')
<div class="container d-flex justify-content-center vh-100">
    <div class="row align-items-center justify-content-center w-100">
        <div class="col-lg-5 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center">
                        <h3>Login</h3>
                        <p class="card-text text-muted">Login with your Email &amp; password</p>
                    </div>
                    <form id="login">
                        <div class="mb-3">
                            <input type="text" name="email" class="form-control form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control form-control" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn w-100 btn-success" value="Sing in">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{base_url()}}/js/login.js"></script>
@endsection
