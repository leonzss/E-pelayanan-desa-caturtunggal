@extends('layout.auth')
@section('title')
    <title>e-Pelayanan - LOGIN</title>
@endsection
@section('nav')

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light py-4">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="assets/img/logoSleman.png" width="236" height="77" class="d-inline-block align-top"
                    alt="logoSleman">
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <span class="nav-link nav-link-login">
                        <a href="{{ route('register') }}"> Register</a>
                    </span>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End of Navbar -->
@endsection
@section('content')



    <section class="my-login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Login <span class="text-core">e-Pelayanan</span></h4>
                            @if ($message = Session::get('usernotfound'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('loginpost') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Ketikkan Username" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Ketikkan Password" required>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-core btn-block">MASUK AKUN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2023 &mdash; e-Pelayanan
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
