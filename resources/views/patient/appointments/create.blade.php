<x-patient-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book Appointment</h2>
    </x-slot>

    <div class="container py-4" style="max-width: 900px;">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                
                <form id="appointmentForm" method="POST" action="{{ route('user.appointments.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Select Doctor</label>
                        <select id="doctorSelect" name="doctor_id" required class="form-select form-select-lg">
                            <option value="" disabled selected>Choose a doctor...</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row g-4 mb-4">
                        
                        <div class="col-md-6">
                            <div class="card border h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <button type="button" id="prevMonthBtn" class="btn btn-sm btn-outline-secondary">&larr;</button>
                                        <h5 id="monthYearTitle" class="mb-0 fw-bold"></h5>
                                        <button type="button" id="nextMonthBtn" class="btn btn-sm btn-outline-secondary">&rarr;</button>
                                    </div>

                                    <div class="calendar-grid text-center mb-2">
                                        <div class="text-uppercase small fw-bold text-secondary py-2">SUN</div>
                                        <div class="text-uppercase small fw-bold text-secondary py-2">MON</div>
                                        <div class="text-uppercase small fw-bold text-secondary py-2">TUE</div>
                                        <div class="text-uppercase small fw-bold text-secondary py-2">WED</div>
                                        <div class="text-uppercase small fw-bold text-secondary py-2">THU</div>
                                        <div class="text-uppercase small fw-bold text-secondary py-2">FRI</div>
                                        <div class="text-uppercase small fw-bold text-secondary py-2">SAT</div>
                                    </div>

                                    <div id="calendarDaysGrid" class="calendar-grid"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border h-100">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-4">Available Time</h5>
                                    
                                    <div id="timeSlotsGrid" class="row g-2">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Reason for Visit</label>
                        <textarea name="reason" rows="3" required class="form-control" placeholder="Briefly describe your symptoms or reason..."></textarea>
                    </div>

                    <input type="hidden" name="appointment_date" id="appointment_date">
                    <input type="hidden" name="appointment_time" id="appointment_time">

                    <button type="submit" id="submitBtn" disabled class="btn btn-primary btn-lg w-100 mt-2">
                        Confirm Booking
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-patient-layout>

<style>
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
    }
    .date-btn {
        width: 40px;
        height: 40px;
        font-size: 14px;
        border: none !important;
        transition: all 0.2s ease;
    }
    .date-btn:hover:not(:disabled) {
        transform: scale(1.1);
        background-color: #e2e8f0 !important; 
    }
    .date-btn.btn-primary:hover:not(:disabled) {
        background-color: #0256d2 !important; 
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('appointment_date');
    const timeInput = document.getElementById('appointment_time');
    const monthYearTitle = document.getElementById('monthYearTitle');
    const daysGrid = document.getElementById('calendarDaysGrid');
    const slotsGrid = document.getElementById('timeSlotsGrid');
    const submitBtn = document.getElementById('submitBtn');
    const doctorSelect = document.getElementById('doctorSelect');
    const prevBtn = document.getElementById('prevMonthBtn');
    const nextBtn = document.getElementById('nextMonthBtn');

    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();
    let selectedDay = null;

    const times = [
        { label: '09:00 AM', value: '09:00' },
        { label: '09:30 AM', value: '09:30' },
        { label: '10:00 AM', value: '10:00' },
        { label: '10:30 AM', value: '10:30' },
        { label: '11:00 AM', value: '11:00' },
        { label: '11:30 AM', value: '11:30' },
        { label: '12:00 PM', value: '12:00' },
        { label: '02:00 PM', value: '14:00' },
        { label: '02:30 PM', value: '14:30' },
        { label: '03:00 PM', value: '15:00' },
    ];

    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    function updateSubmitButton() {
        submitBtn.disabled = !(dateInput.value && timeInput.value);
    }

    function renderCalendar() {
        daysGrid.innerHTML = '';
        monthYearTitle.textContent = `${months[currentMonth]} ${currentYear}`;

        const firstDayIndex = new Date(currentYear, currentMonth, 1).getDay();
        const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();
        const today = new Date();
        today.setHours(0,0,0,0);

        // Inject empty spaces for baseline weekday positioning offset alignment
        for (let i = 0; i < firstDayIndex; i++) {
            const emptyDiv = document.createElement('div');
            daysGrid.appendChild(emptyDiv);
        }

        // Generate date block DOM node loops
        for (let day = 1; day <= totalDays; day++) {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn date-btn rounded-circle d-flex align-items-center justify-content-center mx-auto';
            
            const span = document.createElement('span');
            span.className = 'fw-semibold';
            span.textContent = day;
            button.appendChild(span);

            const processingDate = new Date(currentYear, currentMonth, day);
            processingDate.setHours(0,0,0,0);

            if (processingDate < today) {
                button.disabled = true;
                button.classList.add('btn-light', 'text-black-50');
            } else if (selectedDay === day) {
                button.classList.add('btn-primary', 'shadow');
            } else {
                button.classList.add('btn-light');
            }

            button.addEventListener('click', function(e) {
                e.preventDefault();
                selectedDay = day;
                
                // Format directly into the hidden execution targeting node
                const monthStr = String(currentMonth + 1).padStart(2, '0');
                const dayStr = String(day).padStart(2, '0');
                dateInput.value = `${currentYear}-${monthStr}-${dayStr}`;
                
                // Track mutations logging statements
                console.log(`Selected Date: ${dateInput.value}`);
                
                // Clear active time values during sequence adjustments
                timeInput.value = ''; 
                
                renderCalendar();
                renderTimeSlots();
                updateSubmitButton();
            });

            daysGrid.appendChild(button);
        }
    }

    function renderTimeSlots() {
        slotsGrid.innerHTML = '';

        times.forEach(time => {
            const col = document.createElement('div');
            col.className = 'col-6';

            const button = document.createElement('button');
            button.type = 'button';
            button.className = `btn w-100 py-3 fw-medium ${timeInput.value === time.value ? 'btn-primary' : 'btn-outline-secondary'}`;
            
            const span = document.createElement('span');
            span.textContent = time.label;
            button.appendChild(span);

            button.addEventListener('click', function(e) {
                e.preventDefault();
                timeInput.value = time.value;
                
                console.log(`Selected Time: ${timeInput.value} | Target Date: ${dateInput.value}`);
                
                renderTimeSlots();
                updateSubmitButton();
            });

            col.appendChild(button);
            slotsGrid.appendChild(col);
        });
    }

    prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
        } else {
            currentMonth--;
        }
        selectedDay = null;
        dateInput.value = '';
        timeInput.value = '';
        renderCalendar();
        renderTimeSlots();
        updateSubmitButton();
    });

    nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
        } else {
            currentMonth++;
        }
        selectedDay = null;
        dateInput.value = '';
        timeInput.value = '';
        renderCalendar();
        renderTimeSlots();
        updateSubmitButton();
    });

    doctorSelect.addEventListener('change', function() {
        selectedDay = null;
        dateInput.value = '';
        timeInput.value = '';
        renderCalendar();
        renderTimeSlots();
        updateSubmitButton();
    });

    // Invocations loop initialization triggers
    renderCalendar();
    renderTimeSlots();
});
</script>