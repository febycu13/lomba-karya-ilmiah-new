@extends('layouts.login-register')
@section('title', 'Login')
@section('contents')
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image">
            <img src="storage/assets/img/person/person-m-12.webp" alt="" style="width: 100%;">
        </div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                </div>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="user">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Ingat saya</label>
                        </div>
                    </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                        Masuk
                    </a>
                    <hr>
                    <a href="{{config('app.url') . '/register'}}" class="btn btn-dark btn-user btn-block">
                        Pendaftaran Akun!
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection