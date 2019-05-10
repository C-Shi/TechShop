@include('home.header')
@include('include.navbar')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="branding">
        <h1>TechStyle Shop</h1>
        <a class="btn btn-feature" href="/">Blog</a>
        <a class="btn btn-feature" href="/">New Arrival</a>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="/storage/images/cover1.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="/storage/images/cover2.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="/storage/images/cover3.jpeg" class="d-block w-100" alt="...">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        {{-- feature product section --}}
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                <div class="product">
                    <div class="product-img">
                        <img src="/storage/images/seeds/laptop.png" alt="">
                    </div>
                <h6>{{$product['name']}}</h6>
                <p>{{$product->format_price()}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- business introduction --}}
<div class="container-fluid">
    <div class="row">
    <div class="col-12 business">
        <h2>About Our Business</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eleifend eget ex eu mattis. Cras pharetra velit rutrum felis fermentum volutpat. Quisque tincidunt ornare justo, in pharetra purus rhoncus at. Suspendisse et enim mi. Ut eu posuere lorem. Aenean congue tempor sollicitudin. Cras in iaculis quam, non eleifend est. Curabitur vel fermentum neque. Fusce finibus urna ac mi feugiat bibendum. Pellentesque gravida lorem semper, condimentum odio id, ullamcorper ex. Nunc non convallis neque. In ac arcu venenatis, sodales massa a, viverra nibh. Aliquam non ligula at quam laoreet dapibus. Donec pulvinar nibh eget lacus euismod ultrices ac quis augue.</p>

        <p>Aenean eu erat est. Sed eu risus rhoncus, vulputate nibh sed, gravida turpis. Maecenas tincidunt diam velit, sed finibus risus efficitur in. Aliquam condimentum nunc eget ex vulputate bibendum. Vestibulum eget mollis turpis. Sed at mollis ligula. In laoreet sit amet erat vel dignissim. Maecenas quis nisl sapien. Sed urna dui, elementum at tincidunt non, aliquet sed dolor. Nam commodo sollicitudin leo sed viverra. Nam laoreet ac massa nec tempor. Donec id accumsan eros, nec convallis felis.</p>
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 blog">
            blogs
        </div>

        <div class="col-md-6 news">
            News
        </div>
    </div>
</div>

@include('include.footer')
