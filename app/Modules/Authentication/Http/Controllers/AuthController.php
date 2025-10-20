<?php

namespace App\Modules\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Authentication\Http\Requests\UserRequest\AuthRequest;
use App\Modules\Authentication\Services\AuthService\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\ViewErrorBag;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $service
    ) {}

    /**
     * Show the login form
     */
    public function showLoginForm(): View
    {   
        Log::info('Login form accessed', [
            'session_errors' => session('errors'),
            'has_errors' => session()->has('errors'),
            'all_session' => session()->all()
        ]);
        return view('authentication::login');
    }

    public function login(AuthRequest $request)
    {
        Log::info('Login attempt', [
            'validated_data' => $request->validated(),
            'all_input' => $request->all()
        ]);
        $result = $this->service->login($request->validated());
        
        if (!$result['success']) {
            Log::info('Login failed', [
                'result' => $result,
                'errors' => $result['errors']
            ]);
            
            return back()
                ->withErrors($result['errors'])
                ->withInput($request->only('username'));
        }

        session()->flash('toast_data', [
            'message' => $result['message'],
            'type' => 'success'
        ]);

        return redirect()->intended($result['redirect'] ?? '/dashboard');
    }

    public function logout()
    {
        $result = $this->service->logout();

        if ($result['success']) {
            return response()->json([
                'success' => true,
                'show_toast' => true,
                'toast_type' => 'success',
                'redirect' => route('login'),
                'message' => $result['message'],
            ]);
        }

        return response()->json(['success' => false], 500);
    }
}
