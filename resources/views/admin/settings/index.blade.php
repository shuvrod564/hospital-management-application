<x-admin-layout>
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0 text-gray-800">Site Settings & Configurations</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card card-primary card-outline card-tabs border-0 shadow-sm">
            <div class="card-header p-0 pt-1 border-bottom-0 bg-white">
                <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="specialties-tab" data-bs-toggle="tab" href="#specialties" role="tab">Doctor Specialties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-meta-tab" data-bs-toggle="tab" href="#custom-meta" role="tab">Custom Meta / Dynamic Settings</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="settingsTabContent">
                    
                    <!-- General Settings -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Site Name</label>
                                <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Site Tagline</label>
                                <input type="text" name="site_tagline" class="form-control" value="{{ $settings['site_tagline'] ?? '' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Timezone</label>
                                <input type="text" name="timezone" class="form-control" value="{{ $settings['timezone'] ?? 'UTC' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Currency Symbol</label>
                                <input type="text" name="currency_symbol" class="form-control" value="{{ $settings['currency_symbol'] ?? '$' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Currency Code</label>
                                <input type="text" name="currency_code" class="form-control" value="{{ $settings['currency_code'] ?? 'USD' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Site Logo</label>
                                <input type="file" name="site_logo" class="form-control">
                                @if(!empty($settings['site_logo']))
                                    <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="img-thumbnail mt-2" style="max-height: 50px;">
                                @endif
                            </div>
                            <div class="col-md-6 d-flex align-items-center mt-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="maintenance_mode" value="1" id="maintenance_mode" {{ !empty($settings['maintenance_mode']) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="maintenance_mode">Enable Maintenance Mode</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Doctor Specialties Tab -->
                    <div class="tab-pane fade" id="specialties" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Doctor Specialties List</h5>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addSpecialtyBtn">+ Add Specialty</button>
                        </div>
                        <div id="specialtiesContainer" class="row g-2">
                            @forelse($specialties as $spec)
                                <div class="col-md-4 specialty-item">
                                    <div class="input-group">
                                        <input type="text" name="specialties[]" class="form-control" value="{{ $spec }}">
                                        <button type="button" class="btn btn-outline-danger remove-item-btn">&times;</button>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-4 specialty-item">
                                    <div class="input-group">
                                        <input type="text" name="specialties[]" class="form-control" placeholder="e.g. Cardiology">
                                        <button type="button" class="btn btn-outline-danger remove-item-btn">&times;</button>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Custom Meta Dynamic Settings Tab -->
                    <div class="tab-pane fade" id="custom-meta" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Dynamic Meta Attributes</h5>
                            <button type="button" class="btn btn-sm btn-outline-success" id="addMetaBtn">+ Add New Meta Field</button>
                        </div>
                        <div id="customMetaContainer">
                            @forelse($customMeta as $item)
                                <div class="row g-2 mb-2 custom-meta-row">
                                    <div class="col-md-5">
                                        <input type="text" name="meta_keys[]" class="form-control" placeholder="Meta Key (e.g., google_analytics_id)" value="{{ $item['key'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="meta_values[]" class="form-control" placeholder="Meta Value" value="{{ $item['value'] ?? '' }}">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-danger w-100 remove-meta-btn">&times;</button>
                                    </div>
                                </div>
                            @empty
                                <div class="row g-2 mb-2 custom-meta-row">
                                    <div class="col-md-5">
                                        <input type="text" name="meta_keys[]" class="form-control" placeholder="Meta Key (e.g., custom_api_key)">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="meta_values[]" class="form-control" placeholder="Meta Value">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-danger w-100 remove-meta-btn">&times;</button>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer bg-white border-top text-end">
                <button type="submit" class="btn btn-primary px-4">Save Configuration</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('addSpecialtyBtn').addEventListener('click', function () {
            const container = document.getElementById('specialtiesContainer');
            const col = document.createElement('div');
            col.className = 'col-md-4 specialty-item';
            col.innerHTML = `
                <div class="input-group">
                    <input type="text" name="specialties[]" class="form-control" placeholder="Enter Specialty">
                    <button type="button" class="btn btn-outline-danger remove-item-btn">&times;</button>
                </div>
            `;
            container.appendChild(col);
        });

        document.getElementById('addMetaBtn').addEventListener('click', function () {
            const container = document.getElementById('customMetaContainer');
            const row = document.createElement('div');
            row.className = 'row g-2 mb-2 custom-meta-row';
            row.innerHTML = `
                <div class="col-md-5">
                    <input type="text" name="meta_keys[]" class="form-control" placeholder="Meta Key">
                </div>
                <div class="col-md-6">
                    <input type="text" name="meta_values[]" class="form-control" placeholder="Meta Value">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-outline-danger w-100 remove-meta-btn">&times;</button>
                </div>
            `;
            container.appendChild(row);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-item-btn')) {
                e.target.closest('.specialty-item').remove();
            }
            if (e.target.classList.contains('remove-meta-btn')) {
                e.target.closest('.custom-meta-row').remove();
            }
        });
    });
</script>
</x-admin-layout>