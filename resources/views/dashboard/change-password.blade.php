@extends('dashboard.layouts.index')
@section('title', 'Ganti Password')
@section('contents')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Project Card Example -->
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-primary"></h6> -->
            </div>
            <div class="card-body">
                <form action="{{ config('app.url') . '/change-password'}}" method="post" class="user"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ session('id') }}">
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="password"
                                class="form-control form-control-user @error('password_old') is-invalid @enderror"
                                id="exampleInputPassword" name="password_old" placeholder="Password Lama" required>
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 mt-2">
                            <input type="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                id="exampleInputPassword" name="password" placeholder="Masukkan Password Baru" required>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                                name="password_confirmation" placeholder="Ulangi Password Baru">
                        </div>
                    </div>
                    @error('password')
                        <p class="small text-danger">{{$message}}</p>
                    @enderror
                    <button type="submit" name="submit" class="btn btn-primary btn-user mt-2">Ganti
                        Password</button>
                </form>
            </div>
        </div>
    </div>

@endsection