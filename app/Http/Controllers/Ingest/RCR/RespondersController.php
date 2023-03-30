<?php namespace App\Http\Controllers\Ingest\RCR;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Carbon\Carbon;
    use App\Models\Responder;
    use App\Models\Shift;

    use App\Imports\RCR\CallImport;

    class RespondersController extends Controller
    {
        private $responders = 5;

        protected function store(Request $request) {
            $array = [];


            foreach(range(1,$this->responders) as $responder) {
                $nameParts = explode(" ",$request->get('responder' . $responder . "name"));

                if($request->get('responder' . $responder . "role")) {
                    $array[] = [
                        'call_id'       => $request->callId,
                        'role'          => $request->get('responder' . $responder . "role"),
                        'name'          => $nameParts[1] . ", " . $nameParts[0],
                        'status'        => $request->get('responder' . $responder . "status"),
                        'proximity'     => $request->get('responder' . $responder . "proximity"),
                        'created_at'    => Carbon::now(),
                        'ingest_id'         => cache('ingest')->id
                    ];
                }

                Responder::insert($array);

                return redirect()->route('dashboard');
            }

        }
    }
