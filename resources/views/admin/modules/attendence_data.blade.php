@extends('admin.layouts.adminmaster')
@section('adminTitle')
Attendence
@stop
@section('adminContent')
<header class="d-flex justify-content-between align-items-center">
  <div class="p-4 align-self-start">
    <img src="logo.png" alt="" width="100">
  </div>
  <div class="card header bg_p_primary">
    <form action="{{ route('admin.attendance.employee.search') }}" method="GET">
      @csrf
      <input type="search" name="search" class="form-control" placeholder="Search by name/id" value="{{ request('search') }}">
    </form>
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
          <td>{{@$att->employee->em_id}}</td>
          <td>
            <button class="btn toggle-attendance {{ $att->status == 1 ? 'bg_p_primary' : 'btn-danger' }}" data-empid="{{@$att->employee->id}}" data-id="{{ $att->id }}">
              {{ $att->status == 1 ? 'Present' : 'Absent' }}
            </button>
          </td>

          <td>{{$att->date}}</td>
        </tr>
        @endforeach
      </tbody>
      {{$data->links() }}
    </table>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-attendance').forEach(function(button) {
      button.addEventListener('click', function() {
        var attendanceId = this.getAttribute('data-id');
        var empId = this.getAttribute('data-empid');
        var button = this;
        fetch('/attendance/toggle-status', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          attendanceId: attendanceId,
          empId: empId  // Include employee ID in the request body
        })
      })
        .then(response => response.json())
        .then(data => {
        
          if (data.status === 'success') {
            if (data.newStatus == 1) {
              button.textContent = 'Present';
              button.classList.remove('btn-danger');
              button.classList.add('bg_p_primary');
            } else {
              button.textContent = 'Absent';
              button.classList.remove('bg_p_primary');
              button.classList.add('btn-danger');
            }
          } else {
            alert(data.message);
          }
        })
        .catch(error => console.error('Error:', error));

      });
    });
  });
</script>
@stop