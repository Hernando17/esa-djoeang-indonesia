@extends('admin.layout.template')
@section('title', 'Data Pengguna')
@section('header', 'Data Pengguna')
@section('content')

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#edit">
                        Tambah
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.useradd') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control mb-2" placeholder="Nama"
                                            required>
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control mb-2" placeholder="Email"
                                            required>
                                        <div class="row">
                                            <div class="col">
                                                <label for="password">Kata Sandi</label>
                                                <input type="password" name="password" class="form-control mb-2"
                                                    placeholder="Kata Sandi" required>
                                            </div>
                                            <div class="col">
                                                <label for="password_confirm">Ulangi Kata Sandi</label>
                                                <input type="password" name="confirm_password" class="form-control mb-2"
                                                    placeholder="Kata Sandi" required>
                                            </div>
                                        </div>

                                        <label for="is_admin">Level</label>
                                        <select class="form-control form-control-sm col-5 mb-2" name="is_admin">
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card rounded-3">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Profile</th>
                                <th>Level</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    {{-- id increment --}}
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle"><img src="{{ asset('storage') }}/{{ $user->img }}"
                                            width="50px">
                                    </td>
                                    @php
                                        $level = $user->is_admin == true ? 'Admin' : 'User';
                                    @endphp
                                    <td class="align-middle">{{ $level }}</td>
                                    <td class="align-middle">{{ $user->name }}</td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit{{ $user->id }}">
                                            Ubah
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.user.update', $user->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <label for="name">Nama</label>
                                                            <input type="text" name="name" class="form-control mb-1"
                                                                placeholder="Nama" value="{{ $user->name }}" required>
                                                            <label for="email">Email</label>
                                                            <input type="text" name="email" class="form-control mb-1"
                                                                placeholder="Email" value="{{ $user->email }}">
                                                            <label for="image">Foto Profile</label>
                                                            <div class="custom-file mb-3  col-10">
                                                                <input type="file" class="custom-file-input"
                                                                    id="validatedCustomFile" name="img">
                                                                <label class="custom-file-label"
                                                                    for="validatedCustomFile">Choose
                                                                    file...</label>
                                                            </div>
                                                            <br>
                                                            <label for="is_admin">Level</label>
                                                            <select class="form-control form-control-sm col-5 mb-1"
                                                                name="is_admin">
                                                                @php
                                                                    $level = $user->is_admin == true ? 'Admin' : 'User';
                                                                    $value = $user->is_admin == true ? '1' : '0';
                                                                @endphp
                                                                <option value="{{ $value }}">{{ $level }}
                                                                </option>
                                                                <option value="1">Admin</option>
                                                                <option value="0">User</option>
                                                            </select>
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

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#ubahpassword{{ $user->id }}">
                                            Ubah Kata Sandi
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="ubahpassword{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="#" method="POST">
                                                        <div class="modal-body">
                                                            <p>Nama Pengguna : <b>{{ $user->name }} </b></p>
                                                            <label for="password">Kata Sandi Baru</label>
                                                            <input type="password" class="form-control mb-2" name="password"
                                                                placeholder="Kata Sandi Baru" required>
                                                            <label for="password">Ulangi Kata Sandi Baru</label>
                                                            <input type="password" class="form-control"
                                                                name="password_confirm" placeholder="Ulangi Kata Sandi Baru"
                                                                required>
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


                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $user->id }}">
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><b>Apakah anda yakin?</b></p>
                                                        <li>Ingin menghapus {{ $user->name }}</li>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('admin.user.delete', $user->id) }}"
                                                            method="GET">
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
