@extends('admin.layouts.adminmaster')
@section('adminTitle')
{{$pageTitle}}
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
    <div class="text-dark px-0">
        <p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.userList')}}" class="active-slink">Employees</a><span class="top-date">Total Employee: {{$total}}</span></p>
    </div>
</div>

<div class="container-fluid p-3">
    <div class="box">
        <div class="box-header">
            <div class="box-icon-left border-right" style="height:100%">
                <p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
            </div>
            <h2 class="blue task-label">Employees Monthly Data Track</h2>
            <div class="box-icon border-left" style="height:100%">
                <div class="dropdown mt-0">
                    <p class="task-btn text_p_primary" title="Actions">
                        <i class="fa fa-th-list"></i>
                    </p>
                    <div class="task-menu p-2">
                        <a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target="#userModal">
                            <i class="fa-fw fa fa-plus-circle"></i> Add New Employee
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-lg-12">
                    <p class="introtext">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
                    <table class="table table-bordered table-hover">
                        <thead class="bg_p_primary">
                            <tr>
                                <th class="font-weight-bold" scope="col">#</th>
                                <th class="font-weight-bold" scope="col">Employee ID</th>
                                <th class="font-weight-bold" scope="col">Name</th>
                                <th class="font-weight-bold" scope="col">Email</th>
                                <th class="font-weight-bold" scope="col">Position</th>
                                <th class="font-weight-bold" scope="col">Hire Date</th>
                                <th class="font-weight-bold" scope="col">Basic Salary</th>
                                <th class="font-weight-bold" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; ?>
                            @foreach($employees as $user)
                            <?php $counter++; ?>
                            <tr onclick="redirectToEmployee('{{ route('admin.payroll.employeeWorkingDetails', ['id' => $user->id]) }}')" style="cursor: pointer;">
                                <td>{{$counter}}</td>
                                <td>{{$user->em_id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->position}}</td>
                                <td>{{$user->hire_date}}</td>
                                <td>{{$user->basic_salaries->basic_salary}}</td>
                                <td style="text-align: center;">
                                    @if($user->status==1)
                                    <p class="badge  bg_secondary_teal">Active</p>
                                    @else
                                    <p class="badge badge-danger">Inactive</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function redirectToEmployee(url) {
    window.location.href = url;
}
</script>

@stop