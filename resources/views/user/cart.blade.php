@include('products.header')
@include('include.navbar')

<div class="container">
    @if(count($cart->order_line) === 0)
        <div class="jumbotron">
            <h1 class="display-4">Your Cart is empty!</h1>
            <p class="lead">TechShop is a leading online E-commerce business for technical hardware. We sell all categories of electronics with the bese price.</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="/products" role="button">To Shop</a>
        </div>
    @else
    <div class="row">
        <div class="col-12">
            @include('include.flash')
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#checkout">
                                Checkout
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

@include('user.checkout')

@include('include.footer')
