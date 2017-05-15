@extends('layouts.Manager')

@section('content')
<!--overview start-->
  <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Manage Set Menu</h3>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('Manager.home')}}">Home</a></li>      
              <li><i class="icon_desktop"></i>Menu</li>   
              <li><i class="icon_documents_alt"></i>Set Menu</li>                       
          </ol>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
            <h3>'Set' Menu List</Char>
        </header>
        <div class="panel-body">
          <div class="tab-pane" id="chartjs">
            <table class="table table-bordered">
              <tr>
                <th></th>
                <th>Product Name</th>
                <th>Description</th> 
                <th>Price</th>
                <th>Status</th>
                <th colspan="2">Option</th>
              </tr>
              @if (count($set) > 0)
                  @foreach ($set as $set)
                      <tr>
                        <td><img src="{{URL::asset($set->picture_url)}}" height="100px"></td>
                        <td>{{$set->product_name}}</td>
                        <td>{{$set->product_description}}</td> 
                        <td>RM {{number_format($set->product_price, 2, '.', ',')}}</td>
                        <td>{{$set->product_status}}</td>
                        <td>
                          <form method="post" action="{{route('Manager.EditMenu')}}">
                            <input type="hidden" name="id" value="{{$set->id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button class="btn btn-primary btn-sm" type="submit" >Edit</button>
                          </form>
                          </td>
                        <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$set->id}}">
                          Delete
                        </button></td>
                      </tr>
                      <!-- Modal -->
                      <div class="modal fade bs-example-modal-sm" id="myModal{{$set->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <strong><p>Are You Sure want to delete Menu {{$set->product_name}}?</p></strong>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a class="btn btn-primary" type="button" href="{{ route('Manager.DeleteMenuSet', $set)}}" ><span class="glyphicon glyphicon-trash" aria-hidden="true"> Delete</span></a>
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