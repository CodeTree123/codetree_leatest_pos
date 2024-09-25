@extends('admin.layouts.adminmaster')
@section('adminTitle')
Attendence
@stop
@section('adminContent')
<header class="d-flex justify-content-between align-items-center">
  <div class="p-4 align-self-start">
    <img src="logo.png" alt="" width="100">
  </div>
  <div class="text-center pe-4">
    <h3 class="">
      Employee Attendence System
    </h3>
  </div>
</header>

<section>
  <div class="d-flex justify-content-between   p-3 border m-4">
    <!-- Button trigger modal -->
    <button type="button" class="btn bg_p_primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Employee for Attendance
    </button>
    <!-- <button class="btn btn-info text-white">View All</button> -->
  </div>
  <div class="date-box p-3 border m-4">
    <!-- <h2 class="text-center">Date: {{$date}}</h2> -->
  </div>
  <div class="mx-5">
    <table class="table table-striped  ">
      <thead>
        <tr>
          <th scope="col">S/l</th>
          <th scope="col">Employee Name</th>
          <th scope="col">Employee ID</th>
          <th scope="col">Starting Date</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($employees as $key=>$att)
        <tr>
          <th scope="row">{{$key +1}}</th>
          <td>{{$att->name}}</td>
          <td>{{$att->em_id}}</td>
          <td>{{$att->hire_date}}</td>
          <td>
            @if($att->status == 0)
            <button class="btn bg_p_primary">Inactive</button>
            @else
            <button class="btn bg_p_primary">Active</button>

            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$employees-> links()}}
  </div>
  <div class="text-center mt-5">
    <!-- <input type="submit" class="btn btn-success" value="Submit"> -->

  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <form class="row g-3" action="{{route('admin.add_attendence')}}" method="POST">
          @csrf
          <div class="col-md-6">
            <label for="ename" class="form-label">Select Employee</label>
            <select class="form-control" name="emp_id">
              @foreach($employees as $emp)
              <option value="{{$emp->id}}">{{$emp->name}}</option>
              @endforeach
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg_secondary_grey" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn bg_p_primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop