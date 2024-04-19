<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //
    public function addToFavorites(Request $request, Favorite $favorite)
    {
       /*  $user = auth()->user();

        if ($user->favorites()->attach($favorite)) {
            return back()->with('success', 'Post added to favorites!');
        }

           return back()->with('error', 'Failed to add post to favorites.'); */
    }
}
