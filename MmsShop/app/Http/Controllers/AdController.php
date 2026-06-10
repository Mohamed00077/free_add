<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    // lister toutes les annonces sur la page d'acceuil
    public function index()
    {
        $ads = Ad::with('user')->latest()->paginate(10);
        return view('ads.index', compact('ads'));
    }

    // formulaire de création pour les annonces
    public function create()
    {
        if (!Auth::check()) return redirect()->route('login');
        return view('ads.create');
    }

    // Enregistrer une nouvelle annonce
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'location'    => 'required|string',
            'condition'   => 'required|in:new,good,used',
            'photo'       => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        Ad::create([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'category'    => $request->category,
            'description' => $request->description,
            'price'       => $request->price,
            'location'    => $request->location,
            'condition'   => $request->condition,
            'photo'       => $photoPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Annonce publiée !');
    }

    // Afficher une annonce
    public function show(Ad $ad)
    {
         $ad->load('user'); 
        return view('ads.show', compact('ad'));
    }
    //Sur la page admin
       public function show_admin(Ad $ad)
    {
         $ad->load('user'); 
        return view('ads.show_admin', compact('ad'));
    }

    //Sur la page Home 
 public function show_home(Ad $ad)
{
    $ad->load('user');
    return view('ads.show_home', compact('ad'));
}

    // Formulaire de modification d'annonce
    public function edit(Ad $ad)
    {
        if (Auth::id() !== $ad->user_id) abort(403);
        return view('ads.edit', compact('ad'));
    }

    // mise à jour des annonces 
    public function update(Request $request, Ad $ad)
    {
        if (Auth::id() !== $ad->user_id) abort(403);

        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'location'    => 'required|string',
            'condition'   => 'required|in:new,good,used',
            'photo'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($ad->photo) Storage::disk('public')->delete($ad->photo);
            $ad->photo = $request->file('photo')->store('photos', 'public');
        }

        $ad->update($request->except('photo'));
        $ad->save();

        return redirect()->route('dashboard', $ad)->with('success', 'Annonce modifiée !');
    }

    // Supprime une annonce
    public function destroy(Ad $ad)
    {
        if (Auth::id() !== $ad->user_id) abort(403);
        if ($ad->photo) Storage::disk('public')->delete($ad->photo);
        $ad->delete();
        return redirect()->route('home')->with('success', 'Annonce supprimée !');
    }



    //Rechercher une annonce
public function search(Request $request)
{
    $search = $request->get('search');

    if ($search) {
        $ads = Ad::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%") 
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->latest()
            ->get();
    } else {
        $ads = Ad::latest()->get();
    }

    return view('home', compact('ads', 'search'));
}
}