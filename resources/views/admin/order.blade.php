order
<div class="container-fluid">
    <div class="row">
        <table class="table">
            <thead>
                <th>Order Number</th>
                <th>Order Owner</th>
                <th>Total Charge</th>
                <th>Completed Date</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @if($order->status === 'paid')
                    <tr class="order" data-order="{{$order->order_number}}">
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->user->email}}</td>
                        <td>${{$order->sum()/100}}</td>
                        <td>{{$order->updated_at}}</td>
                    </tr>
                    <tr id="{{$order->order_number}}" class="order-detail" style="display:none">
                        <td colspan="4">
                            <table class="table">
                                <thead>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </thead>
                                <tbody>
                                    @foreach ($order->order_line as $item)
                                        <tr>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>${{$item->quantity * $item->product->price / 100}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td><strong>Total</strong></td>
                                        <td>${{$order->sum() / 100}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.order').on('click', function(e){
        var orderNumber = $(this).attr('data-order');
        $('#' + orderNumber).toggle()
    })
</script>
