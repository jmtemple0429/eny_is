<?php namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use App\Casts\Hash;

    class DisasterCase extends Model
    {
        use HasFactory;

        protected $guarded = [];

        protected $casts = [
            'address'           => 'encrypted',
            'city'              => 'encrypted' ,
            'county'            => 'encrypted',
            'county_key'        => Hash::class,
            'address_key'        => Hash::class,
            'household' => Hash::class,
            'responder1'   => Hash::class,
            'responder2'  => Hash::class
        ];

        protected $with = [
            'first_responder',
            'second_responder',
            'clients'
        ];

        public function getAdultsAttribute() {
            return $this->clients->filter(function($client) {
                return $client->age >= 18;
            })->count();
        }

        
        public function getChildrenAttribute() {
            return $this->clients->filter(function($client) {
                return $client->age < 18;
            })->count();
        }

        public function first_responder() {
            return $this->hasOne(Member::class,"account_name","responder1");
        }

        public function second_responder() {
            return $this->hasOne(Member::class,"account_name","responder2");
        }

        public function event() {
            return $this->hasOne(Event::class,"event","event");
        }

        public function clients() {
            return $this->hasMany(Client::class,"household","household");
        }
            
    }

