@extends('layouts.Kiosk')

@section('content')
    <div class="container">
      <div style="float-right; width:70%;" class="grid-gallery">
        <section class="grid-wrap">
            <ul class="grid">
              <!-- for Masonry column width -->    
               @if (count($product) > 0)
               <?php
                  $i=0;
                ?>
                 @foreach ($product as $product)           
                <li 
                <?php
                  if($product->product_status == "Not Available")
                    echo 'class="not_available"';
                ?>>
                    <figure 
                    <?php
                      if($product->product_status == "Available")
                        echo 'data-toggle="modal" data-target="#ProductModal'.$product->id.'"';
                    ?>
                    >
                        <img src="{{URL::asset($product->picture_url)}}" alt=""/>
                        <figcaption>
                          <table style="width:100%;">
                            <tr>
                              <td><h3>{{ $product->product_name }}</h3></td>
                              <td align="right">RM {{ $product->product_price }}</td>
                            </tr>
                          </table>
                        </figcaption>
                    </figure>
                </li>
                <!-- Modal -->
                    <div class="modal fade" id="ProductModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="{{ route('selectitem')}}">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{ $product->product_name }}</h4>
                              </div>
                              <div class="modal-body">
                                <div class="container" style="max-width:500px; max-height:400px; "><img src="{{URL::asset($product->picture_url)}}" ></div>
                                {{ $product->product_description }}
                                {{ csrf_field() }}
                                <br>
                                <br>
                                <h5>RM {{ $product->product_price }}</h5>
                                <div class="col-sm-2">
                                    <input name="prdc" id="prdc" value="{{ csrf_token()}}" hidden>
                                    <input name="product_id" id="product_id" value="{{ $product->id}}" hidden>
                                    <input name="product_name" id="product_name" value="{{ $product->product_name}}" hidden>
                                    <input name="product_price" id="product_price" value="{{ $product->product_price}}" hidden>
                                    <input type="number" name="quantity" id="product_quantity{{$i}}" min="1" value="1" class="form-control" readonly>
                                </div>
                                <button class="btn btn-primary" type="button" onclick="incrementValue('{{$i}}')" value="Increment Value" >
                                  ADD
                                </button>
                                <button class="btn btn-primary" type="button" onclick="decrementValue('{{$i}}')" value="Decrement Value">
                                  REDUCE
                                </button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    <?php
                    $i++;
                    ?>
                 @endforeach
              @endif
            </ul>
        </section><!-- // end small images -->
    </div><!-- // grid-gallery -->
</div>
<script>
  function incrementValue(productID){
    document.getElementById("product_quantity"+productID).stepUp(1);      
  }
  function decrementValue(productID){
    document.getElementById("product_quantity"+productID).stepDown(1)
  }
</script>
@endsection
