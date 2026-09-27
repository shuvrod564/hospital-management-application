<x-doctor-layout>
    <div class="container py-4 bg-light">
        <div class="row g-4">
            
            <div class="col-xl-9 col-lg-8">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold fs-3 text-dark mb-0">Dashboard</h2>
                    <div class="d-flex align-items-center gap-3">
                        <div class="input-group bg-white rounded-pill px-3 py-1 shadow-sm border-0" style="max-width: 350px;">
                            <span class="input-group-text bg-transparent border-0 text-muted"><i data-lucide="search"></i></span>
                            <input type="text" class="form-control bg-transparent border-0 shadow-none" placeholder="Search type of keywords">
                        </div>
                        <button class="btn btn-white bg-white rounded-circle p-2 shadow-sm border-0 position-relative">
                            <i data-lucide="bell" class="text-secondary"></i>
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                        </button>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-3">
                            <div class="card-body d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                                    <i data-lucide="dollar-sign"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1">Earnings</small>
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h3 class="fw-bold text-dark mb-0">$23,425</h3>
                                        <span class="text-success small fw-semibold"><i data-lucide="trending-up" class="d-inline-block me-1 align-middle" style="width:14px;"></i>+ 201</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-3">
                            <div class="card-body d-flex align-items-center gap-3">
                                <div class="bg-warning bg-opacity-10 p-3 rounded-3 text-warning">
                                    <i data-lucide="user-plus"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1">New Patient</small>
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h3 class="fw-bold text-dark mb-0">1,925</h3>
                                        <span class="text-success small fw-semibold"><i data-lucide="trending-up" class="d-inline-block me-1 align-middle" style="width:14px;"></i>+ 201</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-3">
                            <div class="card-body d-flex align-items-center gap-3">
                                <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success">
                                    <i data-lucide="calendar"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1">New Appointment</small>
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h3 class="fw-bold text-dark mb-0">153</h3>
                                        <span class="text-success small fw-semibold"><i data-lucide="trending-up" class="d-inline-block me-1 align-middle" style="width:14px;"></i>+ 201</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-lg-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold text-dark mb-0">Patient List</h4>
                            <select class="form-select form-select-sm border-0 bg-transparent text-muted fw-semibold w-auto shadow-none">
                                <option>Today</option>
                            </select>
                        </div>
                        
                        <div class="d-flex flex-column gap-3">
                            @php
                                $samplePatients = [
                                    ['name' => 'Stacy Mitchell', 'type' => 'Weekly Visit', 'time' => '9:15 AM', 'bg' => 'bg-warning', 'text' => 'SM', 'active' => true],
                                    ['name' => 'Stacy Mitchell', 'type' => 'Weekly Visit', 'time' => '9:15 AM', 'bg' => 'bg-warning', 'text' => 'SM', 'active' => false],
                                    ['name' => 'Amy Dunham', 'type' => 'Routine Checkup', 'time' => '9:30 AM', 'bg' => 'bg-info', 'text' => 'AD', 'active' => false],
                                    ['name' => 'Demi Joan', 'type' => 'Report', 'time' => '9:50 AM', 'bg' => 'bg-success', 'text' => 'DJ', 'active' => false],
                                    ['name' => 'Susan Myers', 'type' => 'Weekly Visit', 'time' => '10:15 AM', 'bg' => 'bg-warning', 'text' => 'SM', 'active' => false],
                                ];
                            @endphp

                            @foreach($samplePatients as $p)
                                <div class="card border-0 shadow-sm rounded-4 p-2 {{ $p['active'] ? 'border-start border-primary border-4' : '' }}">
                                    <div class="card-body d-flex justify-content-between align-items-center p-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="{{ $p['bg'] }} text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 42px; height: 42px; font-size: 0.85rem;">
                                                {{ $p['text'] }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">{{ $p['name'] }}</h6>
                                                <small class="{{ $p['bg'] == 'bg-warning' ? 'text-warning' : ($p['bg'] == 'bg-info' ? 'text-primary' : 'text-success') }} fw-semibold" style="font-size: 0.75rem;">{{ $p['type'] }}</small>
                                            </div>
                                        </div>
                                        <span class="badge rounded-pill px-3 py-2 text-dark bg-opacity-10 {{ $p['bg'] }}" style="font-size: 0.75rem; font-weight: 600;">
                                            {{ $p['time'] }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h4 class="fw-bold text-dark mb-3">Consultation</h4>
                        <div class="card border-0 shadow-sm rounded-4 h-100 p-3" style="border: 1px solid rgba(13, 110, 253, 0.15) !important;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-info bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 50px; height: 50px;">
                                            DW
                                        </div>
                                        <div>
                                            <h5 class="mb-1 fw-bold text-dark">Denzel White</h5>
                                            <small class="text-muted d-block">Male - 28 Years 3 Months</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-link text-muted p-0"><i data-lucide="more-horizontal"></i></button>
                                </div>

                                <div class="d-flex gap-4 mb-4 pb-3 border-bottom border-light">
                                    <div class="text-center">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 mb-2 d-inline-flex">
                                            <i data-lucide="thermometer"></i>
                                        </div>
                                        <small class="d-block text-secondary fw-semibold" style="font-size: 0.75rem;">Fever</small>
                                    </div>
                                    <div class="text-center">
                                        <div class="bg-info bg-opacity-10 text-info rounded-3 p-2 mb-2 d-inline-flex">
                                            <i data-lucide="wind"></i>
                                        </div>
                                        <small class="d-block text-secondary fw-semibold" style="font-size: 0.75rem;">Cough</small>
                                    </div>
                                    <div class="text-center">
                                        <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-2 mb-2 d-inline-flex">
                                            <i data-lucide="activity"></i>
                                        </div>
                                        <small class="d-block text-secondary fw-semibold" style="font-size: 0.75rem;">Heart Burn</small>
                                    </div>
                                </div>

                                <div class="row g-3" style="font-size: 0.85rem;">
                                    <div class="col-sm-3 text-muted fw-semibold">Last Checked</div>
                                    <div class="col-sm-9 text-dark mb-2">
                                        Dr Everly <span class="text-muted">on 21 April 2021 Prescription</span> 
                                        <a href="#" class="text-primary text-decoration-none fw-semibold">#2J983KT0</a>
                                    </div>

                                    <div class="col-sm-3 text-muted fw-semibold">Observation</div>
                                    <div class="col-sm-9 text-dark mb-2">
                                        High fever and cough at normal hemoglobin levels.
                                    </div>

                                    <div class="col-sm-3 text-muted fw-semibold">Prescription</div>
                                    <div class="col-sm-9 text-dark">
                                        Paracetamol - 2 times a day<br>
                                        Dizopam - Day and Night before meal<br>
                                        Wikoryl
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold text-dark mb-0">Booking</h4>
                        <div class="d-flex gap-2">
                            <select class="form-select form-select-sm border-0 bg-white shadow-sm rounded-3 fw-semibold w-auto">
                                <option>May '23</option>
                            </select>
                            <button class="btn btn-primary btn-sm rounded-3 px-3 fw-semibold d-flex align-items-center gap-1">
                                <i data-lucide="plus" style="width: 16px;"></i> New Appointment
                            </button>
                        </div>
                    </div>

                    <div class="btn-group bg-white p-1 rounded-3 shadow-sm mb-3" role="group">
                        <button type="button" class="btn btn-primary btn-sm rounded-3 px-3 shadow-none fw-semibold">Upcoming</button>
                        <button type="button" class="btn btn-light bg-transparent text-muted btn-sm border-0 px-3 fw-semibold">Past</button>
                        <button type="button" class="btn btn-light bg-transparent text-muted btn-sm border-0 px-3 fw-semibold">Cancelled</button>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        @for ($i = 15; $i <= 16; $i++)
                        <div class="card border-0 shadow-sm rounded-4 p-2">
                            <div class="card-body p-2">
                                <div class="row align-items-center g-3">
                                    <div class="col-auto text-center border-end pe-3" style="min-width: 70px;">
                                        <small class="text-uppercase text-muted fw-bold d-block" style="font-size: 0.7rem;">Thu</small>
                                        <h3 class="fw-bold mb-0 text-dark">{{ $i }}</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="d-flex align-items-center gap-2 text-muted small mb-1">
                                            <i data-lucide="clock" style="width: 14px;"></i> 09:00am - 09:30am
                                        </div>
                                        <div class="d-flex align-items-center gap-2 text-dark fw-semibold">
                                            <i data-lucide="user" style="width: 14px;"></i> Stephine Claire
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="text-muted small mb-1">Issue: Fever</div>
                                        <a href="#" class="text-primary text-decoration-underline small fw-semibold">View Documents</a>
                                    </div>
                                    <div class="col text-end">
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm border bg-white rounded-3 dropdown-toggle text-dark small" type="button" data-bs-toggle="dropdown">
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 border-start ps-xl-4 bg-white py-2">
                <div class="text-center py-4 border-bottom mb-4">
                    <div class="position-relative d-inline-block mb-3">
                        <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=150&h=150&q=80" alt="Doctor" class="rounded-circle border border-3 border-light shadow-sm" style="width: 85px; height: 85px; object-fit: cover;">
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Dr. Dilip Anmangandla, MD</h5>
                    <p class="text-muted small mb-0">General Physician</p>
                </div>

                <div class="row g-2 text-center mb-4 pb-3 border-bottom">
                    <div class="col-4">
                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Appointment</small>
                        <h5 class="fw-bold text-dark mb-0" style="font-size: 1.1rem;">4250</h5>
                    </div>
                    <div class="col-4 border-start border-end">
                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Total Patients</small>
                        <h5 class="fw-bold text-dark mb-0" style="font-size: 1.1rem;">32.1k</h5>
                    </div>
                    <div class="col-4">
                        <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Rate</small>
                        <h5 class="fw-bold text-dark mb-0" style="font-size: 1.1rem;">4.8</h5>
                    </div>
                </div>

                <div class="mb-4 pb-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-dark mb-0">Upcoming Appointment</h6>
                        <button class="btn btn-link text-muted p-0"><i data-lucide="more-horizontal" style="width: 18px;"></i></button>
                    </div>
                    <div class="text-primary fw-semibold small mb-3">July 30, 2022</div>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3 position-relative">
                            <div class="text-muted small pt-1" style="font-size: 0.75rem; min-width: 45px;">08:30 am</div>
                            <div class="flex-grow-1 bg-light rounded-3 p-3 position-relative">
                                <h6 class="fw-bold text-dark mb-1" style="font-size: 0.85rem;">Nurse Visit 20</h6>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Dr. Carol D. Pollack-rundle</small>
                            </div>
                        </div>
                        <div class="d-flex gap-3 position-relative">
                            <div class="text-muted small pt-1" style="font-size: 0.75rem; min-width: 45px;">08:30 am</div>
                            <div class="flex-grow-1 bg-light rounded-3 p-3 position-relative">
                                <h6 class="fw-bold text-dark mb-1" style="font-size: 0.85rem;">Annual Visit 15</h6>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Dr. Donald F. Watren</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h6 class="fw-bold text-dark mb-3">Patient Satisfaction</h6>
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="position-relative" style="height: 120px;">
                                <canvas id="satisfactionDonutChart"></canvas>
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <small class="text-muted d-block" style="font-size: 0.65rem; text-transform: uppercase;">Total</small>
                                    <span class="fw-bold text-dark" style="font-size: 0.95rem;">45,251</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column gap-2" style="font-size: 0.8rem;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-inline-block rounded-circle bg-primary" style="width: 8px; height: 8px;"></span>
                                    <span class="text-muted">Excellent</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-inline-block rounded-circle bg-warning" style="width: 8px; height: 8px;"></span>
                                    <span class="text-muted">Good</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-inline-block rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                                    <span class="text-muted">Poor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Satisfaction Ring Metric Chart Implementation Rendering Engine
            const donutCtx = document.getElementById('satisfactionDonutChart').getContext('2d');
            new Chart(donutCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Excellent', 'Good', 'Poor'],
                    datasets: [{
                        data:,
                        backgroundColor: ['#0d6efd', '#ffc107', '#198754'],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '80%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-doctor-layout>