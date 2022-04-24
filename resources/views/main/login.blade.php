@extends('main.layout.template')
@section('title', $title)
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card col-5 shadow p-3 mb-5 bg-white" style="
                                                                                        margin: 50px auto;
                                                                                        margin-top: 20vh;
                                                                                        border-radius:10px;
                                                                                        ">
                    <div class="card-body">
                        <form action="{{ route('auth') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control mb-3"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-end">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
