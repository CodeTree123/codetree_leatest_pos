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
<button class="btn btn-primary btn-sm mb-2" id="finalizeDeductions">
                    <i class="fas fa-check"></i> Finalize Payroll for the month
</button>

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
                <h5 class="mb-0">Payroll Information</h5>
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
                            <th>Pay Status<th>
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
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Is Excused?</th>
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
                                <th >Date</th>
                                <th >Amount</th>
                                <th >Description</th>
                                <th >Canceled</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Attendance -->
<div class="col-lg-6 mb-4">
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
                        <label for="deduction_amount" class="form-label" required>Deduction Amount</label>
                        <input type="number" step="0.01" class="form-control" id="deduction_amount" name="deduction_amount" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label" required>Description</label>
                        <textarea class="form-control" id="deduction_description" name="deduction_description" rows="3"></textarea>
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
        { data: 'deduction_amount', name: 'deduction_amount' },
        { data: 'description', name: 'description' },
        {
            data: 'excused_status', // Add new column for excused status
            name: 'excused_status',
            orderable: false,
            searchable: false,
        }
    ],
    pageLength: 5,
    lengthMenu: [5, 10, 25, 50],
});



    $('#deductionTable').on('change', '.excuse-check', function () {
    const deductionId = $(this).data('id');
    const isExcused = $(this).is(':checked') ? 1 : 0;

    $.ajax({
        url: '{{ route('admin.employeeWorkingDetails.employee.deductions.toggleExcuse') }}',
        method: 'POST',
        data: {
            deduction_id: deductionId,
            is_excused: isExcused,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
        
        },
        error: function (xhr) {
            alert('Failed to update status.');
        }
     });
   });


   $('#finalizeDeductions').on('click', function () {
    const employeeId = '{{ $employee['id'] }}';
    const month = getMonthFilter();

    $.ajax({
        url: '{{ route('admin.employeeWorkingDetails.employee.deductions.deductionFinalize') }}',
        method: 'POST',
        data: {
            employee_id: employeeId,
            month: month,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            if (response.success) {
                toastr.success(response.message); // Display success message
                deductionTable.ajax.reload(); // Reload DataTables
                payrollTable.ajax.reload();
            } else {
                toastr.error(response.message); // Display error message
            }
        },
        error: function (xhr) {
            alert('Failed to finalize deductions.');
        }
    });
});

const payrollTable = $('#payrollTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route('admin.employeeWorkingDetails.employee.payrolls') }}',
        data: function (d) {
            d.employee_id = '{{ $employee['id'] }}';
            d.month = getMonthFilter();
        }
    },
    columns: [
        {
            data: 'pay_date',
            name: 'pay_date',
            render: function (data, type, row) {
                return data ? data : "Not paid yet";
            }
        },
        { data: 'basic_salary', name: 'basic_salary' },
        { data: 'total_deductions', name: 'total_deductions' },
        { data: 'total_bonuses', name: 'total_bonuses' },
        { data: 'net_salary', name: 'net_salary' },
        {
            data: 'pay_date',
            name: 'action',
            render: function (data, type, row) {
                if (!data) {
                    return `<button class="btn btn-primary btn-pay" data-id="${row.id}">Pay</button>`;
                } else {
                    return `<span class="badge bg-success text-light">Paid</span>`;
                }
            }
        }
    ],
    pageLength: 5,
    lengthMenu: [5, 10, 25, 50]
});

// Handle pay button click

let payrollIdToPay = null;

// Trigger the confirmation modal on pay button click
$('#payrollTable').on('click', '.btn-pay', function () {
    payrollIdToPay = $(this).data('id'); // Store the payroll ID
    $('#confirmationModal').modal('show'); // Show the confirmation modal
});

// Handle the confirmation button inside the modal
$('#confirmPay').on('click', function () {
    if (!payrollIdToPay) return;

    // Send the AJAX request to mark the salary as paid
    $.ajax({
        url: '{{ route('admin.employeeWorkingDetails.employee.payroll.markAsPaid') }}',
        method: 'POST',
        data: {
            id: payrollIdToPay,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            $('#confirmationModal').modal('hide'); // Close the modal

            if (response.success) {
                toastr.success('The salary has been marked as paid!');
                payrollTable.ajax.reload(); // Reload the DataTable
                deductionTable.ajax.reload();
                bonusTable.ajax.reload();
            } else {
                toastr.error('Something went wrong. Please try again.');
            }
        },
        error: function () {
            $('#confirmationModal').modal('hide');
            toastr.error('An error occurred while processing the request.');
        }
    });
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
            {
            data: 'canceled_status', // Add new column for excused status
            name: 'canceled_status',
            orderable: false,
            searchable: false,
        }
        ],
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
    });



    $('#bonusTable').on('change', '.cancel-check', function () {
    const bonusId = $(this).data('id');
    const isCanceled = $(this).is(':checked') ? 1 : 0;

    $.ajax({
        url: '{{ route('admin.employeeWorkingDetails.employee.deductions.toggleCancel') }}',
        method: 'POST',
        data: {
            bonus_id: bonusId,
            is_canceled: isCanceled,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
        
        },
        error: function (xhr) {
            alert('Failed to update status.');
        }
     });
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
                    ? '<span class="badge bg-success text-light">Present</span>'
                    : '<span class="badge bg-danger text-light">Absent</span>';
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

<script>
        document.addEventListener('DOMContentLoaded', function() {
        const monthFilter = document.getElementById('monthFilter');
        const selectedMonth = localStorage.getItem('selectedMonth'); // Retrieve from localStorage

        if (selectedMonth) {
            monthFilter.value = selectedMonth; // Set the selected value
        }

        // Listen for changes in the dropdown
        monthFilter.addEventListener('change', function() {
            localStorage.setItem('selectedMonth', monthFilter.value); // Save selected month to localStorage
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





