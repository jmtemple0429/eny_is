<?php namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use App\Casts\Hash;

    class Member extends Model
    {
        use HasFactory;

        protected $fillable = [
            'first_name',
            'last_name',
            'account_name',
            'chapter',
            'status',
            'is_responder',
            'email',
            'email_key',
            'second_email',
            'second_email_key',
            'address',
            'city',
            'county',
            'county_key',
            'availability',
            'available_now',
            'member_number',
            'account_id',
            'dr'
        ];

        protected $casts = [
            'first_name'        => 'encrypted',
            'last_name'         => 'encrypted',
            'account_name'      => Hash::class,
            'is_responder'      => 'bool',
            'email'             => 'encrypted',
            'email_key'         => Hash::class,
            'second_email'      => 'encrypted',
            'second_email_key'  => Hash::class,
            'address'           => 'encrypted',
            'city'              => 'encrypted',
            'county'            => 'encrypted',
            'county_key'        => Hash::class,
            'available_now'     => 'bool',
            'member_number'     => 'integer',
            'account_id'        => 'integer'
        ];

        protected $appends = [
            'name'
        ];

        public function getNameAttribute() { 
            return $this->first_name . " " . $this->last_name;
        }
    }
