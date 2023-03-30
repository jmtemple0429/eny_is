<?php namespace App\Http\Controllers\Login;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Redirect;

    class PasswordController extends Controller
    {
        public function create() {
            return view('auth.password',[
                'email' => session('email')
             ]);
        }
        public function store(Request $request) {
            if(is_null($request->email)) {
                return Redirect::route('login.search');
            }

            $isUser = User::whereEmailKey(hash('sha256', $request->email))
                ->firstOrFail();

            if(Hash::check($request->password, $isUser->password)) {
                Auth::login($isUser);

                return Redirect::route('dashboard');
            } 

            return "No";

        }
    }
