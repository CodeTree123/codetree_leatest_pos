@extends('admin.layouts.adminmaster')
@section('adminTitle')
Profit report- Admin Dashboard
@endsection
@section('adminContent')
<style>
    .search_link {
        padding: 5px;
        border-bottom: 1px solid gray;
    }

    input[type=text]:focus {
        border-color: inherit;
        -webkit-box-shadow: none;
        box-shadow: none;
        height: 28px;
        font-size: inherit;
        border-color: rgba(229, 103, 23, 0.8);
        outline-color: gray;
        font-size: 15px;
        text-transform: none;
    }

    a:hover {
        text-decoration: none;
        color: white;
    }
</style>

<div class="col-md-12 mt-5 pt-3 border-bottom">
    <div class="text-dark px-0">
        <p class="mb-1"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Profit Report</a><span class="top-date">Total Profits : {{$revenue}}</span></p>

    </div>
</div>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Weekly Revenue
                </div>
                <div class="car-body text-center">
                    <h2 class="m-3">{{$weeklyRevenue}}.৳</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Todays Revenue
                </div>
                <div class="car-body text-center">
                    <h2 class="m-3">{{$todayRevenue}}.৳</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Current Month
                </div>
                <div class="car-body text-center">
                    <h2 class="m-3">{{$monthRevenue}}.৳</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    Current Year
                </div>
                <div class="car-body text-center">
                    <h2 class="m-3">{{$yearRevenue}}.৳</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-3">
    <div class="box">
        <div class="box-header">
            <div class="box-icon-left border-right" style="height:100%">
                <p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
            </div>
            <h2 class="blue task-label">Profits Report</h2>
            <div class="box-icon border-left" style="height:100%">
                <div class="dropdown mt-0">
                    <p class="task-btn text_p_primary" title="Actions">
                        <i class="fa fa-th-list"></i>
                    </p>
                </div>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-lg-12">
                    <p class="introtext mb-0">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
                    <div class="row">
                        <div class="col-8">
                            <p class="pt-2 mb-0">Showing {{$profits->count()}} of {{$profits->total()}}</p>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="bg_p_primary">
                            <tr>
                                <th class="font-weight-bold" scope="col">#</th>
                                <th class="font-weight-bold" scope="col">Product Code</th>
                                <th class="font-weight-bold" scope="col">Product Revenue</th>

                            </tr>
                        </thead>
                        <tbody id="table-data">
                            @foreach($profits as $profit)
                            <tr>
                                <td>{{$profit->id}}</td>
                                <td>{{@$profit->products->code}}</td>
                                <td>{{$profit->product_revenue}}.৳</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="p-link">
                        {{$profits->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection