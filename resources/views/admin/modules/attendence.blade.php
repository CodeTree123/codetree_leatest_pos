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
    @if(session()->has('Success'))
    <div class="alert alert-success">
      {{ session()->get('Success') }}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
      {{ session()->get('error') }}
    </div>
    @endif
    <h3 class="">
      Employee Attendence System
    </h3>
  </div>
</header>

<section>

  <form action="{{route('storeAttend')}}" method="post">
    @csrf
    <div class="date-box p-3 border m-4">
      <h2 class="text-center">Date: {{$date}}</h2>
    </div>
    <div class="mx-5">
      <table class="table table-striped  ">
        <thead>
          <tr>
            <th scope="col">S/l</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Employee ID</th>
            <th scope="col">Attendence</th>
          </tr>
        </thead>
        <tbody>
          @foreach($attendance as $key=>$att)
          <tr>
            <th scope="row">{{$key +1}}</th>
            <td><input type="text" class="d-none" name="employee_name[]" value="{{@$att->name}}">{{@$att->name}}</td>
            <td><input type="text" class="d-none" name="employee_id[]" value="{{@$att->id}}">{{@$att->em_id}}</td>
            <td>

              <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status[]">
                <option value="1">Present</option>
                <option value="0">Absent</option>
              </select>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

    <div class="text-center mt-5">
      <input type="submit" class="btn bg_p_primary" value="Submit">
    </div>
  </form>
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