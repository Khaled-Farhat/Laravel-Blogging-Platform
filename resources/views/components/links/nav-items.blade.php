@foreach($categories as $category)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
    </li>
@endforeach
