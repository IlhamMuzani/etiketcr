@extends('back.layout.main')

@section('title', 'User')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> User</h4>
        @if (session('status'))
            <div class="alert alert-primary alert-dismissible" user="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header d-flex align-items-start justify-content-between">
                Data User
                <a href="{{ url('user/create') }}" class="btn btn-sm rounded-pill btn-primary">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah User</a>
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>Gambar</th>
                            <th>No Telpone</th>
                            <th>ALamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->role['role'] }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <img class="img-thumbnail" src="{{ asset('storage/uploads/' . $user->gambar) }}"
                                        width="100px">
                                </td>
                                <td>+62{{ $user->phone }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>
                                    <form method="post" action="{{ route('user.destroy', $user->id) }}"
                                        onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('user.show', $user->id) }}"
                                            class="btn rounded-pill btn-info btn-sm text-white">
                                            <span class="tf-icons bx bx-show"></span>&nbsp; Detail
                                        </a>
                                        <a href="{{ url('user/' . $user->id . '/edit') }}"
                                            class="btn rounded-pill btn-warning btn-sm text-white">
                                            <span class="tf-icons bx bxs-edit"></span>&nbsp; Ubah
                                        </a>
                                        <button type="submit" class="btn rounded-pill btn-danger btn-sm text-white">
                                            <span class="tf-icons bx bx-trash-alt"></span>&nbsp; Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
