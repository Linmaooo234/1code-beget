<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
 public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Проверяем наличие необходимой роли
            if (in_array($user->role, $roles)) {
                return $next($request);
            }
        }

        // Если пользователь не прошел проверку, возвращаемся на предыдущую страницу
        return redirect()->back()->withErrors([
            'message' => 'Вы не имеете достаточных прав для доступа к данной странице.'
        ]);
    }
}
