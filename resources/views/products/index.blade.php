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
                                    <a href="/products/{{$product->id}}"><img src="/storage/images/seeds/laptop.png" alt=""></a>
                                </div>
                            <h6>{{$product['name']}}</h6>
                            <p>{{$product->format_price()}}</p>
                            {{-- add product to cart --}}
                            @if($product->stock > 0)
                            <form action={{ route('add_item', [Auth::user()->id, $product->id])}} method="POST" class="d-inline">
                                <input type="hidden" name="quantity" value="1">
                                @csrf
                                <button class="btn btn-sm btn-add-to-cart">Add To Cart</button>
                                <a href="/products/{{$product->id}}" class="btn btn-sm btn-detail">Details</a>
                            </form>
                            @else
                            <div class="outofstock">Out Of Stock</div>
                            @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('include.footer')
