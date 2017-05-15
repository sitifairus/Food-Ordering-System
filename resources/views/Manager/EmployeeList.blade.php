

@extends('layouts.Manager')

@section('content')
<!--overview start-->
  <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user-circle"></i> Employee List </h3>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('Manager.home')}}">Home</a></li>      
              <li><i class="icon_desktop"></i>Employee List</li>                        
          </ol>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
            <h3>Employee List</Char>
        </header>
        <div class="panel-body">
          <div class="tab-pane" id="chartjs">
            <table class="table table-bordered">
              <tr>
                <th></th>
                <th> Name</th>
                <th>Roles</th> 
                <th>Employee ID</th>
                <th colspan="3">Option</th>
              </tr>
              @if (count($user) > 0)
                  @foreach ($user as $user)
                      <tr>
                        <td><img src="{{URL::asset($user->image_url)}}"height="100px"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->roles}}</td> 
                        <td>{{$user->employee_id }}</td>
                        <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imageModal{{$user->id}}">
                          Change Picature
                        </button></td>
                      </tr>
                        <td>
                          <form method="post" action="{{route('Manager.EditUser')}}">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button class="btn btn-primary btn-sm" type="submit" >Edit</button>
                          </form>
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$user->id}}">
                          Delete
                        </button></td>
                      </tr>
                      <!-- Image Modal -->
                      <div class="modal fade bs-example-modal-sm" id="imageModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                            <form method="post" action="{{route('Manager.ChangeUserImage')}}" enctype="multipart/form-data">
                              <div class="modal-body">
                                <strong><p>Change Photo {{$user->name}}?</p></strong>
                                <input type="file" class="form-control" name="user_picture" required>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="employee_id" value="{{$user->employee_id}}">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-default">Change Photo</button>
                              </div>
                            </form>
                            </div>
                        </div>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade bs-example-modal-sm" id="myModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <strong><p>Are You Sure want to delete User {{$user->name}}?</p></strong>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a class="btn btn-primary" type="button" href="{{ route('Manager.DeleteUser' , $user)}}" ><span class="glyphicon glyphicon-trash" aria-hidden="true"> Delete</span></a>
                              </div>
                            </div>
                        </div>
                      </div>
                  @endforeach
              @endif
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
