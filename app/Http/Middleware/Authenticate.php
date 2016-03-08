<?php
namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->initUser();

        if ($this->auth->guest()) {
            return redirect()->route('login');
        }

        return $next($request);
    }

    /**
     * Проверяем пользователя в сессии
     */
    protected function initUser()
    {
        $session = session('user');

        $user = unserialize($session);

        if ($user !== null && $user instanceof User) {
            $this->auth->login($user);
        }
    }
}
