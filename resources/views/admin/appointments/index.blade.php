<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>


    <main class="container-fluid px-4 py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="text-muted mb-0 small fw-medium">Comprehensive clinical records management.</p>
        </div>
    </div>

    <div class="d-flex gap-2 mb-4">
        <div class="position-relative flex-grow-1" style="max-width: 300px;">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
            <input type="text" class="form-control ps-5 bg-white border-light-subtle rounded-3 py-2 text-muted small" placeholder="Search patients by name, ID or phone...">
        </div>
        <button class="btn btn-white bg-white border-light-subtle rounded-3 px-3 py-2 d-flex align-items-center gap-2 text-dark font-monospace small">
            <i class="bi bi-sliders"></i> Filters
        </button>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appt)
                        <tr class="border-b">
                            <td class="p-3">{{ $appt->patient->name }}</td>
                            <td class="p-3">{{ $appt->doctor->name }}</td>
                            <td class="p-3">{{ $appt->appointment_date }}</td>
                            <td class="p-3">{{ $appt->appointment_time }}</td>
                            <td class="p-3">{{ ucfirst($appt->status) }}</td>
                            <td class="p-3">
                                <form action="{{ route('admin.appointments.destroy', $appt->id) }}" method="POST" onsubmit="return confirm('Delete this appointment?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>

            {{ $appointments->links() }}
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3 mb-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table align-middle mb-0" style="--bs-table-bg: transparent;">
                <thead>
                    <tr class="text-muted small border-bottom" style="font-size: 0.85rem; background-color: #ffffff;">
                        <th class="ps-4 py-3 fw-semibold">Patient Name</th>
                        <th class="py-3 fw-semibold">Demographics</th>
                        <th class="py-3 fw-semibold">Last Clinical Activity</th>
                        <th class="py-3 fw-semibold">Urgency Status</th>
                        <th class="pe-4 py-3 fw-semibold">Quick Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr class="border-bottom">
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-primary-emphasis bg-primary-subtle" style="width: 40px; height: 40px; font-size: 0.85rem; letter-spacing: 0.5px;">JD</div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">John Doe</div>
                                    <div class="text-muted small" style="font-size: 0.75rem;">ID: AEGIS-1001</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 text-secondary small">45Y &bull; Male</td>
                        <td class="py-3 text-secondary small"><i class="bi bi-clock me-1 text-muted"></i> 2023-10-15</td>
                        <td class="py-3"><span class="badge rounded-pill px-3 py-1.5 bg-primary bg-opacity-75" style="font-size: 0.75rem; font-weight: 600;">Active</span></td>
                        <td class="pe-4 py-3"></td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-primary-emphasis bg-primary-subtle" style="width: 40px; height: 40px; font-size: 0.85rem; letter-spacing: 0.5px;">JS</div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Jane Smith</div>
                                    <div class="text-muted small" style="font-size: 0.75rem;">ID: AEGIS-2002</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 text-secondary small">32Y &bull; Female</td>
                        <td class="py-3 text-secondary small"><i class="bi bi-clock me-1 text-muted"></i> 2023-10-22</td>
                        <td class="py-3"><span class="badge rounded-pill px-3 py-1.5 bg-danger bg-opacity-75" style="font-size: 0.75rem; font-weight: 600;">Critical</span></td>
                        <td class="pe-4 py-3"></td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-primary-emphasis bg-primary-subtle" style="width: 40px; height: 40px; font-size: 0.85rem; letter-spacing: 0.5px;">MB</div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Michael Brown</div>
                                    <div class="text-muted small" style="font-size: 0.75rem;">ID: AEGIS-3003</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 text-secondary small">28Y &bull; Male</td>
                        <td class="py-3 text-secondary small"><i class="bi bi-clock me-1 text-muted"></i> 2023-11-01</td>
                        <td class="py-3"><span class="badge rounded-pill px-3 py-1.5 bg-secondary bg-opacity-25 text-secondary-emphasis" style="font-size: 0.75rem; font-weight: 600;">Stable</span></td>
                        <td class="pe-4 py-3"></td>
                    </tr>
                    <tr class="border-bottom-0">
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-primary-emphasis bg-primary-subtle" style="width: 40px; height: 40px; font-size: 0.85rem; letter-spacing: 0.5px;">AW</div>
                                <div>
                                    <div class="fw-bold text-dark mb-0" style="font-size: 0.95rem;">Alice Wilson</div>
                                    <div class="text-muted small" style="font-size: 0.75rem;">ID: AEGIS-4004</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 text-secondary small">54Y &bull; Female</td>
                        <td class="py-3 text-secondary small"><i class="bi bi-clock me-1 text-muted"></i> 2023-11-05</td>
                        <td class="py-3"><span class="badge rounded-pill px-3 py-1.5 bg-primary bg-opacity-10 text-primary-emphasis" style="font-size: 0.75rem; font-weight: 600;">Discharged</span></td>
                        <td class="pe-4 py-3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-6">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
                <div class="mb-4">
                    <h5 class="fw-bold text-dark mb-1" style="font-size: 1.15rem;">Vital Signs Tracking</h5>
                    <p class="text-muted mb-0 small">Real-time telemetry and monitoring.</p>
                </div>
                
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background-color: #f8fafc;">
                            <span class="text-muted fw-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">BLOOD PRESSURE</span>
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="fw-bold text-dark" style="font-size: 1.45rem;">120/80</span>
                                <span class="text-muted small" style="font-size: 0.8rem;">mmHg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background-color: #f8fafc;">
                            <span class="text-muted fw-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">SPO2</span>
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="fw-bold text-dark" style="font-size: 1.45rem;">98</span>
                                <span class="text-muted small" style="font-size: 0.8rem;">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background-color: #f8fafc;">
                            <span class="text-muted fw-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">TEMPERATURE</span>
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="fw-bold text-dark" style="font-size: 1.45rem;">36.8</span>
                                <span class="text-muted small" style="font-size: 0.8rem;">&deg;C</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background-color: #f8fafc;">
                            <span class="text-muted fw-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">HEART RATE</span>
                            <div class="d-flex align-items-baseline gap-1">
                                <span class="fw-bold text-dark" style="font-size: 1.45rem;">72</span>
                                <span class="text-muted small" style="font-size: 0.8rem;">bpm</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 pt-2">
                    <a href="#" class="text-primary text-decoration-none fw-semibold small d-inline-flex align-items-center gap-1">
                        Open Monitoring Panel &rarr;
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                <div class="mb-3">
                    <h5 class="fw-bold text-dark mb-1" style="font-size: 1.15rem;">Clinical Notes</h5>
                    <p class="text-muted mb-0 small">Rapid documentation entry.</p>
                </div>
                
                <div class="flex-grow-1 my-2">
                    <textarea class="form-control border-0 p-3 rounded-3 h-100 min-vh-25 small" style="background-color: #f8fafc; resize: none; color: #6b7280;" placeholder="Start typing clinical assessment..."></textarea>
                </div>
                
                <div class="d-flex justify-content-end pt-2">
                    <button class="btn text-white px-4 py-2 fw-semibold rounded-3 small" style="background-color: #2b4c7e; font-size: 0.9rem;">Save Session</button>
                </div>
            </div>
        </div>
    </div>
</main>
</x-admin-layout>