@foreach($categories as $category)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
    </li>
@endforeach
