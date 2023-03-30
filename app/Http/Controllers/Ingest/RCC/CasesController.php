<?php namespace App\Http\Controllers\Ingest\RCC;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\RCC\CaseImport;

    class CasesController extends Controller
    {
        protected function store(Request $request) {
            \Excel::import(new CaseImport, $request->file);

            return redirect()->route('ingest.rcc.events');
        }
    }
