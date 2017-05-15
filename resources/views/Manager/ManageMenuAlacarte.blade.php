@extends('layouts.Manager')

@section('content')
<!--overview start-->
  <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Manage A La Carte Menu</h3>
          <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{ route('Manager.home')}}">Home</a></li>      
              <li><i class="icon_desktop"></i>Menu</li>   
              <li><i class="icon_documents_alt"></i>A La Carte</li>                       
          </ol>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
            <h3>'A La Carte' Menu List</Char>
        </header>
        <div class="panel-body">
          <div class="tab-pane" id="chartjs">
            <table class="table table-bordered" style="width:90%">
            <tr>
              <th></th>
              <th>Product Name</th>
              <th>Description</th> 
              <th>Price</th>
              <th>Status</th>
              <th colspan="2">Option</th>
            </tr>
            @if (count($alacarte) > 0)
                @foreach ($alacarte as $alacarte)
                    <tr>
                      <td><img src="{{URL::asset($alacarte->picture_url)}}"height="100px"></td>
                      <td>{{$alacarte->product_name}}</td>
                      <td>{{$alacarte->product_description}}</td> 
                      <td>RM {{number_format($alacarte->product_price, 2, '.', ',')}}</td>
                      <td>{{$alacarte->product_status}}</td>
                      <td>
                        <form method="post" action="{{route('Manager.EditMenu')}}">
                          <input type="hidden" name="id" value="{{$alacarte->id}}">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <button class="btn btn-primary btn-sm" type="submit" >Edit</button>
                        </form>
                      </td>
                      <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$alacarte->id}}">
                        Delete
                      </button></td>
                    </tr>
                    <div class="modal fade bs-example-modal-sm" id="myModal{{$alacarte->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <strong><p>Are You Sure want to delete Menu {{$alacarte->product_name}}?</p></strong>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <a class="btn btn-primary" type="button" href="{{ route('Manager.DeleteMenuAlacarte', $alacarte)}}" ><span class="glyphicon glyphicon-trash" aria-hidden="true">Confirm Delete</span></a>
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