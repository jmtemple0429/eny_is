<?php namespace App\Http\Controllers\Ingest\RCR;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Carbon\Carbon;
    use App\Models\Member;
    use App\Models\Shift;

    use App\Imports\RCR\CallImport;

    class ScheduleController extends Controller
    {
        protected $days = 5;

        protected function create() {
            return view('ingest.rcr.schedule',[
                'days' => range(1,$this->days)
            ]);
        }

        protected function store(Request $request) {
            $rightNow = Carbon::now();

            $members = Member::all();

            $shifts = [];

            $standardAddition = 0;
            $endAddition = 1;
            
            foreach(range(1, $this->days) as $day) {
                $shifts = array_merge($shifts, [
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,0,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition, 6, 0, 0, 'America/New_York'),
                        'type' => 'Primary',
                        'member' => $this->getMemberByName($members, $request->get("doDay" . $day . "Shift1")),
                        'ingest_id'         => cache('ingest')->id
                    ],
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,6,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition, 12, 0, 0, 'America/New_York'),
                        'type' => 'Primary',
                        'member' => $this->getMemberByName($members,  $request->get("doDay" . $day . "Shift2")),
                        'ingest_id'         => cache('ingest')->id
                    ],
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,12,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition, 18, 0, 0, 'America/New_York'),
                        'type' => 'Primary',
                        'member' => $this->getMemberByName($members,  $request->get("doDay" . $day . "Shift3")),
                        'ingest_id'         => cache('ingest')->id
                    ],
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,18,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $endAddition, 0, 0, 0, 'America/New_York'),
                        'type' => 'Primary',
                        'member' => $this->getMemberByName($members,  $request->get("doDay" . $day . "Shift4")),
                        'ingest_id'         => cache('ingest')->id
                    ],
    
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,0,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition, 6, 0, 0, 'America/New_York'),
                        'type' => 'Backup',
                        'member' => $this->getMemberByName($members,  $request->get("backupDay" . $day . "Shift1")),
                        'ingest_id'         => cache('ingest')->id
                    ],
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,6,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition, 12, 0, 0, 'America/New_York'),
                        'type' => 'Backup',
                        'member' => $this->getMemberByName($members,  $request->get("backupDay" . $day . "Shift2")),
                        'ingest_id'         => cache('ingest')->id
                    ],
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,12,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition, 18, 0, 0, 'America/New_York'),
                        'type' => 'Backup',
                        'member' => $this->getMemberByName($members,  $request->get("backupDay" . $day . "Shift3")),
                        'ingest_id'         => cache('ingest')->id
                    ],
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,18,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $endAddition, 0, 0, 0, 'America/New_York'),
                        'type' => 'Backup',
                        'member' => $this->getMemberByName($members,  $request->get("backupDay" . $day . "Shift4")),
                        'ingest_id'         => cache('ingest')->id
                    ],
                    [
                        'starts_at' => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $standardAddition,8,0,0,'America/New_York'),
                        'ends_at'   => Carbon::create($rightNow->year, $rightNow->month, $rightNow->day + $endAddition, 8, 0, 0, 'America/New_York'),
                        'type' => 'Supervisor',
                        'member' => $this->getMemberByName($members,  $request->get("supervisor" . $day)),
                        'ingest_id'         => cache('ingest')->id
                    ],
                ]);
            }

            Shift::insert($shifts);
        }

        public function getMemberByName($members, $name) {
            if($name === null) return null;

            $nameParts = explode(" ", $name);
            
            return $nameParts[1] . ", " . $nameParts[0];
        }
    }
