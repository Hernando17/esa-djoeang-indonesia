@extends('admin.layout.template')
@section('title', 'Profile Anda')
@section('header', 'Identitas Anda')
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
                                    <form action="{{ route('admin.user.update', Auth::User()->id) }}" method="POST"
                                        enctype="multipart/form-data">
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
            </div>
        </div>
    </div>

    <br>
    <h1 class="h3 mb-4 text-gray-800">Ubah Kata Sandi</h1>
    <div class="card mt-2">
        <div class="container">
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col">
                            <label for="password_confirm">Ulangi Kata Sandi</label>
                            <input type="password" class="form-control" name="password_confirm">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right mt-3 mb-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="" style="padding:50px;"></div>

@endsection
