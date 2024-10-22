@extends('admin.layouts.adminmaster')
@section('adminTitle')
Employee Details
@stop
@section('adminContent')

<div class="container-fluid py-4">
    <h1 class="mb-4">Employee Details</h1>
<!-- Month Filter Dropdown -->
<div class="row mb-3">
    <div class="col-md-3">
        <select class="form-select" id="monthFilter">
            <option value="">Select Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
    </div>
</div>
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
                <h5 class="mb-0">Payroll Information(On going)</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="height: 150px;">
                    <table class="table table-hover mb-0" id="payrollTable">
                        <thead class="bg-light sticky-top">
                            <tr>
                                <th class="px-3">Pay Date</th>
                                <th class="px-3">Basic Salary</th>
                                <th class="px-3">Total Deductions</th>
                                <th class="px-3">Total Bonus</th>
                                <th class="px-3">Net Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee['payrolls']->sortByDesc('id') as $payroll)
                            <tr>
                                <td class="px-3">{{ $payroll['pay_date'] }}</td>
                                <td class="px-3">${{ number_format($payroll['basic_salary'], 2) }}</td>
                                <td class="px-3">${{ number_format($payroll['total_deductions'], 2) }}</td>
                                <td class="px-3">${{ number_format($payroll['total_bonuses'], 2) }}</td>
                                <td class="px-3">${{ number_format($payroll['net_salary'], 2) }}</td>
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
                <button class="btn btn-light btn-sm" id="adddeduction">
                    <i class="fas fa-plus"></i> Add Deduction
                </button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="height: 150px;">
                    <table class="table table-hover mb-0" id="deductionTable">
                        <thead class="bg-light sticky-top">
                            <tr>
                                <th class="px-3">Date</th>
                                <th class="px-3">Tax</th>
                                <th class="px-3">Social Security</th>
                                <th class="px-3">Other</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee['deductions']->sortByDesc('id') as $deduction)
                            <tr>
                                <td class="px-3">{{ $deduction['deduction_date'] }}</td>
                                <td class="px-3">${{ number_format($deduction['tax'] ?? 0, 2) }}</td>
                                <td class="px-3">${{ number_format($deduction['social_security'] ?? 0, 2) }}</td>
                                <td class="px-3">${{ number_format($deduction['other_deductions'] ?? 0, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bonuses -->
    <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Bonuses</h5>
                <button class="btn btn-light btn-sm" id="addbonuse">
                    <i class="fas fa-plus"></i> Add Bonus
                </button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="height: 150px;">
                    <table class="table table-hover mb-0" id="bonusTable">
                        <thead class="bg-light sticky-top">
                            <tr>
                                <th class="px-3">Date</th>
                                <th class="px-3">Amount</th>
                                <th class="px-3">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee['bonuses']->sortByDesc('id') as $bonus)
                            <tr>
                                <td class="px-3">{{ $bonus['date_given'] }}</td>
                                <td class="px-3">${{ number_format($bonus['amount'], 2) }}</td>
                                <td class="px-3">{{ $bonus['description'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Attendance -->
<div class="card border-0 shadow mb-4">
    <div class="card-header bg-warning text-dark py-3">
        <h5 class="mb-0">Attendance</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive" style="height: 150px;">
            <table class="table table-hover mb-0" id="attendanceTable">
                <thead class="bg-light sticky-top">
                    <tr>
                        <th class="px-3">Date</th>
                        <th class="px-3">Status</th>
                        <th class="px-3">Late Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee['store_attendances']->sortByDesc('id') as $attendance)
                    <tr>
                        <td class="px-3">{{ $attendance['date'] }}</td>
                        <td class="px-3">
                            @if($attendance['status'] == 1)
                                <span class="badge bg-success">Present</span>
                            @else
                                <span class="badge bg-danger">Absent</span>
                            @endif
                        </td>
                        <td class="px-3">{{ $attendance['late_time'] }} minutes</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Deduction Modal -->
<div class="modal fade" id="addDeductionModal" tabindex="-1" aria-labelledby="addDeductionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="addDeductionModalLabel">Add Deduction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.payroll.deductionsStore') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input name="employee_id" value="{{$employee['id']}}" hidden></input>
                    <div class="mb-3">
                        <label for="tax" class="form-label">Tax Amount</label>
                        <input type="number" step="0.01" class="form-control" id="tax" name="tax" >
                    </div>
                    <div class="mb-3">
                        <label for="social_security" class="form-label">Social Security</label>
                        <input type="number" step="0.01" class="form-control" id="social_security" name="social_security" >
                    </div>
                    <div class="mb-3">
                        <label for="other_deductions" class="form-label">Other Deductions</label>
                        <input type="number" step="0.01" class="form-control" id="other_deductions" name="other_deductions">
                    </div>
                    <div class="mb-3">
                        <label for="deduction_date" class="form-label">Deduction Date</label>
                        <input type="date" class="form-control" id="deduction_date" name="deduction_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save Deduction</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Add Bonus Modal -->
<div class="modal fade" id="addBonusModal" tabindex="-1" aria-labelledby="addBonusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="addBonusModalLabel">Add Bonus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.payroll.bonusesStore') }}" method="POST">
                @csrf
                <div class="modal-body">
                <input name="employee_id2" value="{{$employee['id']}}" hidden></input>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Bonus Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date_given" class="form-label">Date Given</label>
                        <input type="date" class="form-control" id="date_given" name="date_given" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save Bonus</button>
                </div>
            </form>
        </div>
    </div>
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
      $(document).ready(function() {

        $(document).on('click', '#adddeduction', function() {

            $("#addDeductionModal").modal('show');
        })

        $(document).on('click', '#addbonuse', function() {

        $("#addBonusModal").modal('show');
        })
      })
</script>


<script>
    document.getElementById('monthFilter').addEventListener('change', function () {
        const selectedMonth = this.value;
        filterTableByMonth('deductionTable', selectedMonth);
        filterTableByMonth('bonusTable', selectedMonth);
        filterTableByMonth('attendanceTable', selectedMonth);
        filterTableByMonth('payrollTable',selectedMonth);
    });

    function filterTableByMonth(tableId, month) {
        const rows = document.querySelectorAll(`#${tableId} tbody tr`);
        rows.forEach(row => {
            const dateCell = row.cells[0].textContent.trim();
            const rowMonth = dateCell.split('-')[1];  // Extract month from YYYY-MM-DD
            if (month === '' || rowMonth === month) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>

@stop





