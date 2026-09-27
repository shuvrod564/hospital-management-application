<x-patient-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row g-4 gx-lg-5">
                <div class="col-lg-8">
                    {{$username}}
                    {{ __("You're logged in!") }} 
                </div><!--end::col-->

                <div class="col-lg-4">
                    <div class="bg-light p-4 p-md-5">
                        <h2 class="fs-4 text-dark">{{$username}}</h2>
                        <div class="d-flex flex-row flex-wrap gap-3">
                            <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-1 rounded-pill">
                                <i data-lucide="mail" class="size-16"></i>
                                <span>{{ $email }}</span>
                            </div>
                        </div>
                    </div>
                </div><!--end::col-->
            </div><!--end::row-->
        </div><!--end::container-->
    </div>
</x-patient-layout>
