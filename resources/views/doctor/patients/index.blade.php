<x-doctor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Patients</h2>
        <p class="text-muted">Patients who have booked appointments with you.</p>
    </x-slot>

    <div class="container py-5">
        <div class="">
          
<?php
// echo '<pre>';
// print_r($patients).'<br>';
// echo '</pre>';
?>
            
            <div class="d-flex flex-column gap-1">
                <div class="row g-0 row-cols-6 fw-light small bg-light p-1 rounded-top-3">
                    <div class="p-3">Patient</div>
                    <div class="p-3">Age/Gender</div>
                    <div class="p-3">Contact</div>
                    <div class="p-3">Blood Group</div>
                    <div class="p-3">Last Visit</div>
                    <div class="p-3"></div>
                </div>
                @foreach($patients as $patient)
                <!-- Main Appointment Row -->
                <div class="row g-0 row-cols-6 bg-white p-1 fs-6 border-bottom align-items-center">
                    <div class="p-3">
                        <div class="d-flex align-items-center gap-2"> 
                            @if($patient->profile->avatar)
                            <div class="avater">
                                <img src="{{ asset('storage/' . $patient->profile->avatar) }}" alt="">
                            </div>
                            @endif
                            <div class="flex-grow-1">
                                {{ $patient->profile->first_name ?? '' }} {{ $patient->profile->last_name ?? '' }}
                            </div>
                        </div>
                    </div>
                    <div class="p-3">{{ $patient->profile->meta['age'] ?? '--' }} / {{ $patient->profile->gender ?? '--' }}</div>
                    <div class="p-3 text-truncate">
                        <div><i data-lucide="phone" class="size-16"></i> {{ $patient->profile->phone ?? '--' }}</div>
                        <div><i data-lucide="mail" class="size-16"></i> {{ $patient->profile->meta['email'] ?? '--' }}</div>
                    </div>
                    <div class="p-3">{{ $patient->profile->meta['blood_group'] ?? '--' }}</div>
                    <div class="p-3">
                        {{ formatdate($patient->appointment_date) ?? '--' }} 
                    </div>
                    <div class="p-3 space-x-2 d-flex justify-content-end gap-2">   
                        <i data-lucide="chevron-right"></i>
                    </div>
                </div> 
                @endforeach
            </div> 
        </div><!--end::card-->
         <div class="mt-4">
        {{ $patients->links() }}
    </div>
    </div>
</x-doctor-layout>