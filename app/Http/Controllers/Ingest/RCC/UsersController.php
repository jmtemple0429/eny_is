<?php namespace App\Http\Controllers\Ingest\RCC;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\RCC\UserImport;

    class UsersController extends Controller
    {
        protected function store(Request $request) {
            \Excel::import(new UserImport, $request->file);

            return redirect()->route('ingest.rcc.virtual_cases');
        }
    }
