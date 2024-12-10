<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OwnRecommendationMiddleware
{
    public function handle($request, Closure $next)
    {
        $recommendation = $request->route('recommendation'); // yoki $request->route('id')

        if ($recommendation->user_id !== Auth::id()) {
            abort(403, 'Siz faqat o\'zingiz yaratgan maslahatlarni tahrirlashingiz yoki o\'chirishingiz mumkin.');
        }

        return $next($request);
    }
}
