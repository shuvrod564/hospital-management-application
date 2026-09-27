<x-doctor-layout>
    <x-slot name="header">
        <div class="row g-3 align-items-center">
            <div class="col-md-4 order-md-2">
            </div>
            <div class="col-md-8 order-md-1 d-flex align-items-center gap-3">
                <a href="{{ route('doctor.profile.index') }}" class="btn btn-back rounded-circle">
                    <i data-lucide="arrow-left"></i> 
                </a>
                <h1 class="font-semibold fs-4 text-dark m-0">Manage Profile Informations</h1>  
            </div>
        </div>
    </x-slot>

    <div class="container py-5">
         
        <form method="POST" action="{{ route('doctor.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($profile)) @method('PUT') @endif

            <!-- 1. Basic Information -->
            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3">
                <i data-lucide="circle-user-round"></i>
                1. Basic Information
            </h2>
            <div class="card bg-white border-0 mb-4 shadow-sm"> 
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" required class="form-control" placeholder="John"
                                value="{{ old('first_name', $profile->first_name ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" required class="form-control" placeholder="Doe"
                                value="{{ old('last_name', $profile->last_name ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Photo</label>
                            @if($profile->avatar)
                                <img src="{{ Storage::url($profile->avatar) }}" alt="Avatar" class="img-thumbnail mb-2" style="max-height: 80px;">
                            @endif
                            <input type="file" name="avatar" class="form-control">
                            <div class="form-text">Leave blank to keep current photo.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Preferred Name / Alias</label>
                            <input type="text" name="preferred_name" class="form-control" placeholder="e.g. Dr. Prof."
                                value="{{ old('preferred_name', $profile->getMeta('preferred_name')) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Date of Birth (DOB) <span class="text-danger">*</span></label>
                            <input type="date" name="date_of_birth" required class="form-control"
                                value="{{ old('date_of_birth', $profile->date_of_birth) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Age</label>
                            <input type="number" name="age" class="form-control" placeholder="Automatically calculated" min="0"
                                value="{{ old('age', $profile->getMeta('age')) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Gender identity / Sex <span class="text-danger">*</span></label>
                            <select name="gender" required class="form-select">
                                <option value="" disabled {{ !old('gender', $profile->gender) ? 'selected' : '' }}>Select option...</option>
                                <option value="male" {{ old('gender', $profile->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $profile->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="non-binary" {{ old('gender', $profile->gender) == 'non-binary' ? 'selected' : '' }}>Non-binary</option>
                                <option value="other" {{ old('gender', $profile->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                <option value="prefer_not_to_say" {{ old('gender', $profile->gender) == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" required class="form-control" placeholder="+1 (555) 000-0000"
                                value="{{ old('phone', $profile->phone ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" required class="form-control" placeholder="johndoe@example.com"
                                value="{{ old('email', $profile->getMeta('email')) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Residential Address <span class="text-danger">*</span></label>
                            <textarea cols="55" rows="2" name="address" required class="form-control h-auto" placeholder="123 Main St, Apt 4B, New York, NY 10001">{{ old('address', $profile->address ?? '') }}</textarea>
                        </div>
                        
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold text-secondary border-bottom pb-2">Emergency Contact Information</h6>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Contact Name <span class="text-danger">*</span></label>
                            <input type="text" name="emergency_name" required class="form-control" placeholder="Jane Doe"
                                value="{{ old('emergency_name', $profile->getMeta('emergency_name')) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Relationship to Patient <span class="text-danger">*</span></label>
                            <input type="text" name="emergency_relationship" required class="form-control" placeholder="Spouse, Parent, etc."
                                value="{{ old('emergency_relationship', $profile->getMeta('emergency_relationship')) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Contact Number <span class="text-danger">*</span></label>
                            <input type="tel" name="emergency_phone" required class="form-control" placeholder="+1 (555) 000-0000"
                                value="{{ old('emergency_phone', $profile->getMeta('emergency_phone')) }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Specialties -->
            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3 mt-5">
                <i data-lucide="award"></i>
                2. Specialties
            </h2>
            <div class="card bg-white border-0 mb-4 shadow-sm"> 
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Primary medical field <span class="text-danger">*</span></label>
                            <select name="pediatric_cardiology_fields" id="pediatric-cardiology-fields" class="form-select">
                                <option value="" {{ !old('pediatric_cardiology_fields', $profile->getMeta('pediatric_cardiology_fields')) ? 'selected' : '' }}>-- Select a Pediatric Cardiology Subfield --</option>
                                <option value="congenital_heart_disease" {{ old('pediatric_cardiology_fields', $profile->getMeta('pediatric_cardiology_fields')) == 'congenital_heart_disease' ? 'selected' : '' }}>Congenital Heart Disease (CHD)</option>
                                <option value="electrophysiology" {{ old('pediatric_cardiology_fields', $profile->getMeta('pediatric_cardiology_fields')) == 'electrophysiology' ? 'selected' : '' }}>Electrophysiology</option>
                                <option value="interventional_cardiology" {{ old('pediatric_cardiology_fields', $profile->getMeta('pediatric_cardiology_fields')) == 'interventional_cardiology' ? 'selected' : '' }}>Pediatric Interventional Cardiology</option>
                                <option value="heart_failure_transplant" {{ old('pediatric_cardiology_fields', $profile->getMeta('pediatric_cardiology_fields')) == 'heart_failure_transplant' ? 'selected' : '' }}>Heart Failure &amp; Transplantation</option>
                                <option value="preventive_cardiology" {{ old('pediatric_cardiology_fields', $profile->getMeta('pediatric_cardiology_fields')) == 'preventive_cardiology' ? 'selected' : '' }}>Preventive Pediatric Cardiology</option>
                                <option value="fetal_cardiology" {{ old('pediatric_cardiology_fields', $profile->getMeta('pediatric_cardiology_fields')) == 'fetal_cardiology' ? 'selected' : '' }}>Fetal Cardiology</option>
                                <option value="adult_congenital_heart_disease" {{ old('pediatric_cardiology_fields', $profile->getMeta('pediatric_cardiology_fields')) == 'adult_congenital_heart_disease' ? 'selected' : '' }}>Adult Congenital Heart Disease (ACHD)</option>
                            </select> 
                        </div>
                        <div class="col-md-6">
                            <label for="pediatric-focus-areas" class="form-label fw-medium">Specific Focus Area</label>
                            <select name="pediatric_focus_areas" id="pediatric-focus-areas" class="form-select" disabled>
                                <option value="">-- Select a Subfield First --</option>
                                {{-- Note: Because this is populated by JS, standard old() won't work perfectly if the list isn't loaded. 
                                    The JS block at the bottom handles re-selecting this on page load. --}}
                            </select>
                        </div> 
                    </div>
                </div>
            </div>

            <!-- 3. Credentials -->
            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3 mt-5">
                <i data-lucide="file-badge"></i>
                3. Credentials
            </h2>
            <div class="card bg-white border-0 mb-4 shadow-sm"> 
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Degrees <span class="text-danger">*</span></label>
                            <select name="degrees[]" id="degrees-select" class="form-select" multiple style="height: 110px;">
                                <option value="MBBS" {{ in_array('MBBS', old('degrees', $profile->getMeta('degrees', []))) ? 'selected' : '' }}>MBBS</option>
                                <option value="MD" {{ in_array('MD', old('degrees', $profile->getMeta('degrees', []))) ? 'selected' : '' }}>MD</option>
                                <option value="FRCS" {{ in_array('FRCS', old('degrees', $profile->getMeta('degrees', []))) ? 'selected' : '' }}>FRCS</option> 
                                <option value="PhD" {{ in_array('PhD', old('degrees', $profile->getMeta('degrees', []))) ? 'selected' : '' }}>PhD</option> 
                            </select> 
                            <div class="form-text">Hold down Ctrl (Windows) or Command (Mac) to select multiple values.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="board-certifications" class="form-label fw-medium">Board Certifications</label>
                            <input type="text" name="board_certifications" id="board-certifications" class="form-control" placeholder="e.g. American Board of Pediatrics"
                                value="{{ old('board_certifications', $profile->getMeta('board_certifications')) }}">
                        </div> 
                        <div class="col-md-6">
                            <label for="registration-number" class="form-label fw-medium">Medical Council Registration Number <span class="text-danger">*</span></label>
                            <input type="text" name="registration_number" id="registration-number" required class="form-control" placeholder="e.g. MC-9876543"
                                value="{{ old('registration_number', $profile->getMeta('registration_number')) }}">
                        </div> 
                    </div>
                </div>
            </div>

            <!-- 4. Experience & Background -->
            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3 mt-5">
                <i data-lucide="briefcase"></i>
                4. Experience & Background
            </h2>
            <div class="card bg-white border-0 mb-4 shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="years-in-practice" class="form-label fw-medium">Years in Practice <span class="text-danger">*</span></label>
                            <input type="number" name="years_in_practice" id="years-in-practice" required class="form-control" min="0" placeholder="e.g. 12"
                                value="{{ old('years_in_practice', $profile->getMeta('years_in_practice')) }}">
                        </div>
                        <div class="col-md-8">
                            <label for="past-internships" class="form-label fw-medium">Past Internships</label>
                            <input type="text" name="past_internships" id="past-internships" class="form-control" placeholder="e.g. Mayo Clinic (2012-2013), Johns Hopkins Medicine"
                                value="{{ old('past_internships', $profile->getMeta('past_internships')) }}">
                        </div>
                        <div class="col-12">
                            <label for="historical-affiliations" class="form-label fw-medium">Historical Affiliations with Clinics or Hospitals</label>
                            <textarea name="historical_affiliations" id="historical-affiliations" rows="3" class="form-control" placeholder="List past clinics or medical institutions you were associated with...">{{ old('historical_affiliations', $profile->getMeta('historical_affiliations')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Consultation Details -->
            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3 mt-5">
                <i data-lucide="dollar-sign"></i>
                5. Consultation Details
            </h2>
            <div class="card bg-white border-0 mb-4 shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="initial-fee" class="form-label fw-medium">Initial Consultation Fee ($) <span class="text-danger">*</span></label>
                            <input type="number" name="initial_fee" id="initial-fee" required class="form-control" min="0" step="0.01" placeholder="e.g. 150.00"
                                value="{{ old('initial_fee', $profile->getMeta('initial_fee')) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Follow-up Consultation Fee ($) <span class="text-danger">*</span></label>
                            <input type="number" name="followup_fee" required class="form-control" min="0" step="0.01" placeholder="e.g. 80.00"
                                value="{{ old('followup_fee', $profile->getMeta('followup_fee')) }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. Chamber Location -->
            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3 mt-5">
                <i data-lucide="map-pin"></i>
                6. Chamber Location
            </h2>
            <div class="card bg-white border-0 mb-4 shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="chamber-address" class="form-label fw-medium">Clinic Address <span class="text-danger">*</span></label>
                            <input type="text" name="chamber_address" id="chamber-address" required class="form-control" placeholder="e.g. Metro Health Care, Suite 300, 456 Central Ave"
                                value="{{ old('chamber_address', $profile->getMeta('chamber_address')) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="map-coordinates" class="form-label fw-medium">Integrated Map Directions (Embed URL or Coordinates)</label>
                            <input type="text" name="map_coordinates" id="map-coordinates" class="form-control" placeholder="e.g. https://maps.google.com/embed?... or Latitude/Longitude"
                                value="{{ old('map_coordinates', $profile->getMeta('map_coordinates')) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="calculated-distance" class="form-label fw-medium">Distance tracking metadata placeholder</label>
                            <input type="text" id="calculated-distance" class="form-control" readonly placeholder="System auto-calculates distance from the user's location">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. Availability -->
            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3 mt-5">
                <i data-lucide="calendar"></i>
                7. Availability
            </h2>
            <div class="card bg-white border-0 mb-4 shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold text-secondary mb-3">Real-time Calendar Configuration Settings</label>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Available Days</label>
                            <div class="p-2 border rounded">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="available_days[]" value="Mon" id="dayMon" {{ in_array('Mon', old('available_days', $profile->getMeta('available_days', []))) ? 'checked' : '' }}><label class="form-check-label" for="dayMon">Monday</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="available_days[]" value="Tue" id="dayTue" {{ in_array('Tue', old('available_days', $profile->getMeta('available_days', []))) ? 'checked' : '' }}><label class="form-check-label" for="dayTue">Tuesday</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="available_days[]" value="Wed" id="dayWed" {{ in_array('Wed', old('available_days', $profile->getMeta('available_days', []))) ? 'checked' : '' }}><label class="form-check-label" for="dayWed">Wednesday</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="available_days[]" value="Thu" id="dayThu" {{ in_array('Thu', old('available_days', $profile->getMeta('available_days', []))) ? 'checked' : '' }}><label class="form-check-label" for="dayThu">Thursday</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="available_days[]" value="Fri" id="dayFri" {{ in_array('Fri', old('available_days', $profile->getMeta('available_days', []))) ? 'checked' : '' }}><label class="form-check-label" for="dayFri">Friday</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="available_days[]" value="Sat" id="daySat" {{ in_array('Sat', old('available_days', $profile->getMeta('available_days', []))) ? 'checked' : '' }}><label class="form-check-label" for="daySat">Saturday</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="available_days[]" value="Sun" id="daySun" {{ in_array('Sun', old('available_days', $profile->getMeta('available_days', []))) ? 'checked' : '' }}><label class="form-check-label" for="daySun">Sunday</label></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Time Slots Spectrum</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <label class="small text-muted">Start Time</label>
                                    <input type="time" name="work_start_time" class="form-control" value="{{ old('work_start_time', $profile->getMeta('work_start_time')) }}">
                                </div>
                                <div class="col-6">
                                    <label class="small text-muted">End Time</label>
                                    <input type="time" name="work_end_time" class="form-control" value="{{ old('work_end_time', $profile->getMeta('work_end_time')) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Off-days / Special Holidays</label>
                            <textarea name="off_days_description" rows="3" class="form-control" placeholder="e.g. National Holidays, Alternate Saturdays off...">{{ old('off_days_description', $profile->getMeta('off_days_description')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. Patient Feedback -->
            <h2 class="mb-3 text-dark fs-5 fw-semibold d-flex align-items-center gap-3 mt-5">
                <i data-lucide="message-square-heart"></i>
                8. Patient Feedback & Metrics
            </h2>
            <div class="card bg-white border-0 mb-4 shadow-sm">
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Collective Star Ratings Indicator Balance</label>
                            <div class="d-flex align-items-center gap-2 border p-2 rounded bg-light">
                                <input type="number" name="mock_rating" class="form-control form-control-sm" style="width: 80px;" min="0" max="5" step="0.1" value="{{ old('mock_rating', $profile->getMeta('mock_rating', 4.8)) }}">
                                <span class="text-warning d-flex align-items-center"><i data-lucide="star" class="fill-current w-4 h-4"></i></span>
                                <span class="small text-muted">(Current system profile collective validation marker)</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Bedside Manner Metrics Assessment Rating</label>
                            <input type="text" name="bedside_manner_rating" class="form-control" placeholder="e.g. 96% positive feedback response metrics" readonly value="{{ old('bedside_manner_rating', $profile->getMeta('bedside_manner_rating')) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Detailed Written Reviews / Wait Times Evaluation Logs Summary</label>
                            <textarea name="feedback_logs_summary" rows="3" class="form-control" placeholder="Aggregated review overview metrics structural points analysis...">{{ old('feedback_logs_summary', $profile->getMeta('feedback_logs_summary')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Action Row -->
            <div class="row mt-4 mb-5">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm py-3 fw-semibold">
                        Update and Sync Professional Profile Portfolio
                    </button>
                </div>
            </div>

        </form>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const focusAreasData = {
                congenital_heart_disease: [
                    { value: "asd_vsd", text: "Atrial & Ventricular Septal Defects" },
                    { value: "tetralogy_of_fallot", text: "Tetralogy of Fallot" },
                    { value: "hlhs", text: "Hypoplastic Left Heart Syndrome" },
                    { value: "coarctation_aorta", text: "Coarctation of the Aorta" }
                ],
                electrophysiology: [
                    { value: "supraventricular_tachycardia", text: "Supraventricular Tachycardia (SVT)" },
                    { value: "ablation_therapy", text: "Catheter Ablation Therapy" },
                    { value: "pacemaker_icd", text: "Pacemakers & ICD Management" },
                    { value: "long_qt", text: "Long QT Syndrome & Channelopathies" }
                ],
                interventional_cardiology: [
                    { value: "balloon_valvuloplasty", text: "Balloon Valvuloplasty" },
                    { value: "transcatheter_valve", text: "Transcatheter Valve Pulmonary Replacement" },
                    { value: "asd_vsd_closure", text: "Device Closure of ASD/VSD" },
                    { value: "coarctation_stenting", text: "Aortic Coarctation Stenting" }
                ],
                heart_failure_transplant: [
                    { value: "dilated_cardiomyopathy", text: "Dilated & Hypertrophic Cardiomyopathy" },
                    { value: "vads", text: "Ventricular Assist Devices (VAD)" },
                    { value: "transplant_rejection", text: "Immunosuppression & Rejection Monitoring" },
                    { value: "advanced_heart_failure", text: "End-Stage Heart Failure Management" }
                ],
                preventive_cardiology: [
                    { value: "pediatric_hypertension", text: "Juvenile Hypertension" },
                    { value: "familial_hypercholesterolemia", text: "Familial Hypercholesterolemia" },
                    { value: "metabolic_syndrome", text: "Cardiometabolic Risk Mitigation" },
                    { value: "kawasaki_followup", text: "Post-Kawasaki Disease Monitoring" }
                ],
                fetal_cardiology: [
                    { value: "fetal_echocardiography", text: "Fetal Echocardiography (In-Utero)" },
                    { value: "prenatal_chd_screening", text: "Prenatal CHD Risk Screening" },
                    { value: "fetal_arrhythmia", text: "In-Utero Arrhythmia Management" },
                    { value: "delivery_planning", text: "Perinatal Care Coordination" }
                ],
                adult_congenital_heart_disease: [
                    { value: "fontan_conversion", text: "Fontan Circulation Management" },
                    { value: "pregnancy_chd", text: "Pregnancy & Maternal CHD Risks" },
                    { value: "reoperation_screening", text: "Conduit & Valve Reoperation Screening" },
                    { value: "achy_arrhythmias", text: "Late-Onset Congenital Arrhythmias" }
                ]
            };

            const mainSelect = document.getElementById('pediatric-cardiology-fields');
            const subSelect = document.getElementById('pediatric-focus-areas');
            
            // GET SAVED VALUE FROM DATABASE
            const savedSubfield = "{{ $profile->getMeta('pediatric_focus_areas') }}";

            function populateSubSelect(selectedField) {
                subSelect.innerHTML = '<option value="">-- Select a Specific Focus Area --</option>';

                if (selectedField && focusAreasData[selectedField]) {
                    subSelect.disabled = false;
                    focusAreasData[selectedField].forEach(area => {
                        const option = document.createElement('option');
                        option.value = area.value;
                        option.text = area.text;
                        // RE-SELECT THE SAVED VALUE AFTER POPULATING
                        if (area.value === savedSubfield) {
                            option.selected = true;
                        }
                        subSelect.appendChild(option);
                    });
                } else {
                    subSelect.disabled = true;
                    subSelect.innerHTML = '<option value="">-- Select a Subfield First --</option>';
                }
            }

            mainSelect.addEventListener('change', function() {
                populateSubSelect(this.value);
            });

            // TRIGGER POPULATION ON PAGE LOAD IF A MAIN FIELD IS ALREADY SELECTED
            if (mainSelect.value) {
                populateSubSelect(mainSelect.value);
            }
        });
        </script>
    </div>
</x-doctor-layout>
 