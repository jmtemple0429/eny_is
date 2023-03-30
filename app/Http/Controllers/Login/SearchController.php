<?php namespace App\Http\Controllers\Login;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Redirect;

    class SearchController extends Controller
    {
        public function store(Request $request, User $user) {
            $request->validate([
                'email' => 'required'
            ]);
            
            $isUser = User::whereEmailKey(hash('sha256', $request->email))
                ->first();

            if(! $isUser) {
                return Redirect::route('login.microsoft.redirect');
            }

            if(! is_null($isUser->password)) {
                return Redirect::route('login.password')
                    ->with(['email' => $request->email]);
            } else {
                return Redirect::route('login.microsoft.redirect');
            }
        }
    }
