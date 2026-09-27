<x-doctor-layout>
    <x-slot name="header">
        <div class="row g-3 align-items-center">
            <div class="col-md-4 order-md-2"></div>
            <div class="col-md-8 order-md-1 d-flex align-items-center gap-3">
                <a href="{{ route('doctor.appointments.index') }}" class="btn btn-back rounded-circle">
                    <i data-lucide="arrow-left"></i> 
                </a>
                <h1 class="font-semibold fs-4 text-dark m-0">Manage Profile Informations</h1>  
            </div>
        </div>
    </x-slot>

<!-- Main Form Container -->
<div class="container mb-5">
    <div class="card p-4 bg-white"> 
        <div class="card-body">
            <!-- FIX 1: Point to the correct store route -->
            <form id="prescriptionForm" action="{{ route('doctor.prescription.store', $appointment->id) }}" method="POST" novalidate>
                @csrf
                
                <h2 class="fs-4 text-primary fw-bold mb-0"> {{ $doctor->profile->first_name }} {{ $doctor->profile->last_name }}</h2>
                <div>
                    @foreach($doctor->profile?->getMeta('degrees', []) as $item)
                        {{ $item }},
                    @endforeach
                </div>
                
                <!-- Section 1: Patient Information -->
                <hr> 
                <div class="row g-3">
                    <div class="col-md-6 d-flex flex-wrap gap-3">
                        <div class="d-inline-flex align-items-end">
                            <span class="text-muted small me-1">Patient:</span>
                            <span>{{ $patient->profile->first_name }} {{ $patient->profile->last_name ?? '' }}</span> 
                        </div>
                        <div class="d-inline-flex align-items-end">
                            <span class="text-muted small me-1">Age:</span>
                            <span>{{ $patient->profile?->getMeta('age', 'N/A') }}</span> 
                        </div>
                        <div class="d-inline-flex align-items-end">
                            <span class="text-muted small me-1">Weight:</span>
                            <span>{{ $patient->profile?->getMeta('weight', 'N/A') }} kg</span> 
                        </div>
                    </div> 
                </div>
                <hr class="mb-0">

                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="p-4 ps-0">
                            <h2 class="fs-6 fw-semibold text-success mb-3">Clinical Brief <i data-lucide="pencil-line" class="text-primary size-16"></i></h2>
                            <div class="col-12 mb-3">
                                <label for="bloodPressure" class="form-label">Blood Pressure (mmHg)</label>
                                <!-- Note the name format: vitals[bp] creates an array -->
                                <input type="text" class="form-control" id="bloodPressure" name="vitals[bp]" placeholder="120/80">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="weight" class="form-label">Weight (kg)</label>
                                <input type="number" class="form-control" id="weight" name="vitals[weight]" step="0.1">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="complaints" class="form-label">Chief Complaints / Symptoms</label>
                                <textarea class="form-control" id="complaints" name="complaints" rows="2" placeholder="e.g., Chronic cough for 3 days, fever"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="diagnosis" class="form-label">Diagnosis</label>
                                <input type="text" class="form-control" id="diagnosis" name="diagnosis" placeholder="Provisional or confirmed diagnosis">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-8 border-start medicine__box">
                        <div class="p-4 pe-0">
                            <h2 class="fs-6 fw-semibold text-success mb-3">Medicine(Rx) <i data-lucide="pencil-line" class="text-primary size-16"></i></h2>
                            <div id="medicationContainer" class="mb-4" style="min-height:200px;">
                                <!-- Initial Row Template -->
                                <div class="row g-1 medication-row align-items-end mb-1">
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold text-muted fs-12 mb-1">Medicine Name / Strength</label>
                                        <input type="text" class="form-control" name="medications[0][name]" placeholder="e.g., Amoxicillin 500mg" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-semibold text-muted fs-12 mb-1">Dosage / Frequency</label>
                                        <select class="form-select" name="medications[0][frequency]" required>
                                            <option value="1-0-0">1-0-0 (Once daily - Morning)</option>
                                            <option value="0-0-1">0-0-1 (Once daily - Night)</option>
                                            <option value="1-0-1">1-0-1 (Twice daily)</option>
                                            <option value="1-1-1">1-1-1 (Three times daily)</option>
                                            <option value="1-1-1-1">1-1-1-1 (Four times daily)</option>
                                            <option value="PRN">PRN (As needed)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold text-muted fs-12 mb-1">Timing</label>
                                        <select class="form-select" name="medications[0][timing]">
                                            <option value="after_meal">After Meal</option>
                                            <option value="before_meal">Before Meal</option>
                                            <option value="empty_stomach">Empty Stomach</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold text-muted fs-12 mb-1">Duration</label>
                                        <input type="text" class="form-control" name="medications[0][duration]" placeholder="e.g., 7 Days" required>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn btn-outline-danger remove-medication-row p-2" disabled>
                                            <i class="size-16" data-lucide="trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-secondary mb-3 d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-sm btn-outline-primary p-2" id="addMedicationBtn">
                                    <i class="" data-lucide="plus"></i> Add Medicine
                                </button>
                            </div>

                            <div style="margin:0 -2.5rem 0 -1.5rem;" class="border-top"></div>
                            <div class="mt-4 mb-2"> 
                                <button class="btn btn-link fs-6 p-0 gap-1 text-decoration-none text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Advice <i data-lucide="plus" class=""></i>
                                </button>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <textarea class="form-control h-auto" id="advice" name="advice" rows="3" placeholder="e.g., Avoid cold drinks, bed rest for 2 days"></textarea>
                            </div>
                             
                            <div class="mt-3"> 
                                <div class="mb-2">
                                    <button class="btn btn-link fs-6 p-0 gap-1 text-decoration-none text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTest" aria-expanded="false" aria-controls="collapseTest">
                                        Suggested Test <i data-lucide="plus" class=""></i>
                                    </button>
                                </div>
                                <div class="collapse" id="collapseTest">
                                    <textarea class="form-control h-auto" id="investigations" name="investigations" rows="3" placeholder="e.g., CBC, Chest X-Ray"></textarea>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="nextFollowUp" class="form-label">Next Follow-up Date</label>
                                <input type="date" class="form-control" id="nextFollowUp" name="follow_up_date">
                            </div>
                        </div>
                    </div> 
                </div> 

                <!-- Form Action Buttons -->
                <div class="d-flex justify-content-end gap-2 border-top pt-3">
                    <button type="reset" class="btn btn-light px-4">Reset</button>
                    <button type="submit" class="btn btn-success px-5">Generate Prescription</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('medicationContainer');
    const addButton = document.getElementById('addMedicationBtn');
    let rowIndex = 1;

    addButton.addEventListener('click', function () {
        const newRow = document.createElement('div');
        newRow.className = 'row g-1 medication-row align-items-end mb-1';
        newRow.innerHTML = `
            <div class="col-md-4">
                <input type="text" class="form-control" name="medications[${rowIndex}][name]" placeholder="e.g., Amoxicillin 500mg" required>
            </div>
            <div class="col-md-3">
                <select class="form-select" name="medications[${rowIndex}][frequency]" required>
                    <option value="1-0-0">1-0-0 (Once daily - Morning)</option>
                    <option value="0-0-1">0-0-1 (Once daily - Night)</option>
                    <option value="1-0-1">1-0-1 (Twice daily)</option>
                    <option value="1-1-1">1-1-1 (Three times daily)</option>
                    <option value="1-1-1-1">1-1-1-1 (Four times daily)</option>
                    <option value="PRN">PRN (As needed)</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" name="medications[${rowIndex}][timing]">
                    <option value="after_meal">After Meal</option>
                    <option value="before_meal">Before Meal</option>
                    <option value="empty_stomach">Empty Stomach</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="medications[${rowIndex}][duration]" placeholder="e.g., 7 Days" required>
            </div>
            <div class="col-md-1 text-end">
                <button type="button" class="btn btn-outline-danger remove-medication-row p-2">
                    <i class="size-16" data-lucide="trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newRow);
        rowIndex++;
        toggleRemoveButtons();
    });

    container.addEventListener('click', function (e) {
        if (e.target.closest('.remove-medication-row')) {
            const row = e.target.closest('.medication-row');
            if (document.querySelectorAll('.medication-row').length > 1) {
                row.remove();
                toggleRemoveButtons();
            }
        }
    });

    function toggleRemoveButtons() {
        const rows = document.querySelectorAll('.medication-row');
        rows.forEach((row) => {
            const btn = row.querySelector('.remove-medication-row');
            btn.disabled = (rows.length === 1);
        });
    }
});
</script>
</x-doctor-layout>