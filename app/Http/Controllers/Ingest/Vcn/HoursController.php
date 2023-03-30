<?php namespace App\Http\Controllers\Ingest\VCN;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\VCN\HourImport;

    class HoursController extends Controller
    {
        protected function store(Request $request) {
            \Excel::import(new HourImport, $request->file);

            return redirect()->route('ingest.vcn.trainings');
        }
    }
