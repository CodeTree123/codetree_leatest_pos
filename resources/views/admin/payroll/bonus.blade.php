@extends('admin.layouts.adminmaster')
@section('adminTitle')
Employee Bonus
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
    <div class="text-dark px-0">
        <p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.userList')}}" class="active-slink">Bonuses</a><span class="top-date">Total Employee Bonus:</span></p>
    </div>
</div>

<div class="container-fluid p-3">
    <div class="box">
        <div class="box-header">
            <div class="box-icon-left border-right" style="height:100%">
                <p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
            </div>
            <h2 class="blue task-label">Employee Bonuses</h2>
            <div class="box-icon border-left" style="height:100%">
                <div class="dropdown mt-0">
                    <p class="task-btn text_p_primary" title="Actions">
                        <i class="fa fa-th-list"></i>
                    </p>
                    <div class="task-menu p-2">
                        <a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target="#userModal">
                            <i class="fa-fw fa fa-plus-circle"></i> Add New Employee Bonus
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
                                <th class="font-weight-bold" scope="col">Bonus Amount</th>
                                <th class="font-weight-bold" scope="col">Description</th>
                                <th class="font-weight-bold" scope="col">Given Date</th>
                                <th class="font-weight-bold" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; ?>
                            @foreach($bonuses as $user)
                            <?php $counter++; ?>
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$user->employee->em_id}}</td>
                                <td>{{$user->employee->name}}</td>
                                <td>{{$user->employee->email}}</td>
                                <td>{{$user->amount}}</td>
                                <td>{{$user->description}}</td>
                                <td>{{$user->date_given}}</td>
                                <td style="width:120px;">
                                    <button class="btn  bg_secondary_teal p-1 px-2 mb-0 v-btn" style="font-size: 13px;cursor:pointer;" title="User Details" value="{{$user->id}}"> <i class="fa-fw fa fa-eye"></i></button>
                                    <button class="btn bg_p_primary p-1 mb-0 px-2 edit-btn" value="{{$user->id}}" style="font-size: 13px;cursor:pointer;" title="Edit User"> <i class="fa fa-edit"></i></button>
                                    <div class="del-modal <?php echo 'modal' . $counter ?>">
                                        <p><b>Record delete confirmation.</b></p>
                                        <p>Are you want to really delete ?</p>
                                        <button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
                                        <form method="post" action="{{route('admin.people.deleteEmployee')}}" style="float:right;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button type="submit" class="btn btn-danger py-1">Confirm</button>
                                        </form>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $(".<?php echo 'btn' . $counter ?>").click(function() {
                                                $(".<?php echo 'modal' . $counter ?>").show('fadeOut');

                                            });
                                            $(".del-close").click(function() {
                                                $(".del-modal").hide('fadeIn');

                                            });
                                        });
                                    </script>
                                    <p class="btn btn-danger mb-0 p-1 px-2 del-btn <?php echo 'btn' . $counter ?>" style="font-size: 13px;relative;cursor:pointer;" title="Delete user"> <i class="fa fa-trash"></i></p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Add New Bonus</h2>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body p-3">
                <form method="post" action="{{route('admin.employeeBonus.add')}}">
                    @csrf
                    <div class="form-group">
                        <label>Select Employee</label>
                        <select name="employee_id" class="form-control" id="">
                            @foreach($employees as $emp)
                            <option value="{{$emp->id}}">{{$emp->name}}({{$emp->email}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="numeric" class="form-control" placeholder="Amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" id=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        @php
                        $date = \Carbon\Carbon::now()->format('Y-m-d');
                        @endphp
                        <input type="text" class="form-control" value="{{$date}}" name="date_given">
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn bg_p_primary" value="Add New Employee Bonus">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- view user info -->
<div id="viewEmployeeModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Employee Information</h2>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body" id="viewInfo">

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>	 -->
            </div>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Update Employee</h2>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body p-3">
                <!-- <p style="font-weight: bold;">User Role: <span id="user_role_info"></span> </p> -->
                <form method="post" action="{{route('admin.people.employeeUpdate')}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="emp_id" id="emp_id">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="position" id="position">
                    </div>
                    <div class="form-group">
                        <label>Hire date</label>
                        <input type="text" class="form-control" name="hire_date" id="hire_date">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">

                <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.v-btn', function() {
            var id = $(this).val();
            // console.log(id);
            $("#viewEmployeeModal").modal('show');
            $.ajax({
                type: "GET",
                url: "employee-view/" + id,
                success: function(response) {
                    // console.log(response.User);
                    $("#viewInfo").html(" ");
                    $("#viewInfo").append(
                        '<p>Name: ' + response.Employee.name + '</p>\
							<p>Position: ' + response.Employee.position + '</p>\
							<p>Employee Id: ' + response.Employee.em_id + '</p>\
							<p>Email: ' + response.Employee.email + '</p>\
							<p>Hire Date: ' + response.Employee.hire_date + '</p>\
							'
                    );

                }
            });

        });
        $(document).on('click', '.edit-btn', function() {
            var id = $(this).val();
            console.log(id);
            $("#editEmployeeModal").modal('show');
            $.ajax({
                type: "GET",
                url: "employee-edit/" + id,
                success: function(response) {
                    var a = response.employee;
                    $("#emp_id").val(id);
                    $("#name").val(a.name);
                    $("#email").val(a.email);
                    $("#position").val(a.position);
                    $("#hire_date").val(a.hire_date);
                    $("#status").val(a.status);
                }
            });
        });

    });
</script>

@stop