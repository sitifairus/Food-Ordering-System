

@extends('layouts.Manager')

@section('content')
<!--overview start-->
  <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user-circle"></i> New User </h3>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('Manager.home')}}">Home</a></li>      
              <li><i class="fa fa-user-circle"></i>New User Form</li>                        
          </ol>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
            <h3>New User Form</Char>
        </header>
        <div class="panel-body">
          <div class="tab-pane" id="chartjs">
            <form method="post" action="{{route('Manager.AddNewUser')}}" enctype="multipart/form-data">
              <table class="table table-bordered" style="width:40%">
              <tr>
                <th width="130px">Name</th>
                <td width="10px">:</td>
                <td><input type="text" class="form-control" name="name" id="name" placeholder="User Name" required></td>
              </tr>
              <tr>
                <th >Employee ID</th>
                <td width="10px">:</td>
                <td><input class="form-control" rows="3" id="employee_id" name="employee_id" placeholder="Employee ID" required></td>
              </tr>
              <tr>
                <th>User Roles</th>
                <td>:</td>
                <td>
                  <select name="roles" class="form-control">
                    <option value="Manager">Manager</option>
                    <option value="CounterStaff">Counter Staff</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>User Picture</th>
                <td>:</td>
                <td>
                  <input type="file" class="form-control" name="user_picture" required>
                </td>
              </tr>
              <tr>
                <th></th>
                <td></td>
                <td>
                  <table>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <td><a type="button" class="btn btn-default" href="{{URL::previous()}}" >Cancel</a></td><td><button type="submit" class="btn btn-primary">Submit</button></td>
                  </table>
                </td>
              </tr>
              </table>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
