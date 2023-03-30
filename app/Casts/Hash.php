<?php namespace App\Casts;
    use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;
    use Illuminate\Database\Eloquent\Model;

    class Hash implements CastsInboundAttributes
    {
        /**
         * Prepare the given value for storage.
         *
         * @param  array<string, mixed>  $attributes
         */
        public function set(Model $model, string $key, mixed $value, array $attributes): mixed
        {
            return hash('sha256',$value);
        }
    }
