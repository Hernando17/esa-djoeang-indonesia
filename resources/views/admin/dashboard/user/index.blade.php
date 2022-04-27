@extends('admin.layout.template')
@section('title', 'User Data')
@section('header', 'User Data')
@section('content')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    {{-- id increment --}}
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage') }}/{{ $user->img }}" width="50px"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control mb-1" placeholder="Nama"
                                                value="{{ $user->name }}" required>
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control mb-1" placeholder="Email"
                                                value="{{ $user->email }}">
                                            <label for="image">Foto Profile</label>
                                            <div class="custom-file mb-3  col-10">
                                                <input type="file" class="custom-file-input" id="validatedCustomFile"
                                                    name="img">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose
                                                    file...</label>
                                            </div>
                                            <br>
                                            <label for="is_admin">Level</label>
                                            <select class="form-control form-control-sm col-5 mb-1" name="is_admin">
                                                @php
                                                    $level = $user->is_admin == 1 ? 'Admin' : 'User';
                                                    $value = $user->is_admin == 1 ? '1' : '0';
                                                @endphp
                                                <option value="{{ $value }}">{{ $level }}</option>
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
                                        <b>Apakah anda yakin?</b>
                                        <li>Ingin menghapus {{ $user->name }}</li>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.user.delete', $user->id) }}" method="GET">
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

@endsection
