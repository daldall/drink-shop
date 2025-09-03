<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poster;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{
    public function index()
    {
        $posters = Poster::latest()->paginate(10);
        return view('admin.posters.index', compact('posters'));
    }

    public function create()
    {
        return view('admin.posters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('posters', 'public');

        Poster::create([
            'title' => $request->title,
            'image' => $path,
        ]);

        return redirect()->route('admin.posters.index')->with('success', 'Poster berhasil ditambahkan!');
    }

    public function edit(Poster $poster)
    {
        return view('admin.posters.edit', compact('poster'));
    }

    public function update(Request $request, Poster $poster)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        $data = $request->only('title');

        if ($request->hasFile('image')) {
            if ($poster->image && Storage::disk('public')->exists($poster->image)) {
                Storage::disk('public')->delete($poster->image);
            }
            $data['image'] = $request->file('image')->store('posters', 'public');
        }

        $poster->update($data);

        return redirect()->route('admin.posters.index')->with('success', 'Poster berhasil diperbarui!');
    }

    public function destroy(Poster $poster)
    {
        if ($poster->image && Storage::disk('public')->exists($poster->image)) {
            Storage::disk('public')->delete($poster->image);
        }
        $poster->delete();

        return redirect()->route('admin.posters.index')->with('success', 'Poster berhasil dihapus!');
    }
}
