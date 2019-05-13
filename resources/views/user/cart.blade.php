@include('products.header')
@include('include.navbar')

<div class="container">
    @if(count($cart->order_line) === 0)
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    @else
    <div class="row">
        {{$cart->order_number}}
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->order_line as $order_line)
                        <tr>
                            <td><img src="/storage/images/seeds/laptop.png" height="70" ></td>
                            <td>{{$order_line->product->name}}</td>
                            <td>{{$order_line->quantity}}</td>
                            <td>{{$order_line->product->format_price($order_line->quantity) }}</td>
                            <td>
                            {{-- <form action="users/{{Auth::user()->id}}/orders/{{$cart->id}}" action="POST"> --}}
                            <form action="{{ route('delete_item', [Auth::user()->id, $cart->id, $order_line->product->id]) }}" method="POST">
                                    <input type="hidden" name="product_id" value={{$order_line->product->id}}>
                                    {{ method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Total: </th>
                        <td>{{money_format('$%i', $cart->sum() / 100)}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <form action="" method="POST" class="form-inline">
                                <button class="btn btn-success btn-sm">Checkout</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

@include('include.footer')
