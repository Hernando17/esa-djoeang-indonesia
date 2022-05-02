@extends('admin.layout.template')
@section('title', 'Profile Anda')
@section('header', 'Profile Anda')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col mt-3">
                        <p>Nama : {{ Auth::User()->name }}</p>
                        <p>Email : {{ Auth::User()->email }}</p>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit">
                            Ubah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control mb-1" placeholder="Nama"
                                                value="" required>
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control mb-1" placeholder="Email"
                                                value="">
                                            <label for="image">Foto Profile</label>
                                            <div class="custom-file mb-3  col-10">
                                                <input type="file" class="custom-file-input" id="validatedCustomFile"
                                                    name="img">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose
                                                    file...</label>
                                            </div>
                                            <br>
                                            <label for="is_admin">Level</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <img src="{{ asset('storage') }}/{{ Auth::User()->img }}" width="200px"
                            class="float-right mr-5">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
