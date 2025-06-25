@extends('layouts.login-register')
@section('title', 'Pendaftaran Akun')
@section('contents')
    <!-- Nested Row within Card Body -->
    <div class="row">
        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image">
                                                                                                                                                                                                                                            <img src="storage/assets/img/person/person-m-12.webp" alt="" style="width: 100%;">
                                                                                                                                                                                                                                        </div> -->
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Pendaftaran Akun!</h1>
                </div>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ config('app.url') . '/register'}}" method="post" class="user"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                            id="InputNamaLengkap" name="name" placeholder="Nama Lengkap" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                            id="exampleInputEmail" name="email" placeholder="Alamat Email" value="{{old('email')}}"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('telp') is-invalid @enderror"
                            id="exampleInputHP" name="telp" placeholder="No. Telp/Handphone" value="{{old('telp')}}"
                            required>
                        @error('telp')
                            <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('schools') is-invalid @enderror"
                            id="exampleInputJenis" name="schools" placeholder="Jenis Sekolah : (SMA/SMK/MA)"
                            value="{{old('schools')}}" required>
                    </div>
                    <div class="form-group">
                        <input type="text"
                            class="form-control form-control-user @error('name_schools') is-invalid @enderror"
                            id="exampleInputNamaSekolah" name="name_schools" placeholder="Nama Sekolah"
                            value="{{old('name_schools')}}" required>
                    </div>
                    <div class="form-group">
                        <input type="textarea"
                            class="form-control form-control-user @error('address_schools') is-invalid @enderror"
                            id="exampleInputAlamat" name="address_schools" placeholder="Alamat Sekolah"
                            value="{{old('address_schools')}}" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                id="exampleInputPassword" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                                name="password_confirmation" placeholder="Ulangi Password">
                        </div>
                    </div>
                    @error('password')
                        <p class="small text-danger">{{$message}}</p>
                    @enderror
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">DAFTAR</button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="{{config('app.url') . '/login'}}">Sudah Punya Akun? Login!</a>
                </div>
            </div>
        </div>
    </div>
@endsection