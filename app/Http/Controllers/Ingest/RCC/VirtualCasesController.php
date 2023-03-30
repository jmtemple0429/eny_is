<?php namespace App\Http\Controllers\Ingest\RCC;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\RCC\VirtualCaseImport;

    class VirtualCasesController extends Controller
    {
        protected function store(Request $request) {
            \Excel::import(new VirtualCaseImport, $request->file);

            return redirect()->route('dashboard');
        }
    }
