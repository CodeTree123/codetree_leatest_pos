@extends('admin.layouts.adminmaster')
@section('adminTitle')
Leave
@stop
@section('adminContent')
<div class="container mt-2">
    <h2>Apply for Leave</h2>

    <form action="{{ route('admin.leave.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Employee</label>
            <select name="emp_id" id="" class="form-control">
                @foreach($employees as $emp)
                <option value="{{$emp->id}}">{{$emp->name}}({{$emp->email}})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reason">Reason for Leave</label>
            <textarea name="reason" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn bg_p_primary w-100">Submit</button>
    </form>
</div>
@endsection