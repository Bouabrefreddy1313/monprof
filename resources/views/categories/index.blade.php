@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Catégories de Vidéos</h1>
            <div class="list-group">
                @foreach ($categories as $category)
                    <a href="{{ route('videos.category', $category->id) }}" class="list-group-item list-group-item-action">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
