<div class="list-group" id="list-tab" role="tablist">
    <a class="list-group-item list-group-item-action {{ $currentPage == 'articles' ? 'active' : '' }}" href="{{ route('admin.articles.index') }}" role="tab">Articles</a>
    <a class="list-group-item list-group-item-action {{ $currentPage == 'categories' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}" role="tab">Categories</a>
    <a class="list-group-item list-group-item-action {{ $currentPage == 'comments' ? 'active' : '' }}" href="{{ route('admin.comments.index') }}" role="tab">Comments</a>
    <a class="list-group-item list-group-item-action {{ $currentPage == 'tags' ? 'active' : '' }}" href="{{ route('admin.tags.index') }}" role="tab">Tags</a>
    @can('viewAny', App\Models\User::class)
        <a class="list-group-item list-group-item-action {{ $currentPage == 'users' ? 'active' : '' }}" href="{{ route('admin.users.index') }}" role="tab">Users</a>
    @endcan
</div>
