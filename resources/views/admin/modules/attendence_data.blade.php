@extends('admin.layouts.adminmaster')
@section('adminTitle')
Attendence
@stop
@section('adminContent')
<header class="d-flex justify-content-between align-items-center">
  <div class="p-4 align-self-start">
    <img src="logo.png" alt="" width="100">
  </div>
  <div class=" card header bg_p_primary">
    <input type="search" name="search" class="form-control" placeholder="Search by name/id">
  </div>
  <div class=" card header bg_p_primary">
    <h3 class="m-3">
      Employee Attendence Data
    </h3>
  </div>
</header>

<section>

    <div class="mx-5">
      <table class="table table-striped  ">
        <thead>
          <tr>
            <th scope="col">S/l</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Employee ID</th>
            <th scope="col">Attendence</th>
            <th scope="col">date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key=>$att)
          <tr>
              <th scope="row">{{$key +1}}</th>
              <td>{{$att->employee_name}}</td>
              <td>{{$att->employee_id}}</td>
              <td>
                @if($att->status == 1)
                <button class="btn bg_p_primary">Present</button>
                @else
                <button class="btn bg_p_primary">Absent</button>
                @endif
              </td>
              <td>{{$att->date}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
      </div>
      <div class="modal-body">
        <form class="row g-3" action="{{route('admin.add_attendence')}}" method="POST">
          @csrf
          <div class="col-md-6">
            <label for="ename" class="form-label">Employee Name</label>
            <input type="text" class="form-control" id="ename" name="ename">
          </div>
          <div class="col-md-6">
            <label for="eID" class="form-label">Employee ID</label>
            <input type="text" class="form-control" id="eID" name="eID">
          </div>


          <div class="col-md-6">
            <label for="e_S_Date" class="form-label">Employee Starting Date</label>
            <input type="date" class="form-control" id="e_S_Date" name="e_S_Date">
          </div>

          <!-- <div class="col-md-6">
            <label for="e_role" class="form-label">Employee Role</label>
            <input type="text" class="form-control" id="e_role" name="e_role">
          </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>

    </div>
  </div>
</div>
@stop