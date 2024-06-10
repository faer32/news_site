@section('category_inc')
<div>
    <div class="row mt-1 position-fixed z-3">
        <h1>Категории</h1>
        <div class="categories-sidebar">
            <ul>
                @foreach ($categories as $category)
                    @include('inc.categoryRecursion', ['category' => $category])
                @endforeach
            </ul>
        </div>
    </div>
</div>
