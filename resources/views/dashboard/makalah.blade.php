@extends('dashboard.layouts.index')
@section('title', 'Daftar Pemakalah')
@section('contents')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Makalah</th>
                            <th>Tema Makalah</th>
                            <th>Judul Makalah</th>
                            <th>Nama Sekolah</th>
                            @if($data_user->role == 'admin')
                                <th style="width:8%">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_makalah as $makalah)
                            <tr>
                                <td>{{$makalah->id_makalah}}</td>
                                <td>{{$makalah->sub_theme}}</td>
                                <td>{{$makalah->title}}</td>
                                <td>{{$makalah->school}}</td>
                                @if($data_user->role == 'admin')
                                    <td>
                                        <a href="#" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $makalah->id }}"><i class="fas fa-trash"></i></button>
                                        <a href="{{config('app.url') . '/storage/makalah/' . $makalah->file_makalah}}"
                                            class=" btn btn-info btn-circle btn-sm" target="_blank">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            <!-- Delete Modal-->
                            <div class="modal fade" id="deleteModal{{ $makalah->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Halaman Konfirmasi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Apakah anda yakin akan menghapus Makalah dengan Judul
                                            <strong>{{ $makalah->title }}</strong> dari Sekolah <b>{{ $makalah->school }}</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                            <form action="{{config('app.url') . '/makalah/' . $makalah->id}}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Hapus!!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection