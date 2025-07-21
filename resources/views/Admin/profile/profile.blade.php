@extends('Admin.layout.master')
@section('content')
    <div class="main-content">
        <div class="container my-5">
            <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User Profile</h5>
                    <a href="{{ route('profile.edit') }}" class="btn btn-light btn-sm">Edit</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Name</label>
                        <div>{{ $user->name }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Email</label>
                        <div>{{ $user->email }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
