@extends('admin.layouts.adminmaster')

@section('adminTitle', 'Payroll Management')

@section('adminContent')

<header class="d-flex justify-content-between align-items-center">
    <div class="p-4">
        <h3>Payroll Management</h3>
    </div>
    <div class="p-4">
        <form action="{{ route('admin.payroll.generate.all') }}" method="POST">
            @csrf
            <button type="submit" class="btn bg_p_primary">Generate Payroll for All Employees</button>
        </form>
    </div>

</header>

<section class="mx-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="bg_p_primary">
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Basic Salary</th>
                <th>Total Deductions</th>
                <th>Total Bonuses</th>
                <th>Net Salary</th>
                <th>Pay Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 0; ?>
            @foreach($payrolls as $payroll)
            <?php $counter++; ?>
            <tr>
                <td>{{ $counter }}</td>
                <td>{{ $payroll->employee->name }}</td>
                <td>${{ number_format($payroll->basic_salary, 2) }}</td>
                <td>${{ number_format($payroll->total_deductions, 2) }}</td>
                <td>${{ number_format($payroll->total_bonuses, 2) }}</td>
                <td>${{ number_format($payroll->net_salary, 2) }}</td>
                <td>{{ $payroll->pay_date }}</td>
                <td>
                    <form action="{{ route('admin.payroll.generate', $payroll->employee->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn bg_p_primary">Regenerate Payroll</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection