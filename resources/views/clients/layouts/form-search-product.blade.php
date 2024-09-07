<form action="{{ route('home.site.product.search') }}" class="search border" method="POST">
    @csrf
    <input type="text" placeholder="Tìm kiếm sản phẩm" name="name" style="width:1000px">
    <button class="normal me-1">Tìm kiếm</button>
</form>
