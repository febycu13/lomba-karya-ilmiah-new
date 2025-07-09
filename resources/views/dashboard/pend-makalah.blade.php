@extends('dashboard.layouts.index')
@section('title', 'Pendaftaran Makalah LKI')
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
                <form action="{{ config('app.url') . '/pend-makalah'}}" method="post" class="user"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="Title"
                                name="title" placeholder="Judul Makalah" value="{{old('title')}}" required>
                            @error('title')
                                <p class="help-block text-danger" style="font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 mt-2">
                            <select class="form-control form-control-sub_theme @error('sub_theme') is-invalid @enderror"
                                name="sub_theme" id="sub_theme" data-rule="required" data-msg="Pilih salah satu Sub Tema"
                                required>
                                <option selected disabled>Sub Tema Makalah</option>
                                @foreach ($dataSubtheme as $data)
                                    <option value="{{$data->subtheme}}" @if(old('sub_theme') == $data->subtheme) selected @endif>
                                        {{$data->subtheme}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 mt-2">
                            <input type="text" class="form-control  @error('code_school') is-invalid @enderror"
                                id="code_school" name="code_school" value="{{ $data_user->schools }}" readonly>
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 mt-2">
                            <input type="text" class="form-control  @error('school') is-invalid @enderror" id="school"
                                name="school" value="{{ $data_user->name_schools }}" readonly>
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 mt-2">
                            <input type="text" class="form-control  @error('name_participant') is-invalid @enderror"
                                id="name_participant" name="name_participant"
                                placeholder="Nama Peserta Contoh : Peserta 1, Peserta 2, dst"
                                value="{{old(key: 'name_participant')}}" required>
                            @error('name_participant')
                                <p class="help-block text-danger" style="font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 mt-2">
                            <input type="text" class="form-control  @error('name_teacher') is-invalid @enderror"
                                id="name_teacher" name="name_teacher" placeholder="Nama Pembimbing"
                                value="{{old('name_teacher')}}" required>
                            @error('name_teacher')
                                <p class="help-block text-danger" style="font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 mt-2">
                            <input type="text" class="form-control  @error('address_school') is-invalid @enderror"
                                id="address_school" name="address_school" value="{{ $data_user->address_schools }}"
                                readonly>
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 mt-2">
                            <select class="form-control form-control-province @error('province') is-invalid @enderror"
                                name="province" id="province" data-rule="required" data-msg="Pilih Provinsi" required>
                                <option selected disabled>Pilih Provinsi</option>
                                @foreach ($dataProvince as $data)
                                    <option value="{{ $data->province }}" @if(old('province') == $data->province) selected @endif>
                                        {{$data->province}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0 mt-2">
                            <input type="number" class="form-control  @error('men') is-invalid @enderror" id="men"
                                name="men" placeholder="Jumlah Peserta Laki-Laki" value="{{old('men')}}" required>
                            @error('men')
                                <p class="help-block text-danger" style="font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0 mt-2">
                            <input type="number" class="form-control  @error('women') is-invalid @enderror" id="women"
                                name="women" placeholder="Jumlah Peserta Perempuan" value="{{old('women')}}" required>
                            @error('women')
                                <p class="help-block text-danger" style="font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0 mt-2">
                            <input type="text" class="form-control  @error('telephone') is-invalid @enderror" id="telephone"
                                name="telephone" placeholder="No. Telephone" value="{{$data_user->telp}}" readonly>
                            @error('telephone')
                                <p class="help-block text-danger" style="font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0 mt-2">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Email Peserta" value="{{$data_user->email}}" readonly>
                            @error('email')
                                <p class="help-block text-danger" style="font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0 mt-2">
                            <input type="file" class="form-control  @error('file_makalah') is-invalid @enderror"
                                id="file_makalah" name="file_makalah" placeholder="Upload Makalah" required>
                            @error('file_makalah')
                                <p class="help-block text-danger" style="font-size: 14px;">{{ $message }}</p>
                            @enderror
                            <p class="help-block" style="font-size: 14px;">*File makalah harus berbentuk PDF (Max. 25MB)</p>
                        </div>
                        <div class="custom-control custom-checkbox ">
                            <input type="checkbox" class="custom-control-input" id="customCheck" required>
                            <label class="custom-control-label" for="customCheck" style="font-size: 14px;">Saya menyatakan
                                bahwa
                                seluruh data dan dokumen
                                yang saya lampirkan dalam pendaftaran ini adalah benar dan akurat.
                                Pendaftaran hanya bisa dilakukan 1 kali, apabila ada kesalahan penginputan data tidak dapat
                                diubah
                                kembali. Jika ditemukan data ganda atau dobel maka akan dilakukan diskualifikasi.</label>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary  mt-2">Daftar</button>
                </form>
            </div>
        </div>
    </div>
@endsection