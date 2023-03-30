<?php namespace App\Http\Controllers\Ingest\RCC;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\RCC\EventImport;

    class EventsController extends Controller
    {
        protected function store(Request $request) {
            \Excel::import(new EventImport, $request->file);

            return redirect()->route('ingest.rcc.clients');
        }
    }
