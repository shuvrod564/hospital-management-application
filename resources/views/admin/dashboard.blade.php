<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

<div class="main-container">
    <header class="mb-4">
        <h2 class="fw-bold text-navy mb-1">Clinical Overview</h2>
        <p class="text-muted-custom mb-0">Real-time facility performance and patient flow analysis.</p>
    </header>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="icon-box icon-blue">
                        <i class="bi bi-people fs-5"></i>
                    </div>
                    <span class="badge badge-positive">+12%</span>
                </div>
                <p class="stat-label">Active Patients</p>
                <div class="stat-value">1,284</div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="icon-box icon-indigo">
                        <i class="bi bi-calendar3 fs-5"></i>
                    </div>
                    <span class="badge badge-negative">-4%</span>
                </div>
                <p class="stat-label">Appointments Today</p>
                <div class="stat-value">42</div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="icon-box icon-teal">
                        <i class="bi bi-activity fs-5"></i>
                    </div>
                    <span class="badge badge-positive">+18%</span>
                </div>
                <p class="stat-label">Vitals Monitored</p>
                <div class="stat-value">3,842</div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="icon-box icon-red">
                        <i class="bi bi-exclamation-triangle fs-5"></i>
                    </div>
                    <span class="badge badge-stable">Stable</span>
                </div>
                <p class="stat-label">Critical Alerts</p>
                <div class="stat-value">3</div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-7 col-xl-8">
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h4 class="fw-bold text-navy mb-1">Recent Appointments</h4>
                        <p class="text-muted-custom mb-0 small">Live feed of patient arrivals and check-ins.</p>
                    </div>
                    <i class="bi bi-graph-up-arrow text-muted-custom fs-5"></i>
                </div>

                <div class="appointment-row">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-circle">A</div>
                        <div>
                            <div class="fw-bold text-dark">Patient Registry #1001</div>
                            <div class="text-muted-custom small mt-1"><i class="bi bi-clock me-1"></i>Check-in: 09:15 AM</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge badge-scheduled">Scheduled</span>
                        <a href="#" class="btn-link-custom">View File</a>
                    </div>
                </div>

                <div class="appointment-row">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-circle">B</div>
                        <div>
                            <div class="fw-bold text-dark">Patient Registry #1002</div>
                            <div class="text-muted-custom small mt-1"><i class="bi bi-clock me-1"></i>Check-in: 09:15 AM</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge badge-scheduled">Scheduled</span>
                        <a href="#" class="btn-link-custom">View File</a>
                    </div>
                </div>

                <div class="appointment-row">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-circle">C</div>
                        <div>
                            <div class="fw-bold text-dark">Patient Registry #1003</div>
                            <div class="text-muted-custom small mt-1"><i class="bi bi-clock me-1"></i>Check-in: 09:15 AM</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge badge-scheduled">Scheduled</span>
                        <a href="#" class="btn-link-custom">View File</a>
                    </div>
                </div>

                <div class="appointment-row mb-0">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-circle">D</div>
                        <div>
                            <div class="fw-bold text-dark">Patient Registry #1004</div>
                            <div class="text-muted-custom small mt-1"><i class="bi bi-clock me-1"></i>Check-in: 09:15 AM</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge badge-scheduled">Scheduled</span>
                        <a href="#" class="btn-link-custom">View File</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 col-xl-4">
            <div class="content-card">
                <div class="mb-4">
                    <h4 class="fw-bold text-navy mb-1">Resource Allocation</h4>
                    <p class="text-muted-custom mb-0 small">Departmental load statistics.</p>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="progress-label">Outpatient (OPD)</span>
                        <span class="progress-val">85%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-opd" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="progress-label">Emergency (ER)</span>
                        <span class="progress-val">92%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-er" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="progress-label">Pharmacy</span>
                        <span class="progress-val">45%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-pharmacy" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="progress-label">Radiology</span>
                        <span class="progress-val">30%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-radiology" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
