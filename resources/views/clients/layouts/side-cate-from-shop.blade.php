{{-- <div class="p-category">
    <h4>Danh mục sản phẩm</h4>
    <ul class="category-list">
        <li>
            <ul class="nav_menu">
                @foreach($cates as $cate)
                    <li><a href="{{ route('home.site.cate.detail', $cate->id) }}">{{ $cate->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li>
            <h2>Top 10 sản phẩm có lượt xem nhiều nhất</h2>
    <ul>
        @foreach($topProducts as $product)
            <li class="hot_pro">
                <a href="{{ route('home.site.product.show', ['id' => $product->id]) }}">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    <p>{{ $product->name }}</p>
                    <span>Lượt xem: {{ $product->view_count }}</span>
                </a>
            </li>
        @endforeach
    </ul>
    </ul>
</div> --}}
