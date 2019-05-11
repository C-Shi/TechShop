@include('products.header')
@include('include.navbar')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="product-img">
                <img src="/storage/images/seeds/laptop.png" alt="">
            </div>
        </div>
        <div class="col-md-6 product-display product-main">
            <h4>{{$product->name}}</h4>
            <hr>
            <h6 class="mb-2">Price: <span>{{$product->format_price()}}<span></h6>
            <h6 class="mb-2">Category: {{$product->category->name}}</h6>
            <h6>Description: </h6>
            <p>{{$product->description}}</p>

            @if($product->stock > 0)
                <div class="mb-1">
                    <span class="instock mb-1">In Stock</span>
                    <small class="product-quantity">Quantity Left: {{$product->stock}}</small>
                </div>

                {{-- add to cart form --}}
                <form>
                    <div class="form-group">
                        <label for="">Quantity: </label>
                        <select>
                            @for($i = 1; $i <= ($product->stock > 20 ? 20 : $product->stock); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <button class="btn btn-add-to-cart btn-sm">Add to Cart</button>
                </form>
            @else
                <div class="outofstock">Out Of Stock</div>
            @endif
        </div>
    </div>
</div>

<div class="container mt-2 comments">

</div>

@include('include.footer')

