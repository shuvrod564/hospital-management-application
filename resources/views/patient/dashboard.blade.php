<x-patient-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            @php
    $profile = auth()->user()->profile;
    $percentage = $profile?->completion_percentage ?? 0;
@endphp

<div class="flex justify-between">
    <span>Profile completion</span>
    <span>{{ $percentage }}%</span>
</div>

<div class="h-2 w-full rounded bg-gray-200">
    <div
        class="h-2 rounded bg-blue-600"
        style="width: {{ $percentage }}%"
    ></div>
</div>
            <div class="row g-4 gx-lg-5">
                <div class="col-lg-8">
                    {{$username}}
                    {{ __("You're logged in!") }} 
                </div><!--end::col-->

                <div class="col-lg-4">
                    <div class="card border-0 rounded-4 shadow-lg overflow-hidden position-relative mx-auto" style="max-width: 420px; background-color: #ffffff;">
                        <!-- Banner Image -->
                        <div class="position-relative p-2">
                            <div class="rounded-4 overflow-hidden" style="height: 100px; background: linear-gradient(135deg, #ffc0cb 0%, #ffe4e1 50%, #ffdab9 100%);">
                                <!-- Edit Profile Button -->
                                <div class="d-flex justify-content-end px-4 pt-2">
                                    <button class="btn btn-outline-secondary btn-sm rounded-3 fw-medium d-flex align-items-center gap-1 py-1 px-2 border-opacity-25" style="font-size: 0.8rem; color: #333;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                        Edit Profile
                                    </button>
                                </div>
                            </div>

                        </div>

                        <!-- Avatar -->
                        <div class="position-absolute start-0 ms-4" style="top: 40px; z-index: 2;">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=200" alt="Jonathan West" class="rounded-circle border border-4 border-white shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                        </div> 

                        <!-- Profile Details & Action Buttons -->
                        <div class="px-4 mt-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="fw-bold mb-0 text-dark d-flex align-items-center gap-1">
                                        {{$username}} 
                                    </h5>
                                    <span class="text-secondary small">{{ $email }}</span>
                                </div> 
                            </div>

                            <!-- About Section -->
                            <div class="mt-3">
                                <h6 class="fw-semibold text-dark small mb-1">About</h6>
                                <p class="text-secondary lh-sm" style="font-size: 0.825rem;">
                                    I'm Jonathan West, a product-focused UI/UX designer who blends user research, interaction design, and visual craft to build intuitive web and mobile experiences.
                                </p>
                            </div>

                            <!-- Stats Section -->
                            <div class="row pt-3 pb-4 text-start">
                                <div class="col-4">
                                    <h4 class="fw-bold text-dark mb-0">629</h4>
                                    <span class="text-secondary small" style="font-size: 0.75rem;">Post</span>
                                </div>
                                <div class="col-4">
                                    <h4 class="fw-bold text-dark mb-0">201</h4>
                                    <span class="text-secondary small" style="font-size: 0.75rem;">Following</span>
                                </div>
                                <div class="col-4">
                                    <h4 class="fw-bold text-dark mb-0">124k</h4>
                                    <span class="text-secondary small" style="font-size: 0.75rem;">Followers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div><!--end::col-->
            </div><!--end::row-->
        </div><!--end::container-->
    </div>
</x-patient-layout>
