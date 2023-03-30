<?php namespace App\Http\Controllers\Ingest\Vcn;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\Vcn\AssignedPositionImport;

    class AssignedPositionsController extends Controller
    {
        public function store(Request $request) {
            \Excel::import(new AssignedPositionImport, $request->file);

            return redirect()->route('ingest.vcn.hours');
        }
    }
