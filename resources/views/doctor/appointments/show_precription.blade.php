<x-doctor-layout>
    <x-slot name="header">
        <div class="row g-3 align-items-center">
            <div class="col-md-4 order-md-2 text-end">
                <button onclick="window.print()" class="btn btn-outline-primary">
                    <i data-lucide="printer" class="me-1"></i> Print Prescription
                </button>
            </div>
            <div class="col-md-8 order-md-1 d-flex align-items-center gap-3">
                <a href="{{ route('doctor.appointments.index') }}" class="btn btn-back rounded-circle">
                    <i data-lucide="arrow-left"></i> 
                </a>
                <h1 class="font-semibold fs-4 text-dark m-0">Prescription Details</h1>  
            </div>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<?php
// echo '<pre>';
// print_r($prescription->appointment->doctor->profile);
// echo '</pre>';
?>
    <div class="container mb-5" id="printableArea">
        <div class="card border shadow-sm">
            <div class="card-body p-5">
                
                <!-- Header: Doctor & Patient Info -->
                <div class="row mb-4 pb-4 border-bottom">
                    <div class="col-md-6">
                        <h4 class="text-primary fw-bold mb-1">
                            {{ $prescription->appointment->doctor->profile?->getMeta('preferred_name') }}. 
                            {{ $prescription->appointment->doctor->profile->first_name }} 
                            {{ $prescription->appointment->doctor->profile->last_name ?? '' }}
                        </h4>
                        <div class="text-muted small">
                            @foreach($prescription->appointment->doctor->profile?->getMeta('degrees', []) as $degree)
                                {{ $degree }} &middot;
                            @endforeach
                            Reg: {{ $prescription->appointment->doctor->profile?->getMeta('registration_number', 'N/A') }}
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <span class="text-muted small">Patient:</span> 
                        <strong>{{ $prescription->appointment->patient->profile->first_name }} {{ $prescription->appointment->patient->profile->last_name ?? '' }}</strong>
                        <br>
                        <span class="text-muted small">Age:</span> {{ $prescription->appointment->patient->profile?->getMeta('age', 'N/A') }} &nbsp;|&nbsp;
                        <span class="text-muted small">Date:</span> {{ $prescription->created_at->format('M d, Y') }}
                    </div>
                </div>

                <!-- Vitals & Clinical Brief -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <span class="text-muted small fw-bold">Vitals:</span> 
                        BP: {{ $prescription->vitals['bp'] ?? 'N/A' }}, 
                        Wt: {{ $prescription->vitals['weight'] ?? 'N/A' }} kg
                    </div>
                    <div class="col-md-8">
                        <span class="text-muted small fw-bold">Chief Complaints:</span> 
                        {{ $prescription->complaints ?? 'None' }}
                    </div>
                </div>

                <div class="mb-4">
                    <span class="text-muted small fw-bold">Diagnosis:</span> 
                    <span class="fw-bold text-dark">{{ $prescription->diagnosis ?? 'Pending' }}</span>
                </div>

                <!-- Medications Table -->
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%" class="text-center fs-5 text-success">℞</th>
                                <th>Medicine Name / Strength</th>
                                <th style="width: 20%">Frequency</th>
                                <th style="width: 15%">Timing</th>
                                <th style="width: 15%">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prescription->medications as $medication)
                                <tr>
                                    <td class="text-center text-success fw-bold">℞</td>
                                    <td class="fw-semibold">{{ $medication['name'] }}</td>
                                    <td>{{ str_replace('-', ' - ', $medication['frequency']) }}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $medication['timing'] ?? 'N/A')) }}</td>
                                    <td>{{ $medication['duration'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Advice, Tests, Follow-up -->
                <div class="row g-4 border-top pt-4">
                    @if($prescription->advice)
                    <div class="col-md-4">
                        <h6 class="text-muted fw-bold mb-2">Advice:</h6>
                        <p class="mb-0" style="white-space: pre-wrap;">{{ $prescription->advice }}</p>
                    </div>
                    @endif

                    @if($prescription->investigations)
                    <div class="col-md-4">
                        <h6 class="text-muted fw-bold mb-2">Suggested Tests:</h6>
                        <p class="mb-0" style="white-space: pre-wrap;">{{ $prescription->investigations }}</p>
                    </div>
                    @endif

                    <div class="col-md-4">
                        <h6 class="text-muted fw-bold mb-2">Next Follow-up:</h6>
                        <p class="mb-0 fs-5 fw-bold text-primary">
                            {{ $prescription->follow_up_date ? \Carbon\Carbon::parse($prescription->follow_up_date)->format('l, M d, Y') : 'Not specified' }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Print Styles -->
    <style>
        @media print {
            /* Hide elements that shouldn't be printed */
            .btn, .alert, nav, #headerArea {
                display: none !important;
            }
            /* Make card take full width and remove shadows for printing */
            .container {
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
            }
            .card {
                border: 1px solid #ddd !important;
                box-shadow: none !important;
            }
        }
    </style>
</x-doctor-layout>