<?php namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Role;
    use Illuminate\Support\Facades\Cache;

    class RolesController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $cacheKey = "list";

            $roles = Cache::tags('roles')->remember($cacheKey, 604800, function() {
                return Role::paginate(25);
            });

            return view('roles.index',[
                'roles' => $roles
            ]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('roles.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $attributes = $request->validate([
                'name'          => ['required','unique:roles'],
                'description'   => ['sometimes']
            ]);

            $role = Role::create($attributes);

            Cache::tags('roles')->flush();

            Cache::tags('roles')->remember($role->id, 604800, function() use ($role) {
                return $role;
            });

            return redirect()
                ->route('roles.index')
                    ->with([
                        'flash.banner'          => "The '{$role->name}' role was created successfully!",
                        'flash.bannerStyle'     => 'success'
                    ]);
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
