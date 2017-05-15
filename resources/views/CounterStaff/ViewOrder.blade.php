@extends('layouts.CounterStaff')

@section('content')
    <div class="container-narrow">
        <br>
        <br>
        <h2>Customer's Order</h2>
        <div>

            <!-- Table-to-load-the-data Part -->
            <br>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width:80px;">Queue Number</th>
                        <th style="width:130px;">Items</th>
                        <th style="width:80px;">Quantity</th>
                        <th style="width:100px;">Unit Price</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="orders-list" name="orders-list">
                	<?php
                		$i=0;
                	?>
                    @foreach ($orders as $order)
                    <?php 
                        if(($order->order_status=="Waiting")||($order->attend==session()->get('current_user.employee_id'))){

                            ?>
                            <tr id="order{{$order->id}}">
                                <td>{{$order->id}}</td>
                                <td>{{$order->queue_number}}</td>
                                <td colspan="3">
                                    <table >
                                        @foreach ($order->order_food_list as $item)
                                        <tr>
                                            <td style="width:180px;">
                                                {{$item['product_name']}}
                                            </td>
                                            <td style="width:100px;">
                                                {{$item['quantity']}}
                                            </td>
                                            <td style="width:100px;">
                                                {{number_format($item['product_price'], 2, '.', ',')}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </table>                            
                                </td>
                                <td>RM {{number_format($order->total_price, 2, '.', ',')}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>
                                    <?php
                                        if($order->order_status=="Waiting"){
                                            ?>
                                            <a type="button" class="btn btn-warning btn-xs btn-detail open-modal" href="{{route('CounterStaff.PrepareFood', $order)}}" >Prepare Order</a>
                                            <?php
                                        }
                                        else if($order->order_status=="Preparing"){
                                            ?>
                                            <a type="button" class="btn btn-warning btn-xs btn-detail open-modal" href="{{route('CounterStaff.CallCustomer', $order)}}" >Call Customer</a>
                                            <?php
                                        }

                                        else if($order->order_status=="Calling Customer"){
                                            ?>
                                            <a type="button" class="btn btn-warning btn-xs btn-detail open-modal" href="{{route('CounterStaff.OrderDone', $order)}}" >Order Done</a>
                                            <?php
                                        }
                                    ?>
                                    <a type="button" class="btn btn-danger btn-xs btn-delete delete-order" href="{{route('CounterStaff.DeleteOrder', $order)}}" >Cancel</a>
                                </td>
                            </tr>
                            <?php
                                $i++;
                            ?>
                            <?php
                        }
                    ?>
                    
                    @endforeach
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Task Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmOrders" name="frmOrders" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputOrder" class="col-sm-3 control-label">Order Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="order_status" name="order_status" placeholder="order_status" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">queue_number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="queue_number" name="queue_number" placeholder="queue_number" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="total_price" name="total_price" placeholder="total_price" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                            <input type="hidden" id="order_id" name="order_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajax-crud.js')}}"></script>
@endsection
