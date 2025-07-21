@extends('Admin.layout.master')
@section('content')
    <div class="main-content">
        <div class="container my-5">
            <div class="card mx-auto shadow-sm" style="max-width: 600px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Profile</h5>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
