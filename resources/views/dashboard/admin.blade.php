@extends('layouts.app')

@section('title', 'Admin Overview')

@section('content')
<div class="row g-4">
    <!-- Admin Hero -->
    <div class="col-12">
        <div class="stat-card border-0 text-white shadow-lg animate-fade-in" style="background: linear-gradient(135deg, #0f172a 0%, #2563eb 100%);">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-2">chrgbnb Command Center</h2>
                    <p class="opacity-75 mb-4">Real-time system oversight. Managing <strong>{{ $totalUsers }}</strong> users across <strong>{{ $totalChargers }}</strong> charging points.</p>
                    <div class="d-flex gap-3">
                        <div class="px-3 py-2 bg-white bg-opacity-10 rounded-3 border border-white border-opacity-10">
                            <small class="d-block opacity-75">Network Load</small>
                            <span class="fw-bold">42% (Normal)</span>
                        </div>
                        <div class="px-3 py-2 bg-white bg-opacity-10 rounded-3 border border-white border-opacity-10">
                            <small class="d-block opacity-75">Server Response</small>
                            <span class="fw-bold">84ms</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end d-none d-md-block">
                    <i class="fas fa-shield-halved fa-6x opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Stats -->
    <div class="col-md-3">
        <div class="stat-card h-100 hover-lift">
            <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="text-muted small fw-medium">Network Growth</div>
            <div class="fs-2 fw-bold mt-1">{{ number_format($totalUsers) }}</div>
            <div class="mt-2 text-success small fw-medium">
                <i class="fas fa-arrow-up"></i> {{ $newUsersThisMonth }} <span class="text-muted fw-normal">new users</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card h-100 hover-lift">
            <div class="stat-icon bg-success bg-opacity-10 text-success">
                <i class="fas fa-plug-circle-bolt"></i>
            </div>
            <div class="text-muted small fw-medium">Total Infrastructure</div>
            <div class="fs-2 fw-bold mt-1">{{ $totalChargers }}</div>
            <div class="mt-2 text-muted small fw-medium">
                <span class="text-success fw-bold">{{ $availableChargers }}</span> currently online
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card h-100 hover-lift">
            <div class="stat-icon bg-indigo bg-opacity-10 text-indigo" style="color: #6366f1;">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="text-muted small fw-medium">Booking Velocity</div>
            <div class="fs-2 fw-bold mt-1">{{ number_format($totalBookings) }}</div>
            <div class="mt-2 text-success small fw-medium">
                <i class="fas fa-check-circle"></i> {{ $completedBookings }} <span class="text-muted fw-normal">verified</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card h-100 hover-lift">
            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                <i class="fas fa-money-bill-trend-up"></i>
            </div>
            <div class="text-muted small fw-medium">Monthly GMV</div>
            <div class="fs-2 fw-bold mt-1">₹{{ number_format($systemRevenue, 0) }}</div>
            <div class="mt-2 text-muted small fw-medium">
                Target: ₹10,00,000
            </div>
        </div>
    </div>

    <!-- Charts & Performance -->
    <div class="col-lg-8">
        <div class="stat-card h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">Revenue Overview</h4>
                <div class="dropdown">
                    <button class="btn btn-light btn-sm rounded-pill px-3" type="button">This Month</button>
                </div>
            </div>
            <canvas id="revenueChart" style="max-height: 300px;"></canvas>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="stat-card h-100">
            <h4 class="fw-bold mb-4">System Health</h4>
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-1">
                    <span class="small fw-medium">API Uptime</span>
                    <span class="small text-success fw-bold">99.9%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 99%;"></div>
                </div>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-1">
                    <span class="small fw-medium">Database Load</span>
                    <span class="small text-warning fw-bold">12%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 12%;"></div>
                </div>
            </div>
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-1">
                    <span class="small fw-medium">Storage Usage</span>
                    <span class="small text-primary fw-bold">45%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 45%;"></div>
                </div>
            </div>
            
            <div class="mt-auto pt-4 border-top">
                <h6 class="fw-bold small text-muted text-uppercase mb-3">Live Log</h6>
                <div class="small">
                    <div class="mb-2"><span class="text-muted me-2">14:02:</span> <span class="badge bg-success-subtle text-success me-2">BOOKING</span> User #128 confirmed session</div>
                    <div class="mb-2"><span class="text-muted me-2">13:58:</span> <span class="badge bg-primary-subtle text-primary me-2">NEW HOST</span> Priya K. registered</div>
                    <div><span class="text-muted me-2">13:45:</span> <span class="badge bg-warning-subtle text-warning me-2">SYSTEM</span> Cache cleared successfully</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Hosts Table -->
    <div class="col-12">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">Recent Host registrations</h4>
                <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-4">View All Users</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle border-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 rounded-start">Host Name</th>
                            <th class="border-0">Email</th>
                            <th class="border-0">Registration Date</th>
                            <th class="border-0">Status</th>
                            <th class="border-0 rounded-end text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendingHosts as $host)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-primary bg-opacity-10 text-primary rounded-circle me-3 d-flex align-items-center justify-content-center fw-bold">
                                        {{ substr($host->name, 0, 1) }}
                                    </div>
                                    <span class="fw-bold">{{ $host->name }}</span>
                                </div>
                            </td>
                            <td>{{ $host->email }}</td>
                            <td class="text-muted">{{ $host->created_at->format('M d, Y') }}</td>
                            <td><span class="badge bg-success-subtle text-success rounded-pill px-3">Active Member</span></td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View Details</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Suspend Account</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No recent host registrations found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Revenue (₹)',
                    data: [12000, 19000, 15000, {{ $systemRevenue }}],
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#2563eb',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endpush