<x-doctor-layout>
    <x-slot name="header">
        <div class="row g-0">
            <div class="col-md-8">
                <h2 class="font-semibold text-xl text-gray-800">My Appointments</h2>
                <p>Manage Your health visits from one place</p> 
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </x-slot>
    <div class="pb-5 container">
        @if(session('success'))
            <div class="alert alert-success d-inline-flex align-items-center gap-3"><i data-lucide="badge-check"></i> {{ session('success') }}</div>
        @endif
        <div class="d-flex flex-row flex-wrap gap-2 mb-4">
            <a href="" class="btn btn-primary">Today</a>
        </div>
        <div class=" d-flex flex-column gap-1">
            <div class="row g-0 row-cols-6 fw-bold fs-6 bg-white p-1 rounded-top-3">
                <div class="p-3"><i data-lucide="user"></i> Patient Name</div>
                <div class="p-3">Date</div>
                <div class="p-3">Time</div>
                <div class="p-3">Reason</div>
                <div class="p-3">Status</div>
                <div class="p-3 text-center">Actions</div>
            </div>
            @foreach($appointments as $appt)
                <div class="row g-0 align-items-center row-cols-lg-6 row-cols-sm-3 row-cols-2 bg-white px-1 fs-6 fw-medium">
                    <div class="px-3 py-1 py-lg-2">{{ $appt->patient->profile->first_name }}</div>
                    <div class="px-3 py-1 py-lg-2">{{ formatDate($appt->appointment_date) }}</div>
                    <div class="px-3 py-1 py-lg-2">{{ format_to_human_time($appt->appointment_time) }}</div>
                    <div class="px-3 py-1 py-lg-2">{{ $appt->reason }}</div>
                    <div class="px-3 py-1 py-lg-2">
                        @if($appt->status === 'confirmed')
                        <span class="badge bg-primary">{{ ucfirst($appt->status) }}</span>
                        @elseif($appt->status === 'completed')
                        <span class="badge bg-success">{{ ucfirst($appt->status) }}</span>
                        @else
                        <span class="badge bg-danger">{{ ucfirst($appt->status) }}</span>
                        @endif
                    </div>
                    <div class="p-3 d-flex justify-content-center justify-content-lg-center gap-2 col-12 col-sm-2">
                        @if($appt->status != 'cancelled')
                        <div class="dropdown">
                            <button class="btn btn-light p-2 rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i data-lucide="circle-ellipsis"></i>
                            </button>
                            <ul class="dropdown-menu p-3">
                                <li>
                                    @if($appt->status == 'pending')
                                        <form action="{{ route('doctor.appointments.updateStatus', $appt->id) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="confirmed">
                                            <button class="btn btn-primary btn-sm">Confirm</button>
                                        </form>
                                        <form action="{{ route('doctor.appointments.updateStatus', $appt->id) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="cancelled">
                                            <button class="btn btn-danger btn-sm">Cancel</button>
                                        </form>
                                    @elseif($appt->status == 'confirmed')
                                        <form action="{{ route('doctor.appointments.updateStatus', $appt->id) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="completed">
                                            <button class="btn btn-info btn-sm"><i data-lucide="clipboard-check"></i></button>
                                        </form>
                                    @else
                                        -
                                    @endif
                                    
                                </li> 
                                <li> 
                                    <a href="{{ route('doctor.appointments.prescription', $appt->id) }}">
                                        <i data-lucide="file-text"></i> <span>Prescription</span>
                                    </a>
                                </li> 
                            </ul>
                        </div>
                        @if($appt->prescriptions->count() > 0)
                            <button class="btn btn-sm btn-outline-primary p-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#rxCollapse{{ $appt->id }}" aria-expanded="false" aria-controls="rxCollapse{{ $appt->id }}">
                                <i data-lucide="file-text" class="me-1"></i> View Rx
                            </button>
                        @endif
                        @endif
                    </div>
                </div>
                <!-- NEW: Collapsible Prescription Details Row -->
                <div class="collapse" id="rxCollapse{{ $appt->id }}">
                    <div class="row g-0 bg-light p-3 mb-2 mx-1 rounded border-start border-4 border-primary shadow-sm">
                        <div class="col-12">
                            @foreach($appt->prescriptions as $rx)
                                <div class="d-flex justify-content-between mb-2">
                                    <h6 class="mb-0 text-dark fw-bold">Diagnosis: {{ $rx->diagnosis ?? 'Pending' }}</h6>
                                    <small class="text-muted">Prescribed on: {{ $rx->created_at->format('M d, Y h:i A') }}</small>
                                </div>
                                
                                <table class="table table-sm table-bordered bg-white mb-2">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Medicine</th>
                                            <th>Dose</th>
                                            <th>Timing</th>
                                            <th>Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rx->medications as $med)
                                            <tr>
                                                <td class="fw-semibold">{{ $med['name'] }}</td>
                                                <td>{{ str_replace('-', ' - ', $med['frequency']) }}</td>
                                                <td>{{ ucwords(str_replace('_', ' ', $med['timing'] ?? 'N/A')) }}</td>
                                                <td>{{ $med['duration'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @if($rx->advice || $rx->investigations)
                                <div class="row small text-muted mt-1">
                                    @if($rx->advice)
                                    <div class="col-md-6">
                                        <strong>Advice:</strong> {{ $rx->advice }}
                                    </div>
                                    @endif
                                    @if($rx->investigations)
                                    <div class="col-md-6">
                                        <strong>Tests:</strong> {{ $rx->investigations }}
                                    </div>
                                    @endif
                                </div>
                                @endif

                                <!-- Optional: Link to full printable page -->
                                <div class="text-end mt-2">
                                    <a href="{{ route('doctor.prescriptions.show', $rx->id) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i data-lucide="external-link"></i> View Full / Print
                                    </a>
                                </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        
            @if($appointments->count()==0) 
                <div class="p-5 bg-white text-center">
                    No appointments are available!
                </div>
            @endif
        </div> 
    </div>
</x-doctor-layout>