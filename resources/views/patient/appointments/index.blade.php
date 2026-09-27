<x-patient-layout>
    <x-slot name="header">
        <div class="row g-0 align-items-center">
            <div class="col-md-8">
                <h2 class="font-semibold text-xl text-dark">My Appointments</h2>
                <p>Manage Your health visits from one place</p> 
            </div>
            <div class="col-md-4 text-end"> 
                <a href="{{ route('user.appointments.create') }}" class="btn btn-primary fw-semibold text-uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                    Book New Appointment
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-5 container">
<?php
// echo '<pre>';
// print_r($prescriptions);
// echo '</pre>';
?>
        @if(session('success'))
            <div class="alert alert-success d-inline-flex align-items-center gap-3 ms-auto"><i data-lucide="badge-check"></i> {{ session('success') }}</div>
        @endif
        <div class="d-flex flex-row flex-wrap gap-2 mb-4">
            <a href="" class="btn btn-primary">Today</a>
        </div>
        <div class=" d-flex flex-column gap-1">
            <div class="row g-0 row-cols-6 fw-bold fs-6 bg-white p-1 rounded-top-3">
                <div class="p-3">doctor Name</div>
                <div class="p-3">Date</div>
                <div class="p-3">Time</div>
                <div class="p-3">Reason</div>
                <div class="p-3">Status</div>
                <div class="p-3">Actions</div>
            </div>
            @foreach($appointments as $appt)
            <!-- Main Appointment Row -->
            <div class="row g-0 row-cols-6 bg-white p-1 fs-6 fw-medium border-bottom align-items-center">
                <div class="p-3">
                    {{ $appt->doctor->profile?->first_name ?? '' }} {{ $appt->doctor->profile->last_name ?? '' }}
                </div>
                <div class="p-3">{{ $appt->appointment_date }}</div>
                <div class="p-3">{{ format_to_human_time($appt->appointment_time) }}</div>
                <div class="p-3 text-truncate" style="max-width: 150px;" title="{{ $appt->reason }}">{{ $appt->reason }}</div>
                <div class="p-3">
                    @if($appt->status === 'confirmed')
                        <span class="badge bg-success">{{ ucfirst($appt->status) }}</span>
                    @elseif($appt->status === 'completed')
                        <span class="badge bg-info text-white">{{ ucfirst($appt->status) }}</span>
                    @else
                        <span class="badge bg-danger">{{ ucfirst($appt->status) }}</span>
                    @endif
                </div>
                <div class="p-3 space-x-2 d-flex justify-content-end gap-2">  
                    <div class="dropdown">
                        <button class="btn p-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i data-lucide="circle-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu p-3">
                            <li>
                                @if($appt->status == 'pending')
                                    <form action="{{ route('doctor.appointments.updateStatus', $appt->id) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="confirmed">
                                        <button class="btn btn-success btn-sm w-100 mb-1">Confirm</button>
                                    </form>
                                    <form action="{{ route('doctor.appointments.updateStatus', $appt->id) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="cancelled">
                                        <button class="btn btn-danger btn-sm w-100">Cancel</button>
                                    </form>
                                @elseif($appt->status == 'confirmed')
                                    <form action="{{ route('doctor.appointments.updateStatus', $appt->id) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="completed">
                                        <button class="btn btn-info btn-sm text-white w-100">Mark Completed</button>
                                    </form>
                                    
                                    <!-- Add Prescribe button here too if it doesn't have one yet -->
                                    @if($appt->prescriptions->count() == 0)
                                        <a href="" class="btn btn-primary btn-sm w-100 mt-1">
                                            <i data-lucide="plus"></i> No Prescribe
                                        </a>
                                    @endif
                                @else
                                    <span class="text-muted small px-2">No actions available</span>
                                @endif
                            </li> 
                        </ul>
                    </div>
                    <!-- NEW: Prescription Toggle Button (Only shows if prescription exists) -->
                    @if($appt->prescriptions->count() > 0)
                        <button class="btn btn-sm btn-outline-primary p-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#rxCollapse{{ $appt->id }}" aria-expanded="false" aria-controls="rxCollapse{{ $appt->id }}">
                            <i data-lucide="file-text" class="me-1"></i> View Rx
                        </button>
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

 
        </div> 
    </div>
</x-patient-layout>