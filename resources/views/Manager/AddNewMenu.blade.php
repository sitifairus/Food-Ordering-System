@extends('layouts.Manager')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-laptop"></i> Manage Set Menu</h3>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="{{ route('Manager.home')}}">Home</a></li>      
        <li><i class="icon_desktop"></i>Menu</li>   
        <li>+ Add New Menu</li>                       
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
            <h3>New Menu Form</Char>
        </header>
        <div class="panel-body">
          <div class="tab-pane" id="chartjs">
            <form method="post" action="{{route('Manager.AddNewMenu')}}" enctype="multipart/form-data">
              <table class="table table-bordered" style="width:40%">
              <tr>
                <th width="130px">Product Name</th>
                <td width="10px">:</td>
                <td><input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" required></td>
              </tr>
              <tr>
                <th >Product Description</th>
                <td width="10px">:</td>
                <td><textarea class="form-control" rows="3" id="product_description" name="product_description" placeholder="Product Description" required></textarea></td>
              </tr>
              <tr>
                <th>Product Price</th>
                <td>:</td>
                <td>
                  <div class="input-group">
                      <div class="input-group-addon">RM</div>
                      <input type="number" min="1"class="form-control" name="product_price" id="produc_price" placeholder="0.00" required>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th>Product Category</th>
                <td>:</td>
                <td>
                  <select name="product_category" class="form-control">
                    <option value="Set">Set</option>
                    <option value="Alacarte">A La Carte</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Product Status</th>
                <td>:</td>
                <td>
                  <select name="product_status" class="form-control">
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                  </select>
                </td>
              </tr>
                <th>Product Picture</th>
                <td>:</td>
                <td>
                  <input type="file" class="form-control" name="product_picture" placeholder="Product Name" required>
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