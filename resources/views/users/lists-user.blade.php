@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i>{{ __(' Tambah
                User') }}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Kontak</th>
                            <th>Role</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user)
                        <tr>
                            <td class="col-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        @if ($user->image)
                                        <img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->name }}">
                                        @else
                                        <img src="{{ asset('user.svg') }}">
                                        @endif
                                    </div>
                                    <p class="font-bold ms-3 mb-0">{{ $user->name }}</p>
                                </div>
                            </td>
                            <td class="col-auto">
                                <p class=" mb-0">{{ $user->username }}</p>
                            </td>
                            <td class="col-auto">
                                <p class=" mb-0">{{ $user->email }}</p>
                            </td>
                            <td class="col-auto">
                                <p class=" mb-0">{{ $user->contact }}</p>
                            </td>
                            <td class="col-auto">
                                <p class=" mb-0">{{ $user->role }}</p>
                            </td>
                            <td class="col-auto">
                                <div class="btn-group">
                                    @if ($user->role == 'admin')
                                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="role" id="role" value="user">
                                        <button type="submit" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-user"></i>
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="role" id="role" value="admin">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fas fa-user-circle"></i>
                                        </button>
                                    </form>
                                    @endif
                                    <form id="delete-form" action="{{ route('users.destroy', $user->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submir" class="btn btn-danger btn-sm btn-delete"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
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