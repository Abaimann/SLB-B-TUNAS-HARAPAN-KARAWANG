<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    // Tampilkan semua 5 slide (admin)
    public function index()
    {
        $slides = HeroSlide::orderBy('order')->get();
        return view('admin.hero.index', compact('slides'));
    }

    // Edit slide by id
    public function edit(HeroSlide $hero)
    {
        return view('admin.hero.edit', ['slide' => $hero]);
    }

    // Update slide
    public function update(Request $request, HeroSlide $hero)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
        ]);

        // handle upload image
        if ($request->hasFile('image')) {
            // delete old file
            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }
            $hero->image = $request->file('image')->store('home/slides', 'public');
        }

        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;
        // keep order unchanged
        $hero->save();

        return redirect()->route('admin.hero.index')->with('success', 'Slide diperbarui.');
    }
}
