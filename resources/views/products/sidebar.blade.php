<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="/products">All Products</a></li>
        @foreach ($categories as $category)
        <li class="list-group-item"><a href="/products?category_id={{$category->id}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</div>
