<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('manage all recommendations')) {
            // Admin can see all recommendations
            $recommendations = Recommendation::all();
        } else {
            // Regular users can only see their recommendations
            $recommendations = Auth::user()->recommendations;
        }

        return view('pages.home', compact('recommendations'));
    }

    public function edit(Recommendation $recommendation)
    {
        if (
            Auth::user()->can('manage all recommendations') ||
            (Auth::user()->can('manage own recommendations') && Auth::id() === $recommendation->user_id)
        ) {
            return view('pages.edit', compact('recommendation'));
        }

        return redirect()->route('home')->with('error', 'You are not authorized to edit this recommendation.');
    }

    public function update(Request $request, Recommendation $recommendation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if (
            Auth::user()->can('manage all recommendations') ||
            (Auth::user()->can('manage own recommendations') && Auth::id() === $recommendation->user_id)
        ) {
            $recommendation->update($request->all());
            return redirect()->route('home')->with('success', 'Recommendation updated successfully.');
        }

        return redirect()->route('home')->with('error', 'You are not authorized to update this recommendation.');
    }

    public function destroy(Recommendation $recommendation)
    {
        if (
            Auth::user()->can('manage all recommendations') ||
            (Auth::user()->can('manage own recommendations') && Auth::id() === $recommendation->user_id)
        ) {
            $recommendation->delete();
            return redirect()->route('home')->with('success', 'Recommendation deleted successfully.');
        }

        return redirect()->route('home')->with('error', 'You are not authorized to delete this recommendation.');
    }
}
