@extends('layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb bg-light py-2 mb-3 rounded-lg shadow-sm">
            <div class="row">
                <div class="col-12">
                    <h5 class="page-title text-primary fw-bold mb-2">
                        <i class="mdi mdi-account-multiple me-2"></i>Manage Staff Users
                    </h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0" style="font-size: 0.85rem;">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Manage Staff Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            {{-- Alerts --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 rounded-2 shadow-sm mb-3" style="font-size: 0.9rem;">
                    <i class="mdi mdi-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 rounded-2 shadow-sm mb-3" style="font-size: 0.9rem;">
                    <i class="mdi mdi-alert-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">

                {{-- ======================== --}}
                {{-- ADD NEW STAFF FORM       --}}
                {{-- ======================== --}}
                <div class="col-12 mb-3">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden">
                        <div class="card-header bg-primary bg-opacity-10 border-0 py-3 px-3">
                            <h5 class="card-title mb-0 fw-bold text-dark" style="font-size: 0.95rem;">
                                <i class="mdi mdi-account-plus me-2 text-primary"></i>Add New Staff User
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

                            <form action="{{ route('staff.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold mb-1" style="font-size: 0.85rem;">Full Name</label>
                                            <input type="text" name="full_name" class="form-control form-control-sm rounded-2"
                                                placeholder="Full name (optional)" value="{{ old('full_name') }}" style="font-size: 0.9rem;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold mb-1" style="font-size: 0.85rem;">Username <span class="text-danger">*</span></label>
                                            <input type="text" name="username"
                                                class="form-control form-control-sm rounded-2 @error('username') is-invalid @enderror"
                                                placeholder="Username" value="{{ old('username') }}" required style="font-size: 0.9rem;">
                                            @error('username')
                                                <div class="invalid-feedback" style="font-size: 0.8rem;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold mb-1" style="font-size: 0.85rem;">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password"
                                                class="form-control form-control-sm rounded-2 @error('password') is-invalid @enderror"
                                                placeholder="Password" required style="font-size: 0.9rem;">
                                            @error('password')
                                                <div class="invalid-feedback" style="font-size: 0.8rem;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group mb-2">
                                            <label class="fw-semibold mb-1" style="font-size: 0.85rem;">Assign Store <span class="text-danger">*</span></label>
                                            <select name="store_id"
                                                class="form-control form-control-sm rounded-2 @error('store_id') is-invalid @enderror" required style="font-size: 0.9rem;">
                                                <option value="">-- Select Store --</option>
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}"
                                                        {{ old('store_id') == $store->id ? 'selected' : '' }}>
                                                        {{ $store->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('store_id')
                                                <div class="invalid-feedback" style="font-size: 0.8rem;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary btn-sm rounded-2 shadow-sm mt-2" style="font-size: 0.9rem; padding: 0.5rem 1.2rem;">
                                    <i class="mdi mdi-account-plus me-1"></i> Create Staff
                                </button>

                            </form>
                        </div>
                    </div>
                </div>

                {{-- ======================== --}}
                {{-- STAFF LIST TABLE         --}}
                {{-- ======================== --}}
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden">
                        <div class="card-header bg-light border-0 py-3 px-3">
                            <h5 class="card-title mb-0 fw-bold text-dark" style="font-size: 0.95rem;">
                                <i class="mdi mdi-account-group me-2 text-success"></i>Existing Staff Users
                                <span class="badge bg-primary bg-opacity-20 text-primary fw-semibold" style="font-size: 0.7rem;">{{ $staff->count() }}</span>
                            </h5>
                        </div>
                        <div class="card-body p-3">

                            <div class="table-responsive">
                                <table class="table table-hover mb-0" style="font-size: 0.85rem;">
                                    <thead class="bg-light">
                                        <tr class="border-bottom">
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">#</th>
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">Username</th>
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">Full Name</th>
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">Assigned Store</th>
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">Created At</th>
                                            <th class="fw-bold text-dark py-2 text-center" style="font-size: 0.8rem;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($staff as $index => $user)
                                            <tr class="align-middle border-bottom">
                                                <td class="py-2">
                                                    <span class="badge bg-secondary bg-opacity-20 text-dark fw-bold" style="font-size: 0.7rem;">{{ $index + 1 }}</span>
                                                </td>
                                                <td class="py-2">
                                                    <strong class="text-dark">{{ $user->username }}</strong>
                                                </td>
                                                <td class="py-2 text-muted">{{ $user->full_name ?: '-' }}</td>
                                                <td class="py-2">
                                                    @if ($user->store_name)
                                                        <span class="badge bg-info bg-opacity-10 text-info fw-semibold px-2" style="font-size: 0.7rem;">{{ $user->store_name }}</span>
                                                    @else
                                                        <span class="text-muted" style="font-size: 0.75rem;">Not Assigned</span>
                                                    @endif
                                                </td>
                                                <td class="py-2 text-muted" style="font-size: 0.85rem;">
                                                    {{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d-M-Y') : '-' }}
                                                </td>
                                                <td class="py-2">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('staff.edit', $user->id) }}"
                                                            class="btn btn-sm btn-info rounded-2" style="font-size: 0.75rem; padding: 0.3rem 0.6rem;">
                                                            <i class="mdi mdi-pencil"></i> Edit
                                                        </a>

                                                        <form action="{{ route('staff.destroy', $user->id) }}" method="POST"
                                                            style="display:inline;"
                                                            onsubmit="return confirm('Delete this staff user?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger rounded-2" style="font-size: 0.75rem; padding: 0.3rem 0.6rem;">
                                                                <i class="mdi mdi-delete"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="6" class="py-4">
                                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                                        <i class="mdi mdi-account-off text-muted" style="font-size: 36px; opacity: 0.3;"></i>
                                                        <p class="text-muted fw-semibold mt-2 mb-0" style="font-size: 0.9rem;">No staff users found.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
