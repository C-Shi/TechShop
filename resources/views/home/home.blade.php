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

    </div>

</div>

@include('include.footer')
