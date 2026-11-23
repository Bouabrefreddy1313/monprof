@if ($videos->isEmpty())
    <p>Aucune vidéo trouvée pour cette catégorie.</p>
@else
    <div class="row">
        @foreach ($videos as $video)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <video controls class="card-img-top">
                        <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">{{ $video->title }}</h5>
                        <p class="card-text">{{ $video->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
