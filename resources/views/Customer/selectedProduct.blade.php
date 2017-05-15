<?php
    $selectedproduct = session()->get('SelectedProduct');
?>
<div class=""  style="background: #fcebcf;">
    <table class="table">
        <tr style="background: #300F00;">
            <td colspan="2" ><center><h4 style="color:#ffffff;">SELECTED ITEM</h4></center></td>
        </tr>
        <tr style="height:590px;">
            <td colspan="2">
                <table class="table table-condensed table-stripted" style="background: #fcebcf;">
                    <thead>
                        <th>Item</th>
                        <th>Price (RM)</th>
                        <th>Qantity</th>
                        <th>Total</th>
                        <th>&nbsp;</th>
                    </thead>
                    @if (count($selectedproduct) > 0)
                    <?php 
                    $total=0;
                    $i=0; 
                    ?>
                    <tbody>
                        @foreach ($selectedproduct as $selectedproduct)
                            <tr>
                                <td class="table-text"><div>{{ array_get($selectedproduct, 'product_name') }}</div></td>
                                <td class="table-text"><div>{{ array_get($selectedproduct, 'product_price') }}</div></td>
                                <td class="table-text"><div>{{ array_get($selectedproduct, 'quantity') }}</div></td>
                                <td class="table-text"><div>{{ array_get($selectedproduct, 'quantity')*array_get($selectedproduct, 'product_price') }}</div></td>
                                <!-- Task Delete Button -->
                                <td>
                                    <form action="{{ route('deleteitem')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="list_id" id="list_id" value="{{ $i }}" hidden>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash-o" aria-hidden="true" ></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                                $total=$total+( array_get($selectedproduct, 'product_price') * array_get($selectedproduct, 'quantity') ); 
                                $i++;
                            ?>
                        @endforeach

                        <th colspan="3" ><b>Grand Total<b></th>
                        <th><b>{{$total}}<b></th>
                        <th>&nbsp;</th>
                    </tbody>
                    @endif
                </table>
            </td>
        </tr>
        <tr>
            <td><a type="button" class="btn btn-lg btn-block cancel submit" href="{{ url('/')}}" >Cancel</a></td>
            <td>
                @if (count($selectedproduct) > 0)
                <a type="button" class="btn btn-lg btn-block contact submit" href="{{ route('proceed')}}">Procced and Pay</a>
                @else
                 <button type="button" class="btn btn-lg btn-block contact submit" disabled>Procced and Pay</button></td>
                @endif
            </td>
        </tr>
    </table>
</div>