@include('products.header')
@include('include.navbar')

<div class="container-fluid">
    <div class="row">
        {{-- sidebar for shopping cart --}}
        <div class="col-md-3">
            @include('products.sidebar')
        </div>

        {{-- product display area --}}
        <div class="col-md-9">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-3 text-center">
                            <div class="product">
                                <div class="product-img">
                                    <img src="/storage/images/seeds/laptop.png" alt="">
                                </div>
                            <h6>{{$product['name']}}</h6>
                            <p>{{$product->format_price()}}</p>
                            <button class="btn btn-sm btn-add-to-cart">Add To Cart</button>
                            <a href="/products/{{$product->id}}" class="btn btn-sm btn-detail">Details</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('include.footer')
