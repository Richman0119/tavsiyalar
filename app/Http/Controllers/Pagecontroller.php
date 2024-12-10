<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommendation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PageController extends Controller
{
    use AuthorizesRequests;
    // Home Page - Displays all recommendations
    public function home()
    {
        $recommendations = Recommendation::latest()->with('user')->get(); // Eager load user for performance
        return view('pages.home', compact('recommendations'));
    }

    // Show Recommendation Creation Form
    public function create()
    {
        return view('pages.create');
    }

    // Store a New Recommendation
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Ensure the `recommendations()` method exists in your `User` model
        Auth::user()->recommendations()->create($validatedData);

        return redirect()->route('home')->with('success', 'Tavsiya muvaffaqiyatli yaratildi!');
    }

    // Show Edit Form for a Recommendation
    public function edit($id)
    {
        $recommendation = Recommendation::findOrFail($id);

        // Authorization check using the policy
        $this->authorize('update', $recommendation);

        return view('pages.edit', compact('recommendation'));
    }

    // Update a Recommendation
    public function update(Request $request, $id)
    {
        $recommendation = Recommendation::findOrFail($id);

        // Validation and update logic
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $recommendation->update($request->only('title', 'content'));

        return redirect()->route('home')->with('success', 'Tavsiya muvaffaqiyatli yangilandi!');
    }

    // Delete a Recommendation
    public function destroy($id)
    {
        $recommendation = Recommendation::findOrFail($id);

        $recommendation->delete();

        return redirect()->route('home')->with('success', 'Tavsiya muvaffaqiyatli o‘chirildi!');
    }

    // My Account Page
    public function myAccount()
    {
        $user = Auth::user();
        return view('pages.account', compact('user'));
    }

    // Update User Account Info
    public function updateAccount(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        Auth::user()->update($validatedData);

        return back()->with('success', 'Hisob muvaffaqiyatli yangilandi!');
    }
}
