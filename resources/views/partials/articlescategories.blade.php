<div class="panel panel-default">
    <div class="panel-heading">Articles Categories</div>
    <ul class="list-group">
        @foreach($newscategories as $newscategory)
            <li class="list-group-item"><a href="{{ url('/category/'.$newscategory->id) }}">{{ $newscategory->name }}    <span class="badge">{{ count($newscategory->news) }}</span></a></li>
        @endforeach
    </ul>
</div>