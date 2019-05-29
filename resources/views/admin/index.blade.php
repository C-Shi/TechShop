@include('admin.header')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            @include('admin.sidebar')
        </div>

        <div class="col-md-9">
            @switch($query)
                @case('category')
                    @include('admin.category')
                    @break
                @case('product')
                    @include('admin.product')
                    @break
                @case('order')
                    @include('admin.order')
                    @break
                @case('user')
                    @include('admin.user')
                    @break
                @default
                    @include('admin.main')

            @endswitch
        </div>
    </div>
</div>
