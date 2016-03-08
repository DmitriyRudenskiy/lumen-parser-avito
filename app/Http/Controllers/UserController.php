<?php
namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class UserController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function login(Request $request)
    {
        $error = $request->get('error');

        return view('user.login', ['error' => $error]);
    }

    public function check(Request $request)
    {
        $data = $request->only('login', 'password');
        $user = (new UserService())->auth($data['login'], $data['password']);

        if ($user !== null) {
            session(['user' => serialize($user)]);
            return redirect()->route('root');
        }

        return redirect()->route('login', ['error' => 1]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        session(['user' => null]);
        return redirect()->route('login');
    }
}