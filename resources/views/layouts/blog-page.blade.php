@extends('layouts.app')

@section('content')
<main class="d-flex container">
    <div class="col-8">
        @yield('main')
    </div>
    <div class="col-4">
        <x-links.sidebar :tags="$tags"></x-links.sidebar>
    </div>
</main>

<div class="container-fluid bg-white">
    <div class="container py-4">
        <div class="row">
            <p class="mr-auto">Copyrights, All rights reserved.</p>

            @guest
                <a href="{{ route('login') }}">Admin Login</a>
            @else
                <a href="{{ route('admin.index') }}" class="mr-4">Admin Panel</a>

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    Admin Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</div>
@endsection
