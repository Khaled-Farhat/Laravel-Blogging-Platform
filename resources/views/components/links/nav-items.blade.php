@foreach($categories as $category)
    <li class="nav-item">
        <a class="nav-link" href="">{{ $category->name }}</a>
    </li>
@endforeach
