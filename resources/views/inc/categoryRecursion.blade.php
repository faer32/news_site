<li>
    <a href=" /home/{{ $category->name }}" class="toggle-link">{{ $category->name }}</a>
    @if ($category->childCategory->isNotEmpty())
        <ul>
            @foreach ($category->childCategory as $child)
                @include('inc.categoryRecursion', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>