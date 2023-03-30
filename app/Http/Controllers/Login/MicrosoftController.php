<?php namespace App\Http\Controllers\Login;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Redirect;
    use App\Models\Member;

    class MicrosoftController extends Controller
    {
        public function redirect() {
            return \Socialite::with('azure')->redirect();
        }

        public function handle() {
            $azureUser = \Socialite::with('azure')
                ->user();

            $isUser = User::whereEmailKey(hash('sha256', $azureUser->email))
                ->first();

            if(is_null($isUser)) {
                $isUser = User::create([
                    'email' => $azureUser->email,
                    'email_key' => $azureUser->email,
                    'current_team_id' => 1
                ]);
            }

            $foundMember = Member::where('email_key',hash('sha256', $azureUser->email))
                ->orWhere('second_email_key',hash('sha256', $azureUser->email))
                ->first();

            $isUser->update([
                'account_id'    => $foundMember->account_id
            ]);

            Auth::login($isUser);

            return Redirect::route('dashboard');
        }
    }
