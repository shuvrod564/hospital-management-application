<x-patient-layout>
    <x-slot name="header">
        <div class="row g-0">
            <div class="col-md-8">
                <h1 class="font-semibold fs-4 text-dark">My Profile</h1> 
                <p>Manage Your health visits from one place</p> 
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('user.profile.manage') }}" class="btn btn-primary">
                    <i class="bi bi-pencil-square me-1"></i>
                    <span>Manage Profile</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4 col-xxl-3"> 
                @if($profile->avatar)
                    <img src="{{ asset('storage/'.$profile->avatar) }}" alt="{{ $profile->first_name }}" class="img-fluid rounded shadow-sm">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center shadow-sm" style="height: 250px;">
                        <i class="bi bi-person-fill text-secondary" style="font-size: 8rem;"></i>
                    </div>
                @endif
                
            </div><!--end::col--> 
            
            <div class="col-lg-8 col-xxl-9">
                
                <!-- 1. Basic Information -->
                <div class="card p-4 bg-white border-0 mb-4">
                    <h2 class="fs-4 text-dark fw-bold mb-4">{{ $profile->first_name }} {{ $profile->last_name ?? '' }}</h2>

                    <div class="row g-2 text-dark fw-bold">
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">DOB</div>
                                <div class="flex-grow-1">{{ $profile->date_of_birth ? \Carbon\Carbon::parse($profile->date_of_birth)->format('M d, Y') : 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Gender</div>
                                <div class="flex-grow-1">{{ ucfirst($profile->gender ?? 'N/A') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Age</div>
                                <div class="flex-grow-1">{{ $profile->meta['age'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Phone</div>
                                <div class="flex-grow-1">{{ $profile->phone ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Email</div>
                                <div class="flex-grow-1">{{ $profile->meta['email'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Address</div>
                                <div class="flex-grow-1">{{ $profile->address ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Emergency Contact Information -->
                <div class="card p-4 bg-white border-0 mb-4">
                    <h2 class="fs-6 text-dark fw-bold mb-4">Emergency Contact Information</h2>
                    <div class="row g-2 text-dark fw-bold">
                        <div class="col-md-4">
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Contact Name</div>
                                <div class="flex-grow-1">{{ $profile->meta['emergency_name'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Relationship</div>
                                <div class="flex-grow-1">{{ $profile->meta['emergency_relationship'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Contact Number</div>
                                <div class="flex-grow-1">{{ $profile->meta['emergency_phone'] ?? 'N/A' }}</div>
                            </div>
                        </div> 
                    </div>
                </div>

                <!-- 3. Insurance & Billing Information -->
                <div class="card p-4 bg-white border-0 mb-4 text-dark fw-bold"> 
                    <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-2">
                        <i data-lucide="credit-card"></i> Insurance & Billing Information
                    </h2>
                    <div class="row g-3">
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Insurance Provider</div>
                                <div class="flex-grow-1">{{ $profile->meta['insurance_provider'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Policy Number</div>
                                <div class="flex-grow-1">{{ $profile->meta['policy_number'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Group Number</div>
                                <div class="flex-grow-1">{{ $profile->meta['group_number'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Subscriber Name</div>
                                <div class="flex-grow-1">{{ $profile->meta['subscriber_name'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Billing Status</div>
                                <div class="flex-grow-1">{{ $profile->meta['billing_status'] ?? 'N/A' }}</div>
                            </div>
                        </div> 
                    </div> 
                </div>

                <!-- 4. Clinical & Medical History -->
                <div class="card p-4 bg-white border-0 mb-4 text-dark fw-bold"> 
                    <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-2">
                        <i data-lucide="heart-pulse"></i> Clinical & Medical History
                    </h2>
                    <div class="row g-3">
                        <div class="col-12"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Primary Care Physician (PCP)</div>
                                <div class="flex-grow-1">{{ $profile->meta['pcp_name'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Allergies</div>
                                <div class="flex-grow-1" style="white-space: pre-wrap;">{{-- $profile->meta['allergies'] ?? 'None listed' --}}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Chronic Conditions</div>
                                <div class="flex-grow-1" style="white-space: pre-wrap;">{{ $profile->meta['chronic_conditions'] ?? 'None listed' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Current Medications</div>
                                <div class="flex-grow-1" style="white-space: pre-wrap;">{{ $profile->meta['current_medications'] ?? 'None listed' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Past Surgeries</div>
                                <div class="flex-grow-1" style="white-space: pre-wrap;">{{ $profile->meta['past_surgeries'] ?? 'None listed' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Family Medical History</div>
                                <div class="flex-grow-1" style="white-space: pre-wrap;">{{ $profile->meta['family_history'] ?? 'None listed' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Social History</div>
                                <div class="flex-grow-1" style="white-space: pre-wrap;">{{ $profile->meta['social_history'] ?? 'None listed' }}</div>
                            </div>
                        </div>
                    </div> 
                </div>

                <!-- 5. Document Vault & Preferences -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="card p-4 bg-white border-0 h-100 text-dark fw-bold"> 
                            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-2">
                                <i data-lucide="file-text"></i> Uploaded Medical Reports
                            </h2>
                            @if(!empty($profile->meta['medical_reports']))
                                <ul class="list-unstyled mb-0">
                                    @foreach($profile->meta['medical_reports'] as $filePath)
                                        <li class="mb-2">
                                            <a href="{{ Storage::url($filePath) }}" target="_blank" class="text-primary text-decoration-none">
                                                <i class="bi bi-file-earmark-pdf me-1"></i> {{ basename($filePath) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted mb-0 small">No medical reports uploaded yet.</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card p-4 bg-white border-0 h-100 text-dark fw-bold"> 
                            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-2">
                                <i data-lucide="settings"></i> Preferences
                            </h2>
                            <div class="d-flex flex-column mb-2">
                                <div class="flex-shrink-0 info__label">Notifications</div>
                                <div class="flex-grow-1">
                                    @if(!empty($profile->meta['notifications']))
                                        {{ implode(', ', $profile->meta['notifications']) }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Preferred Language</div>
                                <div class="flex-grow-1">{{ strtoupper($profile->meta['preferred_language'] ?? 'N/A') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!--end::row-->
    </div>
    
    <style>
        .info__label { 
            font-weight: 500; 
            min-width: 7rem; 
            font-size: .875rem; 
            color: #6b7280; /* Muted text for labels */
        }
    </style>
</x-patient-layout>