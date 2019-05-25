@include('home.header')
@include('include.navbar')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="branding">
        <p id="shop-name">TechStyle Shop</p>
        <a class="btn btn-feature" href="/">Blog</a>
        <a class="btn btn-feature" id="to-feature" href="/">New Arrival</a>
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

<div class="container product-box">
    <div class="row">
        <h3 class="feature-product">Feature Products
                <small><a class="btn btn-link" href="/products">See More</a></small>
        <h3>
    </div>
    <hr>
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
<div class="container-fluid footer-container">
    <button class="btn btn-block" id="back-to-top">Back To Top</button>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="footer-list">
                    <li><h5 class="footer-subtitle">Know Our Business</h5></li>
                    <li class="footer-list-item">Our Business</li>
                    <li class="footer-list-item">Board of Dirctor</li>
                    <li class="footer-list-item">Shipping Partner</li>
                    <li class="footer-list-item">Refund Policy</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="footer-list">
                    <li><h5 class="footer-subtitle">Earn With Us</h5></li>
                    <li class="footer-list-item">Career</li>
                    <li class="footer-list-item">Affiliate Program</li>
                    <li class="footer-list-item">Investor Relation</li>
                    <li class="footer-list-item">Cash Back Program</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="footer-list">
                    <li><h5 class="footer-subtitle">Let Us Help You</h5></li>
                    <li class="footer-list-item">Customer Service</li>
                    <li class="footer-list-item">Warehouse Location</li>
                    <li class="footer-list-item">Shipping Rate & Service</li>
                    <li class="footer-list-item">Become a seller</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2 icon-box">
                <i class="fab fa-instagram fa-3x"></i>
                <i class="fab fa-facebook-square fa-3x"></i>
                <i class="fab fa-linkedin fa-3x"></i>
                <i class="fab fa-alipay fa-3x"></i>
                <i class="fab fa-amazon-pay fa-3x"></i>
                <i class="fab fa-cc-paypal fa-3x"></i>
            </div>
        </div>
    </div>
</div>

<script src="/js/home.js"></script>
@include('include.footer')
