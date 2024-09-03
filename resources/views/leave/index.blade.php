@extends('admin.layouts.adminmaster')
@section('adminTitle')
Leave
@stop
@section('adminContent')
<div class="container mt-2">
    <h2>Manage Leave Requests</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->employee->name }}</td>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->reason }}</td>
                <td>
                    {{ $leave->status == 1 ? 'Approve' : ($leave->status == 0 ? 'Reject' : '') }}
                </td>

                <td>
                    <form action="{{ route('admin.leave.update', $leave->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <select name="status" class="form-control" required>
                            <option value="1" {{ $leave->status == 1 ? 'selected' : '' }}>Approve</option>
                            <option value="0" {{ $leave->status == 0 ? 'selected' : '' }}>Reject</option>
                        </select>


                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection