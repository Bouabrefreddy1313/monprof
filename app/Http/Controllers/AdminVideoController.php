<?php

namespace App\Http\Controllers;

use App\Models\FormationVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $videos = FormationVideo::orderBy('formation_type')
            ->orderBy('niveau')
            ->orderBy('ordre')
            ->get();

        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'required|file|mimes:mp4,avi,mov,wmv,flv|max:204800', // 200MB max
            'formation_type' => 'required|in:dcg,dscg',
            'niveau' => 'required|string',
            'matiere' => 'nullable|string|max:255',
            'prix' => 'required|integer|min:0',
            'duree' => 'nullable|string|max:20',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload vidéo
        $videoPath = $request->file('video')->store('videos', 'public');

        // Upload thumbnail si présent
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Déterminer l'ordre auto
        $lastOrder = FormationVideo::where('formation_type', $request->formation_type)
            ->where('niveau', $request->niveau)
            ->max('ordre') ?? 0;

        FormationVideo::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'video_path' => $videoPath,
            'formation_type' => $request->formation_type,
            'niveau' => $request->niveau,
            'matiere' => $request->matiere,
            'ordre' => $lastOrder + 1,
            'prix' => $request->prix,
            'duree' => $request->duree,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('particuliers.admin.videos.index')
            ->with('success', 'Vidéo ajoutée avec succès.');
    }

    public function edit(FormationVideo $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, FormationVideo $video)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv|max:204800',
            'formation_type' => 'required|in:dcg,dscg',
            'niveau' => 'required|string',
            'matiere' => 'nullable|string|max:255',
            'prix' => 'required|integer|min:0',
            'duree' => 'nullable|string|max:20',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'titre', 'description', 'formation_type',
            'niveau', 'matiere', 'prix', 'duree'
        ]);

        // Upload nouvelle vidéo si fournie
        if ($request->hasFile('video')) {
            Storage::disk('public')->delete($video->video_path);
            $data['video_path'] = $request->file('video')->store('videos', 'public');
        }

        // Upload nouveau thumbnail si fourni
        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $video->update($data);

        return redirect()->route('particuliers.admin.videos.index')
            ->with('success', 'Vidéo mise à jour avec succès.');
    }

    public function destroy(FormationVideo $video)
    {
        Storage::disk('public')->delete($video->video_path);
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }

        $video->delete();

        return redirect()->route('particuliers.admin.videos.index')
            ->with('success', 'Vidéo supprimée avec succès.');
    }
}
