<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $appointment ? __('Edit Appointment') : __('Create Appointment') }}
        </h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form
                action="{{ $appointment ? route('admin.appointments.update', $appointment) : route('admin.appointments.store') }}"
                method="POST"
                class="bg-white shadow-sm sm:rounded-lg p-6"
            >
                @csrf

                @if($appointment)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1">Patient Name</label>
                        <input type="text" name="patient_name" class="w-full border-gray-300 rounded"
                               value="{{ old('patient_name', $appointment?->patient_name) }}" required>
                        @error('patient_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block mb-1">Patient Phone</label>
                        <input type="text" name="patient_phone" class="w-full border-gray-300 rounded"
                               value="{{ old('patient_phone', $appointment?->patient_phone) }}">
                    </div>

                    <div>
                        <label class="block mb-1">Patient Email</label>
                        <input type="email" name="patient_email" class="w-full border-gray-300 rounded"
                               value="{{ old('patient_email', $appointment?->patient_email) }}">
                    </div>

                    <div>
                        <label class="block mb-1">Doctor</label>
                        <select name="doctor_id" class="w-full border-gray-300 rounded">
                            <option value="">Select Doctor</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" @selected(old('doctor_id', $appointment?->doctor_id) == $doctor->id)>
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1">Appointment Date</label>
                        <input type="date" name="appointment_date" class="w-full border-gray-300 rounded"
                               value="{{ old('appointment_date', optional($appointment?->appointment_date)->format('Y-m-d')) }}" required>
                    </div>

                    <div>
                        <label class="block mb-1">Appointment Time</label>
                        <input type="time" name="appointment_time" class="w-full border-gray-300 rounded"
                               value="{{ old('appointment_time', $appointment?->appointment_time) }}" required>
                    </div>

                    <div>
                        <label class="block mb-1">Department</label>
                        <input type="text" name="department" class="w-full border-gray-300 rounded"
                               value="{{ old('department', $appointment?->department) }}">
                    </div>

                    <div>
                        <label class="block mb-1">Status</label>
                        <select name="status" class="w-full border-gray-300 rounded" required>
                            @foreach(['pending', 'confirmed', 'completed', 'cancelled'] as $status)
                                <option value="{{ $status }}" @selected(old('status', $appointment?->status ?? 'pending') === $status)>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block mb-1">Reason</label>
                        <textarea name="reason" class="w-full border-gray-300 rounded" rows="3">{{ old('reason', $appointment?->reason) }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block mb-1">Notes</label>
                        <textarea name="notes" class="w-full border-gray-300 rounded" rows="3">{{ old('notes', $appointment?->notes) }}</textarea>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                        {{ $appointment ? 'Update Appointment' : 'Save Appointment' }}
                    </button>

                    <a href="{{ route('admin.appointments.index') }}" class="px-4 py-2 bg-gray-200 rounded">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>