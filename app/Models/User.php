<?php namespace App\Models;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Fortify\TwoFactorAuthenticatable;
    use Laravel\Jetstream\HasProfilePhoto;
    use Laravel\Jetstream\HasTeams;
    use Laravel\Sanctum\HasApiTokens;
    use App\Casts\Password;
    use App\Casts\Hash;

    class User extends Authenticatable
    {
        use HasApiTokens;
        use HasFactory;
        use HasProfilePhoto;
        use HasTeams;
        use Notifiable;
        use TwoFactorAuthenticatable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'email', 'email_key', 'password','current_team_id',
            'account_id'
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
            'two_factor_recovery_codes',
            'two_factor_secret',
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
            'email'             => 'encrypted',
            'email_key'         => Hash::class,
            'password'          => Password::class
        ];

        /**
         * The accessors to append to the model's array form.
         *
         * @var array<int, string>
         */
        protected $appends = [
            'profile_photo_url',
            'uipath',
            'name'
        ];

        protected $with = [
            'member'
        ];

        public function getUipathAttribute() {
            return ($this->email == "ingest@enydisaster.com") ? 
            true : false; 
        }
        
        public function member() {
            return $this->hasOne(Member::class,"account_id","account_id");
        }

        public function getNameAttribute() {
            return ($this->uipath) ? 
                "UI Path" : $this->member->name; 
        }
    }
