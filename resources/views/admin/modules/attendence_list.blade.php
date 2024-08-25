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
            Add Employee
            </button>
            <!-- <button class="btn btn-info text-white">View All</button> -->
        </div>
        <div class="date-box p-3 border m-4">
            <!-- <h2 class="text-center">Date: {{$date}}</h2> -->
        </div>
      <div class="mx-5">
      <table class="table table-striped  " >
            <thead>
              <tr>
                <th scope="col">S/l</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($attendence as $key=>$att)
              <tr>
                <th scope="row">{{$key +1}}</th>
                <td>{{$att->name}}</td>
                <td>{{$att->emp_id}}</td>
                <td> 
                  @if($att->status == 0)
                  <button class="btn bg_p_primary">Inactive</button>
                  @else
                  <button class="btn bg_p_primary">Active</button>

                  @endif
                </td>
              </tr>
              @endforeach
              <!-- <tr>
                <th scope="row">2</th>
                <td>Abdullah Al Mamun</td>
                <td>2</td>
                <td> 
                    <input type="radio" name="attendence2" id="p2">
                    <label for="p2">P</label>
                    <input type="radio" name="attendence2" id="a2">
                    <label for="a2">A</label>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Anayet Ullah</td>
                <td>3</td>
                <td> 
                    <input type="radio" name="attendence3" id="p3">
                    <label for="p3">P</label>
                    <input type="radio" name="attendence3" id="a3">
                    <label for="a3">A</label>
                </td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Mahmudul Hasan</td>
                <td>4</td>
                <td> 
                    <input type="radio" name="attendence4" id="p4">
                    <label for="p4">P</label>
                    <input type="radio" name="attendence4" id="a4">
                    <label for="a4">A</label>
                </td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Mehedi Hasan</td>
                <td>5</td>
                <td> 
                    <input type="radio" name="attendence5" id="p5">
                    <label for="p5">P</label>
                    <input type="radio" name="attendence5" id="a5">
                    <label for="a5">A</label>
                </td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Jahirul Islam</td>
                <td>6</td>
                <td> 
                    <input type="radio" name="attendence6" id="p6">
                    <label for="p6">P</label>
                    <input type="radio" name="attendence6" id="a6">
                    <label for="a6">A</label>
                </td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>Anam Khan</td>
                <td>7</td>
                <td> 
                    <input type="radio" name="attendence7" id="p7">
                    <label for="p7">P</label>
                    <input type="radio" name="attendence7" id="a7">
                    <label for="a7">A</label>
                </td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td>Obaidul Miah</td>
                <td>8</td>
                <td> 
                    <input type="radio" name="attendence8" id="p8">
                    <label for="p8">P</label>
                    <input type="radio" name="attendence8" id="a8">
                    <label for="a8">A</label>
                </td>
              </tr> -->
              
              
               
            </tbody>
          </table>
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
          <button type="button" class="btn bg_secondary_grey" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg_p_primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop