<div class="side-bar">
    <ul>
        <li><a href="/products" class="category">All Products</a></li>
        @foreach ($categories as $category)
        <li>
            @switch($category->name)
                @case('Desktop')
                    <i class="fas fa-desktop fa-lg"></i>
                    @break
                @case('Laptop')
                    <i class="fas fa-laptop fa-lg"></i>
                    @break
                @case('Tablet')
                    <i class="fas fa-tablet-alt fa-lg"></i>
                    @break
                @case('Cellphone')
                    <i class="fas fa-mobile-alt fa-lg"></i>
                    @break
            @endswitch
            <a href="/products?category_id={{$category->id}}" class="category">{{$category->name}}
                <small class="right-arrow"></small>
            </a>
        </li>
        @endforeach
    </ul>
</div>

<script>
    $('.category').mouseover(function(){
        var cat = $(this);
        cat.children('.right-arrow').text('>');
        window.timeout1 = setTimeout(function(){
            cat.children('.right-arrow').text('>>')
        }, 100);
        window.timeout2 = setTimeout(function(){
            cat.children('.right-arrow').text('>>>')
        }, 200);
        window.timeout3 = setTimeout(function(){
            cat.children('.right-arrow').text('>>>>')
        }, 300);
    }).mouseleave(function(){
        var cat = $(this);
        cat.children('.right-arrow').text('');
        clearTimeout(timeout1);
        clearTimeout(timeout2);
        clearTimeout(timeout3);
    })
</script>
