<div class="card mb-3">
    <div class="card-header">
        <h4>Tags</h4>
    </div>
    <div class="card-body">
        @foreach($tags as $tag)
            <a href="#" class="btn btn-light mb-1">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
