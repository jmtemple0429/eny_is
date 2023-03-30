<?php namespace App\Http\Controllers\Ingest\Vcn;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\Vcn\PositionImport;

    class PositionsController extends Controller
    {
        public function store(Request $request) {
            \Excel::import(new PositionImport, $request->file);

            return redirect()->route('ingest.vcn.assigned_positions');
        }
    }
