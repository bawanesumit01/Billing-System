@extends('layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb bg-light py-2 mb-3 rounded-lg shadow-sm">
            <div class="row">
                <div class="col-12">
                    <h5 class="page-title text-primary fw-bold mb-2">
                        <i class="mdi mdi-account-edit me-2"></i>Edit Staff User
                    </h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0" style="font-size: 0.85rem;">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('staff.index') }}" class="text-decoration-none">Staff</a></li>
                            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden">
                        <div class="card-header bg-primary bg-opacity-10 border-0 py-3 px-3">
                            <h5 class="card-title mb-0 fw-bold text-dark" style="font-size: 0.95rem;">
                                <i class="mdi mdi-account-edit me-2 text-primary"></i>Update Staff Information
                            </h5>
                        </div>
                        <div class="card-body p-3">

                            @if ($errors->any())
                                <div class="alert alert-danger border-0 rounded-2 mb-3" style="font-size: 0.85rem;">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('staff.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label class="fw-semibold mb-2" style="font-size: 0.85rem;">Full Name</label>
                                    <input type="text" name="full_name" class="form-control form-control-sm rounded-2"
                                        placeholder="Full name (optional)" value="{{ old('full_name', $user->full_name) }}" style="font-size: 0.9rem;">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="fw-semibold mb-2" style="font-size: 0.85rem;">Username <span class="text-danger">*</span></label>
                                    <input type="text" name="username"
                                        class="form-control form-control-sm rounded-2 @error('username') is-invalid @enderror"
                                        value="{{ old('username', $user->username) }}" required style="font-size: 0.9rem;">
                                    @error('username')
                                        <div class="invalid-feedback" style="font-size: 0.8rem;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="fw-semibold mb-2" style="font-size: 0.85rem;">Assign Store <span class="text-danger">*</span></label>
                                    <select name="store_id" class="form-control form-control-sm rounded-2 @error('store_id') is-invalid @enderror"
                                        required style="font-size: 0.9rem;">
                                        <option value="">-- Select Store --</option>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}"
                                                {{ old('store_id', $user->store_id) == $store->id ? 'selected' : '' }}>
                                                {{ $store->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('store_id')
                                        <div class="invalid-feedback" style="font-size: 0.8rem;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex gap-2 pt-2">
                                    <button type="submit" class="btn btn-primary btn-sm rounded-2 shadow-sm" style="font-size: 0.9rem; padding: 0.5rem 1.2rem;">
                                        <i class="mdi mdi-content-save me-1"></i> Update Staff
                                    </button>
                                    <a href="{{ route('staff.index') }}" class="btn btn-outline-secondary btn-sm rounded-2" style="font-size: 0.9rem; padding: 0.5rem 1.2rem;">
                                        <i class="mdi mdi-arrow-left me-1"></i> Back
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
