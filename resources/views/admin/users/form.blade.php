<x-admin-layout>
    <x-slot name="header">
        <h1 class="h4 mb-0">
            {{ $title }}
        </h1>
    </x-slot>

    <div class="container-fluid py-4">
        <form
            action="{{ $user ? route('admin.' . $routeName . '.update', $user) : route('admin.' . $routeName . '.store') }}"
            method="POST"
        >
            @csrf

            @if($user)
                @method('PUT')
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user?->name) }}"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user?->email) }}"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> 

                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                                <option value="">Select Role</option>
                                @foreach($roles as $roleOption)
                                    <option value="{{ $roleOption }}"
                                        @selected(old('role', $user?->role ?? $role) === $roleOption)>
                                        {{ ucfirst($roleOption) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Password</label>

                            <div class="input-group">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    {{ $user ? '' : 'required' }}
                                    autocomplete="new-password"
                                >

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary password-toggle"
                                    data-target="password"
                                    aria-label="Toggle password visibility"
                                >
                                    <i class="fas fa-eye"></i>
                                </button>

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @if($user)
                                <small class="text-muted">Leave blank to keep current password.</small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>

                            <div class="input-group">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control"
                                    {{ $user ? '' : 'required' }}
                                    autocomplete="new-password"
                                >

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary password-toggle"
                                    data-target="password_confirmation"
                                    aria-label="Toggle password confirmation visibility"
                                >
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ $user ? 'Update' : 'Save' }}
                    </button>

                    <a href="{{ route('admin.' . $routeName . '.index') }}" class="btn btn-light">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            document.querySelectorAll('.password-toggle').forEach(function (button) {
                button.addEventListener('click', function () {
                    const input = document.getElementById(button.dataset.target);
                    const icon = button.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
        </script>
    @endpush
</x-admin-layout>