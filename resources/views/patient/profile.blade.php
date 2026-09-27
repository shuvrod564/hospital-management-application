<x-patient-layout>
    <x-slot name="header">
        <h1 class="font-semibold fs-4 text-dark">Patient Intake & Profile Form</h1>

    </x-slot>

    <div class="container py-5">
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf

            <h5 class="mb-3 text-dark fs-5 fw-semibold"><i data-lucide="circle-user-round"></i>1. Personal & Contact Information</h5>
            <div class="card border-0 mb-4"> 
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" required class="form-control" placeholder="John Doe">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Preferred Name / Alias</label>
                            <input type="text" name="preferred_name" class="form-control" placeholder="Johnny">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Date of Birth (DOB) <span class="text-danger">*</span></label>
                            <input type="date" name="dob" required class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Age</label>
                            <input type="number" name="age" class="form-control" placeholder="Automatically calculated" min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Gender identity / Sex <span class="text-danger">*</span></label>
                            <select name="gender" required class="form-select">
                                <option value="" disabled selected>Select option...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="non-binary">Non-binary</option>
                                <option value="other">Other</option>
                                <option value="prefer_not_to_say">Prefer not to say</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" required class="form-control" placeholder="+1 (555) 000-0000">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" required class="form-control" placeholder="johndoe@example.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Residential Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" required class="form-control" placeholder="123 Main St, Apt 4B, New York, NY 10001">
                        </div>
                        
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold text-secondary border-bottom pb-2">Emergency Contact Information</h6>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Contact Name <span class="text-danger">*</span></label>
                            <input type="text" name="emergency_name" required class="form-control" placeholder="Jane Doe">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Relationship to Patient <span class="text-danger">*</span></label>
                            <input type="text" name="emergency_relationship" required class="form-control" placeholder="Spouse, Parent, etc.">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Contact Number <span class="text-danger">*</span></label>
                            <input type="tel" name="emergency_phone" required class="form-control" placeholder="+1 (555) 000-0000">
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
                            <input type="text" name="insurance_provider" class="form-control" placeholder="Blue Cross Blue Shield">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Policy Number</label>
                            <input type="text" name="policy_number" class="form-control" placeholder="XJH123456789">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Group Number</label>
                            <input type="text" name="group_number" class="form-control" placeholder="98765">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Subscriber Name</label>
                            <input type="text" name="subscriber_name" class="form-control" placeholder="Leave blank if same as patient">
                            <div class="form-text">Fill this out if insurance is under a parent or spouse's plan.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Copay/Deductible Status Description</label>
                            <input type="text" name="billing_status" class="form-control" placeholder="e.g., $30 copay applies / Deductible met">
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
                            <input type="text" name="pcp_name" class="form-control" placeholder="Dr. Robert Smith, MD">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Allergies</label>
                            <textarea name="allergies" rows="3" class="form-control" placeholder="List all medication, food, or environmental allergies (e.g., Penicillin, Peanuts, Pollen)..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Chronic Conditions</label>
                            <textarea name="chronic_conditions" rows="3" class="form-control" placeholder="List existing long-term illnesses (e.g., Asthma, Diabetes, Hypertension)..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Current Medications</label>
                            <textarea name="current_medications" rows="3" class="form-control" placeholder="Include names and precise dosages (e.g., Lisinopril 10mg once daily)..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Past Surgeries & Procedures</label>
                            <textarea name="past_surgeries" rows="3" class="form-control" placeholder="List surgeries and corresponding approximate dates (e.g., Appendectomy - 2018)..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Family Medical History</label>
                            <textarea name="family_history" rows="3" class="form-control" placeholder="List hereditary conditions within your immediate family (e.g., Heart disease, Cancer)..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Social History</label>
                            <textarea name="social_history" rows="3" class="form-control" placeholder="Mention lifestyle factors such as smoking habits, alcohol intake, or general routine details..."></textarea>
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
                                        <input type="datetime-local" name="upcoming_appointment_datetime" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label class="form-label small fw-medium text-muted mb-1">Assigned Doctor / Clinic Destination</label>
                                        <input type="text" name="upcoming_appointment_provider" class="form-control form-control-sm" placeholder="General Clinic - Dr. Green">
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
                            <div class="form-text">Upload previous medical records, lab test reports, diagnostic analysis charts, or physical prescription notes securely.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium d-block mb-2">Digital Consent Documentation & Verification <span class="text-danger">*</span></label>
                            <div class="form-check p-3 bg-light rounded border">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="hipaa_consent" value="1" id="hipaaConsentCheck" required>
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
                                    <input class="form-check-input" type="checkbox" name="notifications[]" value="sms" id="notifySMS" checked>
                                    <label class="form-check-label" for="notifySMS">SMS Alerts</label>
                                </div>
                                <div class="form-check form-check-inline me-3">
                                    <input class="form-check-input" type="checkbox" name="notifications[]" value="email" id="notifyEmail" checked>
                                    <label class="form-check-label" for="notifyEmail">Email Updates</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notifications[]" value="push" id="notifyPush">
                                    <label class="form-check-label" for="notifyPush">Push Notifications</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Preferred Language / Communication Style</label>
                            <select name="preferred_language" class="form-select">
                                <option value="en" selected>English</option>
                                <option value="es">Español (Spanish)</option>
                                <option value="fr">Français (French)</option>
                                <option value="de">Deutsch (German)</option>
                                <option value="zh">中文 (Chinese)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Linked Dependent Account Management profiles</label>
                            <input type="text" name="linked_profiles" class="form-control" placeholder="e.g., Child profile ID, Elderly parent account alias">
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