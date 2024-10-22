@extends('admin.layouts.adminmaster')
@section('adminTitle')
Employee Details
@stop
@section('adminContent')

<div class="container-fluid py-4">
    <h1 class="mb-4">Employee Details</h1>

    <div class="row">
        <!-- Employee Information -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong>Name:</strong> {{ $employee['name'] }}</p>
                            <p><strong>Employee ID:</strong> {{ $employee['em_id'] }}</p>
                            <p><strong>Position:</strong> {{ $employee['position'] }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Email:</strong> {{ $employee['email'] }}</p>
                            <p><strong>Hire Date:</strong> {{ $employee['hire_date'] }}</p>
                            <p><strong>Basic Salary:</strong> ${{ number_format($employee['basic_salary'], 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Payroll Information -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0">Payroll Information</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>Pay Date</th>
                                    <th>Basic Salary</th>
                                    <th>Total Deductions</th>
                                    <th>Total Bonus</th>
                                    <th>Net Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee['payrolls'] as $payroll)
                                <tr>
                                    <td>{{ $payroll['pay_date'] }}</td>
                                    <td>${{ number_format($payroll['basic_salary'], 2) }}</td>
                                    <td>${{ number_format($payroll['total_deductions'], 2) }}</td>
                                    <td>${{ number_format($payroll['total_bonuses'], 2) }}</td>
                                    <td>${{ number_format($payroll['net_salary'], 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Deductions -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-danger text-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Deductions</h5>
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addDeductionModal">
                        <i class="fas fa-plus"></i> Add Deduction
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>Tax</th>
                                    <th>Social Security</th>
                                    <th>Other</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee['deductions']->take(3) as $deduction)
                                <tr>
                                    <td>${{ number_format($deduction['tax'] ?? 0, 2) }}</td>
                                    <td>${{ number_format($deduction['social_security'] ?? 0, 2) }}</td>
                                    <td>${{ number_format($deduction['other_deductions'] ?? 0, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($employee['deductions']->count() > 3)
                        <button class="btn btn-outline-danger btn-sm mt-2 show-more" data-target="deductions">Show More</button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Bonuses -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Bonuses</h5>
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addBonusModal">
                        <i class="fas fa-plus"></i> Add Bonus
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee['bonuses']->take(3) as $bonus)
                                <tr>
                                    <td>{{ $bonus['date_given'] }}</td>
                                    <td>${{ number_format($bonus['amount'], 2) }}</td>
                                    <td>{{ $bonus['description'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($employee['bonuses']->count() > 3)
                        <button class="btn btn-outline-info btn-sm mt-2 show-more" data-target="bonuses">Show More</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Attendance -->
    <div class="card border-0 shadow mb-4">
        <div class="card-header bg-warning text-dark py-3">
            <h5 class="mb-0">Attendance</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Late Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employee['store_attendances']->take(3) as $attendance)
                        <tr>
                            <td>{{ $attendance['date'] }}</td>
                            <td>
                                @if($attendance['status'] == 1)
                                    <span class="badge bg-success">Present</span>
                                @else
                                    <span class="badge bg-danger">Absent</span>
                                @endif
                            </td>
                            <td>{{ $attendance['late_time'] }} minutes</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($employee['store_attendances']->count() > 3)
                <button class="btn btn-outline-warning btn-sm mt-2 show-more" data-target="attendance">Show More</button>
            @endif
        </div>
    </div>
</div>

<!-- Add Deduction Modal -->
<div class="modal fade" id="addDeductionModal" tabindex="-1" aria-labelledby="addDeductionModalLabel" aria-hidden="true">
    <!-- ... (modal content remains the same) ... -->
</div>

<!-- Add Bonus Modal -->
<div class="modal fade" id="addBonusModal" tabindex="-1" aria-labelledby="addBonusModalLabel" aria-hidden="true">
    <!-- ... (modal content remains the same) ... -->
</div>

<style>
    /* ... (previous styles remain the same) ... */
    .show-more {
        transition: all 0.3s ease-in-out;
    }
    .show-more:hover {
        transform: translateY(-2px);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const showMoreButtons = document.querySelectorAll('.show-more');
    showMoreButtons.forEach(button => {
        button.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            const table = this.closest('.card-body').querySelector('table');
            const hiddenRows = table.querySelectorAll('tr.d-none');
            
            hiddenRows.forEach(row => row.classList.remove('d-none'));
            this.style.display = 'none';
        });
    });
});
</script>

@stop





