<?php namespace App\Http\Controllers\Ingest\RCR;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\RCR\CallImport;

    class CallsController extends Controller
    {
        protected function store(Request $request) {
            \Excel::import(new CallImport, $request->file);

            return redirect()->route('ingest.rcr.schedule');
        }
    }
