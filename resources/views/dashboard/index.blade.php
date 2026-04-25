@extends('layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb bg-light py-2 mb-3 rounded-lg shadow-sm">
            <div class="row">
                <div class="col-12">
                    <h5 class="page-title text-primary fw-bold mb-2">
                        <i class="mdi mdi-view-dashboard me-2"></i>Admin Dashboard
                    </h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0" style="font-size: 0.85rem;">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            {{-- ======================== --}}
            {{-- STATS CARDS              --}}
            {{-- ======================== --}}
            <div class="row mb-3">

                {{-- Total Products --}}
                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                    <div class="card border-0 shadow-sm h-100 bg-white rounded-2 overflow-hidden">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-muted text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Products</h6>
                                    <h3 class="text-primary fw-bold mb-0">{{ $totalProducts }}</h3>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-2 rounded-2">
                                    <i class="mdi mdi-package-variant text-primary" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-primary bg-opacity-5 px-3 py-1 text-center">
                            <small class="text-primary fw-semibold" style="font-size: 0.75rem;">Managed Inventory</small>
                        </div>
                    </div>
                </div>

                {{-- Total Staff --}}
                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                    <div class="card border-0 shadow-sm h-100 bg-white rounded-2 overflow-hidden">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-muted text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Staff</h6>
                                    <h3 class="text-success fw-bold mb-0">{{ $totalStaff }}</h3>
                                </div>
                                <div class="bg-success bg-opacity-10 p-2 rounded-2">
                                    <i class="mdi mdi-account-multiple text-success" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-success bg-opacity-5 px-3 py-1 text-center">
                            <small class="text-success fw-semibold" style="font-size: 0.75rem;">Active Members</small>
                        </div>
                    </div>
                </div>

                {{-- Total Stores --}}
                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                    <div class="card border-0 shadow-sm h-100 bg-white rounded-2 overflow-hidden">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-muted text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Stores</h6>
                                    <h3 class="text-danger fw-bold mb-0">{{ $totalStores }}</h3>
                                </div>
                                <div class="bg-danger bg-opacity-10 p-2 rounded-2">
                                    <i class="mdi mdi-store text-danger" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-danger bg-opacity-5 px-3 py-1 text-center">
                            <small class="text-danger fw-semibold" style="font-size: 0.75rem;">Operating Locations</small>
                        </div>
                    </div>
                </div>

            </div>
            {{-- END STATS CARDS --}}

            {{-- ======================== --}}
            {{-- STORE WISE SALES         --}}
            {{-- ======================== --}}
            <!--<div class="mb-3">-->
            <!--    <h5 class="fw-bold text-dark mb-2" style="font-size: 0.95rem;">-->
            <!--        <i class="mdi mdi-storefront me-2 text-info"></i>Store Wise Sales-->
            <!--    </h5>-->

            <!--    <div class="row">-->
            <!--        @forelse($storeSales as $store)-->
            <!--            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">-->
            <!--                <div class="card border-0 shadow-sm h-100 bg-white rounded-2 overflow-hidden">-->
            <!--                    <div class="card-body p-3">-->
            <!--                        <div class="d-flex justify-content-between align-items-start mb-2">-->
            <!--                            <div>-->
            <!--                                <h6 class="card-title text-dark fw-bold mb-0" style="font-size: 0.9rem;">{{ $store->name }}</h6>-->
            <!--                                <small class="text-muted d-block" style="font-size: 0.75rem;">Store Location</small>-->
            <!--                            </div>-->
            <!--                            <span class="badge bg-info bg-opacity-10 text-info fw-semibold" style="font-size: 0.7rem;">Active</span>-->
            <!--                        </div>-->
                                    
            <!--                        <div class="bg-light p-2 rounded-2 mb-2">-->
            <!--                            <small class="text-muted d-block text-uppercase fw-semibold mb-1" style="font-size: 0.7rem;">Total Sales</small>-->
            <!--                            <h4 class="text-primary fw-bold mb-0" style="font-size: 1.1rem;">₹ {{ number_format($store->total, 2) }}</h4>-->
            <!--                        </div>-->
                                    
            <!--                        <div class="bg-success bg-opacity-10 p-2 rounded-2 text-center">-->
            <!--                            <small class="text-success fw-semibold" style="font-size: 0.75rem;">-->
            <!--                                <i class="mdi mdi-calendar-today"></i>-->
            <!--                                Today: ₹ {{ number_format(optional($todaySales->get($store->id ?? 0))->total ?? 0, 2) }}-->
            <!--                            </small>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        @empty-->
            <!--            <div class="col-12">-->
            <!--                <div class="alert alert-info border-0 rounded-2 shadow-sm mb-0" style="font-size: 0.9rem;">-->
            <!--                    <i class="mdi mdi-information me-2"></i>No store sales data found.-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        @endforelse-->
            <!--    </div>-->
            <!--</div>-->
            {{-- END STORE WISE SALES --}}


            {{-- ======================== --}}
            {{-- SALES CHART              --}}
            {{-- ======================== --}}
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title fw-bold text-dark mb-0" style="font-size: 0.95rem;">
                                    <i class="mdi mdi-chart-bar me-2 text-primary"></i>Store Wise Sales Chart
                                </h5>
                                <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold" style="font-size: 0.7rem;">Real-time</span>
                            </div>
                            <div class="bg-light p-2 rounded-2">
                                <canvas id="salesChart" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END CHART --}}


            {{-- ======================== --}}
            {{-- LOW STOCK ALERTS         --}}
            {{-- ======================== --}}
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden">
                        <div class="card-body p-3">

                            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                                <h5 class="card-title mb-0 fw-bold text-dark" style="font-size: 0.95rem;">
                                    <i class="mdi mdi-alert-circle me-2 text-warning"></i> Low Stock Alerts
                                </h5>
                                <a href="{{ route('products.exportCsv') }}" class="btn btn-sm btn-success shadow-sm rounded-2" style="font-size: 0.85rem; padding: 0.4rem 0.8rem;">
                                    <i class="mdi mdi-file-excel me-1"></i> Export CSV
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover mb-0" style="font-size: 0.85rem;">
                                    <thead class="bg-light">
                                        <tr class="border-bottom">
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">#</th>
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">Product</th>
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">Store</th>
                                            <th class="fw-bold text-dark py-2" style="font-size: 0.8rem;">Stock Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($lowStock as $index => $item)
                                            <tr class="align-middle border-bottom">
                                                <td class="py-2">
                                                    <span class="badge bg-secondary bg-opacity-20 text-dark fw-bold" style="font-size: 0.7rem;">{{ $index + 1 }}</span>
                                                </td>
                                                <td class="fw-semibold text-dark py-2">{{ $item->name }}</td>
                                                <td class="text-muted py-2">{{ $item->store_name }}</td>
                                                <td class="py-2">
                                                    @if ($item->stock == 0)
                                                        <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold px-2 py-1" style="font-size: 0.7rem;">
                                                            <i class="mdi mdi-close-circle me-1"></i>Out of Stock
                                                        </span>
                                                    @else
                                                        <span class="badge bg-warning bg-opacity-10 text-warning fw-semibold px-2 py-1" style="font-size: 0.7rem;">
                                                            <i class="mdi mdi-alert-outline me-1"></i>Low ({{ $item->stock }})
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="4" class="py-4">
                                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                                        <i class="mdi mdi-check-circle text-success" style="font-size: 36px; opacity: 0.3;"></i>
                                                        <p class="text-muted fw-semibold mt-2 mb-0" style="font-size: 0.9rem;">All products are well stocked!</p>
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
            {{-- END LOW STOCK --}}

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartLabels = @json($chartLabels);
        const chartTotals = @json($chartTotals);

        new Chart(document.getElementById('salesChart'), {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Total Sales (₹)',
                    data: chartTotals,
                    backgroundColor: 'rgba(41, 98, 255, 0.8)',
                    borderColor: '#2962FF',
                    borderWidth: 2,
                    borderRadius: 6,
                    borderSkipped: false,
                    fill: true,
                    barThickness: 35
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: { weight: 'bold', size: 11 },
                            color: '#333',
                            boxWidth: 12,
                            padding: 10
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 10,
                        titleFont: { size: 12, weight: 'bold' },
                        bodyFont: { size: 11 },
                        borderColor: '#2962FF',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return '₹ ' + Number(context.raw).toLocaleString('en-IN', {
                                    minimumFractionDigits: 2
                                });
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            font: { size: 10 },
                            color: '#666',
                            callback: function(value) {
                                return '₹ ' + value.toLocaleString('en-IN');
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            font: { size: 10, weight: '500' },
                            color: '#333'
                        }
                    }
                }
            }
        });
    </script>
@endpush
