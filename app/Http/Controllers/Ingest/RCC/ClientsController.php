<?php namespace App\Http\Controllers\Ingest\RCC;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\RCC\ClientImport;

    class ClientsController extends Controller
    {
        protected function store(Request $request) {
            \Excel::import(new ClientImport, $request->file);

            return redirect()->route('ingest.rcc.users');
        }
    }
