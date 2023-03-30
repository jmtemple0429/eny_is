<?php namespace App\Http\Controllers\Ingest\VCN;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\VCN\TrainingImport;

    class TrainingsController extends Controller
    {
        protected function store(Request $request) {
            \Excel::import(new TrainingImport, $request->file);

            return redirect()->route('dashboard');
        }
    }
