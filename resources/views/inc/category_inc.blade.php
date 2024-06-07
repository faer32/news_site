@section('category_inc')
<div class="container">
    <!-- Каталог и корзина с фиксированным расположением на странице -->
    <div class="row mt-1 position-fixed z-3">
        <h1>Категории</h1>
        <div class="mb-2">
            <ul class="bg-dark" data-bs-theme="dark">
                <li><a class=" text-white" href="#">Все товары</a></li>
                <li><a class="text-white" href="#">Кухня</a></li>
                {{-- <li><a class="dropdown-item text-white" href="{{ route('catalog', array_merge($currentQueryParams, ['category' => 'bedroom'])) }}">Спальня</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('catalog', array_merge($currentQueryParams, ['category' => 'living_room'])) }}">Гостинная</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('catalog', array_merge($currentQueryParams, ['category' => 'office'])) }}">Офис</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('catalog', array_merge($currentQueryParams, ['category' => 'furniture'])) }}">Фурнитура</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('catalog', array_merge($currentQueryParams, ['category' => 'decor'])) }}">Декор</a></li> --}}
            </ul>
        </div>
    </div>
</div>