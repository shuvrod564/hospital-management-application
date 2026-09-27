<x-doctor-layout>
    <x-slot name="header">
        <div class="row g-0">
            <div class="col-md-8">
                <h1 class="font-semibold fs-4 text-dark">My Profile</h1> 
                <p>Manage Your health visits from one place</p> 
            </div>
            <div class="col-md-4">
                <a href="{{ route('doctor.profile.manage') }}" class="btn btn-primary">
                    <i></i>
                    <span>Manage Profile</span>
                </a>
            </div>
        </div>
    </x-slot>
 
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4 col-xxl-3"> 
                @if($profile->avatar)
                <img src="{{ asset('storage/'.$profile->avatar) }}" alt="{{ $profile->first_name }}" class="img-fluid">
                @endif
                
            </div><!--end::col--> 
            <div class="col-lg-8 col-xxl-9">
                <div class="card p-4 bg-white border-0 mb-4">
                    <h2 class="fs-4 text-dark fw-bold mb-4"> {{ $profile->first_name }} {{ $profile->last_name }}</h2>

                    <div class="row g-2 text-dark fw-bold">
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">DOB</div>
                                <div class="flex-grow-1">{{ $profile->date_of_birth }}</div>
                            </div>
                        </div><!--end::col-->
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Gender</div>
                                <div class="flex-grow-1">{{ $profile->gender }}</div>
                            </div>
                        </div><!--end::col-->
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Gender</div>
                                <div class="flex-grow-1">{{ $profile->gender }}</div>
                            </div>
                        </div><!--end::col-->
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Age</div>
                                <div class="flex-grow-1">{{ $profile->age }}</div>
                            </div>
                        </div><!--end::col-->
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Phone</div>
                                <div class="flex-grow-1">{{ $profile->phone }}</div>
                            </div>
                        </div><!--end::col-->
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Email</div>
                                <div class="flex-grow-1">{{ $doctor_email ?? ''}}</div>
                            </div>
                        </div><!--end::col-->
                        <div class="col-12">
                            <div class="d-flex flex-row">
                                <div class="flex-shrink-0 info__label">Address</div>
                                <div class="flex-grow-1">{{ $profile->address }}</div>
                            </div>
                        </div><!--end::col-->
                    </div><!--end::row-->
                </div><!--end::card-->

                <div class="card p-4 bg-white border-0 mb-4">
                    <h2 class="fs-6 text-dark fw-bold mb-4">
                        Emergency Contact Information
                    </h2>

                    <div class="row g-2 text-dark fw-bold">
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Contact Name</div>
                                <div class="flex-grow-1">{{ $profile->meta['emergency_name'] ?? 'N/A' }}</div>
                            </div>
                        </div><!--end::col-->
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Relationship to Patient</div>
                                <div class="flex-grow-1">{{ $profile->meta['emergency_relationship'] ?? 'N/A' }}</div>
                            </div>
                        </div><!--end::col-->
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Contact Number</div>
                                <div class="flex-grow-1">{{ $profile->meta['emergency_phone'] ?? 'N/A' }}</div>
                            </div>
                        </div><!--end::col--> 
                    </div><!--end::row-->
                </div><!--end::card-->

                <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3 mt-4">
                    <i data-lucide="award"></i>
                    2. Specialties
                </h2>
                <div class="card p-4 bg-white border-0 mb-4 text-dark fw-bold"> 
                    <div class="row g-3">
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Primary medical field</div>
                                <div class="flex-grow-1">{{ $profile->meta['pediatric_cardiology_fields'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Specific Focus Area</div>
                                <div class="flex-grow-1">{{ $profile->meta['pediatric_focus_areas'] ?? 'N/A' }}</div>
                            </div>
                        </div> 
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Degree</div>
                                <div class="flex-grow-1">
                                    @foreach($profile->meta['degrees'] as $item)
                                    {{ $item }},
                                    @endforeach
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Board Certifications</div>
                                <div class="flex-grow-1"> 
                                    {{ $profile->meta['board_certifications'] ?? 'N/A' }} 
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Medical Council Registration Number</div>
                                <div class="flex-grow-1"> 
                                    {{ $profile->meta['registration_number'] ?? 'N/A' }} 
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Years in Practice</div>
                                <div class="flex-grow-1"> 
                                    {{ $profile->meta['years_in_practice'] ?? 'N/A' }} 
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Past Internships</div>
                                <div class="flex-grow-1"> 
                                    {{ $profile->meta['past_internships'] ?? 'N/A' }} 
                                </div>
                            </div>
                        </div> 
                        <div class="col-12"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Historical Affiliations with Clinics or Hospitals</div>
                                <div class="flex-grow-1"> 
                                    {{ $profile->meta['historical_affiliations'] ?? 'N/A' }} 
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>

                <div class="card p-4 bg-white border-0 mb-4 text-dark fw-bold"> 
                    <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-2">
                        <i data-lucide="award"></i>
                        Consultation Details 
                    </h2>
                    <div class="row g-3">
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Initial Consultation Fee ($)</div>
                                <div class="flex-grow-1">{{ $profile->meta['initial_fee'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Follow-up Consultation Fee ($)</div>
                                <div class="flex-grow-1">{{ $profile->meta['followup_fee'] ?? 'N/A' }}</div>
                            </div>
                        </div> 
                    </div> 
                </div>

                <div class="card p-4 bg-white border-0 mb-4 text-dark fw-bold"> 
                    <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-2">
                        <i data-lucide="award"></i>
                        Chamber Location 
                    </h2>
                    <div class="row g-3">
                        <div class="col-12"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Clinic Address</div>
                                <div class="flex-grow-1">{{ $profile->meta['chamber_address'] ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Integrated Map Directions (Embed URL or Coordinates)</div>
                                <div class="flex-grow-1">{{ $profile->meta['map_coordinates'] ?? 'N/A' }}</div>
                            </div>
                        </div> 
                    </div> 
                </div>

                <div class="card p-4 bg-white border-0 mb-4 text-dark fw-bold"> 
                    <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-2">
                        <i data-lucide="award"></i>
                        Availability  
                    </h2>
                    <div class="row g-3">
                        <div class="col-12"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Available Days</div>
                                <div class="flex-grow-1">
                                    {{--@if($profile->meta['available_days'])
                                    @foreach($profile->meta['available_days'] as $item)
                                    {{ $item }},
                                    @endforeach
                                    @endif--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Time Slots Spectrum</div>
                                <div class="flex-grow-1">{{ $profile->meta['work_start_time'] ?? '' }} to {{ $profile->meta['work_end_time'] ?? '' }}</div>
                            </div>
                        </div> 
                        @if(!empty($profile->meta['off_days_description']))
                        <div class="col-12"> 
                            <div class="d-flex flex-column">
                                <div class="flex-shrink-0 info__label">Off-days / Special Holidays</div>
                                <div class="flex-grow-1">{{ $profile->meta['off_days_description'] ?? 'N/A' }}</div>
                            </div>
                        </div> 
                        @endif
                    </div> 
                </div>
            </div>
        </div><!--end::row-->
    </div>
    <style>
        .info__label { font-weight:500;min-width:7rem;font-size:.875rem; }
    </style>
</x-doctor-layout>
 