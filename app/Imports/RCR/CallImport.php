<?php namespace App\Imports\RCR;
    use App\Models\Call;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Carbon\Carbon;
    use Illuminate\Support\Str;

    class CallImport extends BaseImport implements ToModel, WithHeadingRow
    {
        public function headingRow() : int {
            return 1;
        }
        /**
        * @param array $row
        *
        * @return \Illuminate\Database\Eloquent\Model|null
        */
        public function model(array $row)
        {
           // dd($row);
            $addressParts = explode(", ", $row['eventaddress']);

            return new Call([
                'noggin_id'         => $row['nogginid'],
                'call_id'           => $row['callid'],
                'date'              => Carbon::parse($row['dateandtimeofcall']),
                'caller_type'       => $row['typeofcaller'],
                'address_key'       => $addressParts[0] . ", " . $addressParts[1] . ", NY",
                'address'           => $addressParts[0],
                'unit'              => trim($row['unit']),
                'city'              => $addressParts[1],
                'county'            => str_replace(' County', '',str_replace('St.','Saint',$row['countyname'])),
                'county_key'        => str_replace(' County', '',str_replace('St.','Saint',$row['countyname'])),
                'chapter'           => $row['chaptername'],
                'status'            => $row['eventstatus'],
                'nature'            => $row['natureofcalltext'],
                'is_suspended'      => ($row['suspendcall'] === "Yes") ? true : false,
                'suspended_at'      => ($row['eventsuspendedtimestamp'] === null) ? null : Carbon::parse($row['eventsuspendedtimestamp']),
                'dro'               => $row['dro'],
                'dispatcher'        => $row['calltakenby'],
                'structure_type'    => $row['structuretype'],
                'units'             => $row['numberofunitsaffected'] ?? 0,
                'adults'            => $row['numberofadults'] ?? 0,
                'children'           => $row['numberofchildren'] ?? 0,
                'fatalities'        => $row['numberoffatalities'] ?? 0,
                'injuries'          => $row['numberofinjuries'] ?? 0,
                'activate_dat'      => ($row['activatedat'] === "Yes") ? true : false,
                'automatic_dispatch'=> ($row['automaticdatdispatch'] === "Yes") ? true : false,
                'alert_at'          => ($row['alerttimestamp'] === null) ? null : Carbon::parse($row['alerttimestamp']),
                'dro_call_at'       => ($row['drocalltimestamp'] === null) ? null : Carbon::parse($row['drocalltimestamp']),
                'dro_event_at'      => ($row['droeventtimestamp'] === null) ? null : Carbon::parse($row['droeventtimestamp']),
                'dispatch_at'       => ($row['dispatchtimestamp'] === null) ? null : Carbon::parse($row['dispatchtimestamp']),
                'acknowledged_at'   => ($row['acknowledgedtimestamp'] === null) ? null : Carbon::parse($row['acknowledgedtimestamp']),
                'assigned_at'       => ($row['assignedtimestamp'] === null) ? null : Carbon::parse($row['assignedtimestamp']),
                'follow_up_at'      => ($row['followuptimestamp'] === null) ? null : Carbon::parse($row['followuptimestamp']),
                'close_casework_at' => ($row['closecaseworktimestamp'] === null) ? null : Carbon::parse($row['followuptimestamp']),
                'on_scene_at'       => ($row['onscenetimestamp'] === null) ? null : Carbon::parse($row['onscenetimestamp']),
                'off_scene_at'      => ($row['offscenetimestamp'] === null) ? null : Carbon::parse($row['offscenetimestamp']),
                'closed_at'         => ($row['closedtimestamp'] === null) ? null : Carbon::parse($row['closedtimestamp']),
                'iir_at'            => ($row['iircreateddateandtime'] === null) ? null : Carbon::parse($row['iircreateddateandtime']),
                'iir'               => $row['iir'],
                'has_iir'           => ($row['iircreated'] === "Yes") ? true : false,
                'type'              => Str::before($row['eventtype'], "- "),
                'type_text'         => Str::after($row['eventtype'], "- "),
                'is_closed'         => ($row['closeevent'] === "Yes") ? true : false,
                'added_regional_resources' => ($row['addedregionalresources'] === "Yes") ? true : false,
                'closure_reason'    => $row['reasonforeventclosure'],
                'ingest_id'         => cache('ingest')->id
            ]);
        }
    }
