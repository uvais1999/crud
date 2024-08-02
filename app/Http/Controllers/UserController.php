<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    private $user_repo;

    public function __construct(UserRepository $users)
    {
        $this->user_repo = $users;
    }

    public function index()
    {
        return Inertia::render('User/Index', [
            'users' => $this->user_repo->getAllUsers(),
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Create', [
            'roles' => Role::get(),
        ]);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->user_repo->store($request);
        } catch (Exception $th) {
            if ($th instanceof ValidationException) throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('users.index');
    }

    public function viewLogin()
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request)
    {

        DB::beginTransaction();

        try {
            $this->user_repo->loginUser($request);
        } catch (Exception $th) {
            if ($th instanceof ValidationException) throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('dashboard');
    }

    public function viewRegister()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->user_repo->registerUser($request);
        } catch (Exception $th) {
            if ($th instanceof ValidationException) throw $th;
            DB::rollback();
        }
        DB::commit();
        return Redirect::to('/login');
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }
}
