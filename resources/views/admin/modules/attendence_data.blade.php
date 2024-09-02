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
            <button class="btn toggle-attendance {{ $att->status == 1 ? 'bg_p_primary' : 'btn-danger' }}" data-id="{{ $att->id }}">
              {{ $att->status == 1 ? 'Present' : 'Absent' }}
            </button>
          </td>

          <td>{{$att->date}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Attach click event to buttons with class 'toggle-attendance'
    document.querySelectorAll('.toggle-attendance').forEach(function(button) {
      button.addEventListener('click', function() {
        // Get the attendance ID from data-id attribute
        var attendanceId = this.getAttribute('data-id');
        var button = this;

        // Send AJAX request to toggle status
        fetch('/attendance/toggle-status/' + attendanceId, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              // Update the button text based on new status
              if (data.newStatus == 1) {
                button.textContent = 'Present';
              } else {
                button.textContent = 'Absent';
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