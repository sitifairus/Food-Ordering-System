@extends('layouts.CounterStaff')

@section('content')
<!--overview start-->
<br>
<br>
  <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Menu List</h3>
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
            </tr>
            @if (count($product) > 0)
                @foreach ($product as $alacarte)
                    <tr>
                      <td><img src="{{URL::asset($alacarte->picture_url)}}"height="100px"></td>
                      <td>{{$alacarte->product_name}}</td>
                      <td>{{$alacarte->product_description}}</td> 
                      <td>RM {{number_format($alacarte->product_price, 2, '.', ',')}}</td>
                      <td>
                        {{$alacarte->product_status}}<br>
                        <?php
                        if($alacarte->product_status=='Available'){
                          ?>
                            <form method="post" action="{{route('CounterStaff.ChangeToNotAvailable')}}">
                              <input type="hidden" name="id" value="{{$alacarte->id}}">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <button class="btn btn-primary btn-sm" type="submit" >Not Available</button>
                            </form>
                          <?php
                        }else{
                          ?>
                            <form method="post" action="{{route('CounterStaff.ChangeToAvailable')}}">
                              <input type="hidden" name="id" value="{{$alacarte->id}}">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <button class="btn btn-primary btn-sm" type="submit" >Available</button>
                            </form>
                          <?php
                        }
                        ?>
                      </td>
                    </tr>
                @endforeach
            @endif
          </table>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection