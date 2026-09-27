<x-patient-layout>
    <x-slot name="header">
        <div class="row g-3 align-items-center">
            <div class="col-md-4 order-md-2">
            </div>
            <div class="col-md-8 order-md-1 d-flex align-items-center gap-3">
                <a href="{{ route('user.profile.view') }}" class="btn btn-back rounded-circle">
                    <i data-lucide="arrow-left"></i> 
                </a>
                <h1 class="font-semibold fs-4 text-dark m-0">Manage Profile Informations</h1>  
            </div>
        </div>
    </x-slot>
    @if(session('success'))
        <div class="alert alert-success d-inline-flex align-items-center gap-3 ms-auto"><i data-lucide="badge-check"></i> {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger d-inline-flex align-items-center gap-3 ms-auto"><i data-lucide="badge-check"></i> {{ session('error') }}</div>
    @endif

    <div class="container py-5" style="max-width: 1100px;">
        <!-- Added route and method -->
        <form method="POST" action="{{ route('user.profile.manage') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($profile)) @method('PUT') @endif

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-person-fill me-2"></i>1. Personal & Contact Information</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Profile Image</label>
                            <input type="file" name="avater" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" required class="form-control" placeholder="John Doe"
                                value="{{ old('full_name', $profile->first_name ?? '') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Preferred Name / Alias</label>
                            <input type="text" name="preferred_name" class="form-control" placeholder="Johnny"
                                value="{{ old('preferred_name', $profile->getMeta('preferred_name')) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Blood Group <span class="text-danger">*</span></label>
                             <select name="blood_group" required class="form-select">
                                <option value="" disabled {{ !old('blood_group', $profile->blood_group) ? 'selected' : '' }}>Select option...</option>
                                <option value="A+" {{ old('blood_group', $profile->blood_group) == 'A+' ? 'selected' : '' }}>A+</option> 
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Date of Birth (DOB) <span class="text-danger">*</span></label>
                            <input type="date" name="dob" required class="form-control"
                                value="{{ old('dob', $profile->date_of_birth) }}">
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
                            <input type="text" name="address" required class="form-control" placeholder="123 Main St, Apt 4B, New York, NY 10001"
                                value="{{ old('address', $profile->address ?? '') }}">
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

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-credit-card-2-front-fill me-2"></i>2. Insurance & Billing Information</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Insurance Provider/Company</label>
                            <input type="text" name="insurance_provider" class="form-control" placeholder="Blue Cross Blue Shield"
                                value="{{ old('insurance_provider', $profile->getMeta('insurance_provider')) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Policy Number</label>
                            <input type="text" name="policy_number" class="form-control" placeholder="XJH123456789"
                                value="{{ old('policy_number', $profile->getMeta('policy_number')) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Group Number</label>
                            <input type="text" name="group_number" class="form-control" placeholder="98765"
                                value="{{ old('group_number', $profile->getMeta('group_number')) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Subscriber Name</label>
                            <input type="text" name="subscriber_name" class="form-control" placeholder="Leave blank if same as patient"
                                value="{{ old('subscriber_name', $profile->getMeta('subscriber_name')) }}">
                            <div class="form-text">Fill this out if insurance is under a parent or spouse's plan.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Copay/Deductible Status Description</label>
                            <input type="text" name="billing_status" class="form-control" placeholder="e.g., $30 copay applies / Deductible met"
                                value="{{ old('billing_status', $profile->getMeta('billing_status')) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-heart-pulse-fill me-2"></i>3. Clinical & Medical History</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-medium">Primary Care Physician (PCP)</label>
                            <input type="text" name="pcp_name" class="form-control" placeholder="Dr. Robert Smith, MD"
                                value="{{ old('pcp_name', $profile->getMeta('pcp_name')) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Allergies</label>
                            <textarea name="allergies" rows="3" class="form-control" placeholder="List all medication, food, or environmental allergies...">{{ old('allergies', $profile->getMeta('allergies')) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Chronic Conditions</label>
                            <textarea name="chronic_conditions" rows="3" class="form-control" placeholder="List existing long-term illnesses...">{{ old('chronic_conditions', $profile->getMeta('chronic_conditions')) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Current Medications</label>
                            <textarea name="current_medications" rows="3" class="form-control" placeholder="Include names and precise dosages...">{{ old('current_medications', $profile->getMeta('current_medications')) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Past Surgeries & Procedures</label>
                            <textarea name="past_surgeries" rows="3" class="form-control" placeholder="List surgeries and corresponding approximate dates...">{{ old('past_surgeries', $profile->getMeta('past_surgeries')) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Family Medical History</label>
                            <textarea name="family_history" rows="3" class="form-control" placeholder="List hereditary conditions within your immediate family...">{{ old('family_history', $profile->getMeta('family_history')) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Social History</label>
                            <textarea name="social_history" rows="3" class="form-control" placeholder="Mention lifestyle factors such as smoking habits...">{{ old('social_history', $profile->getMeta('social_history')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-calendar-check-fill me-2"></i>4. Appointment & Interaction History</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-primary">Upcoming Appointments Tracking Parameters</label>
                            <div class="p-3 bg-light rounded border border-dashed mb-3">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <label class="form-label small fw-medium text-muted mb-1">Target Date & Time</label>
                                        <input type="datetime-local" name="upcoming_appointment_datetime" class="form-control form-control-sm"
                                            value="{{ old('upcoming_appointment_datetime', $profile->getMeta('upcoming_appointment_datetime')) }}">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label small fw-medium text-muted mb-1">Assigned Doctor / Clinic Destination</label>
                                        <input type="text" name="upcoming_appointment_provider" class="form-control form-control-sm" placeholder="General Clinic - Dr. Green"
                                            value="{{ old('upcoming_appointment_provider', $profile->getMeta('upcoming_appointment_provider')) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Historical Overview logs</label>
                            <div class="p-3 bg-light rounded border h-75 d-flex flex-column justify-content-center align-items-center text-center">
                                <i class="bi bi-clock-history fs-3 text-muted mb-2"></i>
                                <span class="small text-muted">Past visits summary and diagnoses profiles can be loaded onto active accounts following completion of this profile assessment module.</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium">Document Vault Attachments</label>
                            <input type="file" name="medical_reports[]" class="form-control" multiple>
                            @if($profile->getMeta('medical_reports'))
                                <div class="form-text mt-2">
                                    <strong>Uploaded Files:</strong>
                                    <ul class="mt-1 mb-0">
                                        @foreach($profile->getMeta('medical_reports') as $filePath)
                                            <li><a href="{{ Storage::url($filePath) }}" target="_blank" class="text-decoration-none">{{ basename($filePath) }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-text">Upload previous medical records securely. (Appending to existing files)</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium d-block mb-2">Digital Consent Documentation & Verification <span class="text-danger">*</span></label>
                            <div class="form-check p-3 bg-light rounded border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="hipaa_consent" value="1" id="hipaaConsentCheck" required 
                                    {{ old('hipaa_consent', $profile->getMeta('hipaa_consent')) ? 'checked' : '' }}>
                                <label class="form-check-label fw-medium small text-dark d-inline" for="hipaaConsentCheck">
                                    I hereby confirm digital verification signature parameters approving medical treatment procedures, legal validation policies, and privacy terms under local healthcare guidelines (e.g., HIPAA compliance structures).
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-gear-fill me-2"></i>5. App-Specific & Preference Settings</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Notification Channels Preferences</label>
                            <div class="pt-2">
                                <div class="form-check form-check-inline me-3">
                                    <input class="form-check-input" type="checkbox" name="notifications[]" value="sms" id="notifySMS" {{ in_array('sms', old('notifications', $profile->getMeta('notifications', ['sms', 'email']))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notifySMS">SMS Alerts</label>
                                </div>
                                <div class="form-check form-check-inline me-3">
                                    <input class="form-check-input" type="checkbox" name="notifications[]" value="email" id="notifyEmail" {{ in_array('email', old('notifications', $profile->getMeta('notifications', ['sms', 'email']))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notifyEmail">Email Updates</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notifications[]" value="push" id="notifyPush" {{ in_array('push', old('notifications', $profile->getMeta('notifications', []))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notifyPush">Push Notifications</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Preferred Language / Communication Style</label>
                            <select name="preferred_language" class="form-select">
                                <option value="en" {{ old('preferred_language', $profile->getMeta('preferred_language', 'en')) == 'en' ? 'selected' : '' }}>English</option>
                                <option value="es" {{ old('preferred_language', $profile->getMeta('preferred_language')) == 'es' ? 'selected' : '' }}>Español (Spanish)</option>
                                <option value="fr" {{ old('preferred_language', $profile->getMeta('preferred_language')) == 'fr' ? 'selected' : '' }}>Français (French)</option>
                                <option value="de" {{ old('preferred_language', $profile->getMeta('preferred_language')) == 'de' ? 'selected' : '' }}>Deutsch (German)</option>
                                <option value="zh" {{ old('preferred_language', $profile->getMeta('preferred_language')) == 'zh' ? 'selected' : '' }}>中文 (Chinese)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Linked Dependent Account Management profiles</label>
                            <input type="text" name="linked_profiles" class="form-control" placeholder="e.g., Child profile ID, Elderly parent account alias"
                                value="{{ old('linked_profiles', $profile->getMeta('linked_profiles')) }}">
                            <div class="form-text">Track multi-account dependency structures here.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm py-3 fw-bold">
                        Save Complete Patient Profile Records
                    </button>
                </div>
            </div>

        </form>
    </div>
</x-patient-layout>