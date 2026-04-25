@extends('layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Attendance</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Attendance</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">


            {{-- Flash --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif



            {{-- ── TABLE CARD ── --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="scroll_hor" class="table table-striped table-bordered display nowrap" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Staff Name</th>
                                    <th>Date</th>
                                    <th>Clock In</th>
                                    <th>Clock Out</th>
                                    <th>Total Hours</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendance as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->user->full_name }}</td>
                                        <td>{{ $row->attendance_date }}</td>
                                        <td>
                                            {{ $row->clock_in ? \Carbon\Carbon::parse($row->clock_in)->format('h:i a') : '-' }}
                                        </td>

                                        <td>
                                            {{ $row->clock_out ? \Carbon\Carbon::parse($row->clock_out)->format('h:i a') : '-' }}
                                        </td>
                                        <td>
                                            @if ($row->clock_in && $row->clock_out)
                                                @php
                                                    $clockIn = \Carbon\Carbon::parse($row->clock_in);
                                                    $clockOut = \Carbon\Carbon::parse($row->clock_out);

                                                    $diff = $clockIn->diff($clockOut);
                                                @endphp

                                                {{ $diff->h }} hrs {{ $diff->i }} mins
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $row->status }}</td>
                                    </tr>
                                @endforeach


                        </table>

                    </div>
                </div>
            </div>
            {{-- /card --}}

        </div>
    </div>
@endsection

@push('scripts')
@endpush
