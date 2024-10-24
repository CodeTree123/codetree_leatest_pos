@extends('admin.layouts.adminmaster')
@section('adminTitle')
Employee Details
@stop
@section('adminContent')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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
    <div class="card border-0 shadow" style="min-height: 270px;">
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
                <div class="table-responsive p-2" >
                <table class="table table-hover mb-0" id="payrollTable">
                    <thead class="bg-light sticky-top">
                        <tr>
                            <th>Pay Date</th>
                            <th>Basic Salary</th>
                            <th>Total Deductions</th>
                            <th>Total Bonus</th>
                            <th>Net Salary</th>
                        </tr>
                    </thead>
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
                <div class="table-responsive p-2" >
                <table class="table table-hover mb-0" id="deductionTable">
                    <thead class="bg-light sticky-top">
                        <tr>
                            <th>Date</th>
                            <th>Tax</th>
                            <th>Social Security</th>
                            <th>Other</th>
                        </tr>
                    </thead>
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
                <div class="table-responsive p-2" >
                    <table class="table table-hover mb-0" id="bonusTable">
                        <thead class="bg-light sticky-top">
                            <tr>
                                <th class="px-3">Date</th>
                                <th class="px-3">Amount</th>
                                <th class="px-3">Description</th>
                            </tr>
                        </thead>
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
        <div class="table-responsive p-2">
            <table class="table table-hover mb-0" id="attendanceTable">
                <thead class="bg-light sticky-top">
                    <tr>
                        <th class="px-3">Date</th>
                        <th class="px-3">Status</th>
                        <th class="px-3">Late Time</th>
                    </tr>
                </thead>
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
$(document).ready(function () {
    // Function to get the current month filter value
    function getMonthFilter() {
        return $('#monthFilter').val();
    }

    // Initialize the Deductions DataTable
    const deductionTable = $('#deductionTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('admin.employeeWorkingDetails.employee.deductions') }}',
            data: function(d) {
                d.employee_id = '{{ $employee['id'] }}';
                d.month = getMonthFilter();
            }
        },
        columns: [
            { data: 'deduction_date', name: 'deduction_date' },
            { data: 'tax', name: 'tax' },
            { data: 'social_security', name: 'social_security' },
            { data: 'other_deductions', name: 'other_deductions' },
        ],
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
    });

    // Initialize the Payroll DataTable
    const payrollTable = $('#payrollTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('admin.employeeWorkingDetails.employee.payrolls') }}',
            data: function(d) {
                d.employee_id = '{{ $employee['id'] }}';
                d.month = getMonthFilter();
            }
        },
        columns: [
            { data: 'pay_date', name: 'pay_date' },
            { data: 'basic_salary', name: 'basic_salary' },
            { data: 'total_deductions', name: 'total_deductions' },
            { data: 'total_bonuses', name: 'total_bonuses' },
            { data: 'net_salary', name: 'net_salary' },
        ],
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
    });

    // Initialize the Bonuses DataTable
    const bonusTable = $('#bonusTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('admin.employeeWorkingDetails.employee.bonuses') }}',
            data: function(d) {
                d.employee_id = '{{ $employee['id'] }}';
                d.month = getMonthFilter();
            }
        },
        columns: [
            { data: 'date_given', name: 'date_given' },
            { data: 'amount', name: 'amount' },
            { data: 'description', name: 'description' },
        ],
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
    });

    // Initialize the Attendance DataTable
    const attendanceTable = $('#attendanceTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('admin.employeeWorkingDetails.employee.attendances') }}',
            data: function(d) {
                d.employee_id = '{{ $employee['id'] }}';
                d.month = getMonthFilter();
            }
        },
        columns: [
            { data: 'date', name: 'date' },
            { data: 'status', name: 'status', render: function (data) {
                return data === 1
                    ? '<span class="badge bg-success">Present</span>'
                    : '<span class="badge bg-danger">Absent</span>';
            }},
            { data: 'late_time', name: 'late_time' },
        ],
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
    });

    // Add change event listener to month filter
    $('#monthFilter').on('change', function() {
        // Reload all tables when month filter changes
        deductionTable.ajax.reload();
        payrollTable.ajax.reload();
        bonusTable.ajax.reload();
        attendanceTable.ajax.reload();
    });
});
</script>

<!-- <script>
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
</script> -->

@stop





