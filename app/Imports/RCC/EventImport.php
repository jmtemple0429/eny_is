<?php namespace App\Imports\RCC;
    use App\Models\Event;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Carbon\Carbon;
    use Illuminate\Support\Str;

    class EventImport extends BaseImport implements ToModel, WithHeadingRow
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
            return new Event([
                    'event' => $row['event_event'],
                    'type'  => Str::before($row['event_type']," - "),
                    'type_text' => Str::after($row['event_type']," - "),
                    'address' => $row['street'],
                    'city' => $row['city'],
                    'county' => $row['county'],
                    'county_key' => $row['county'],
                    'intake_complete_at'    => Carbon::parse($row['event_created_date']),
                    'happened_at'   => Carbon::parse($row['date_of_event']),
                    'ingest_id'         => cache('ingest')->id
            ]);
        }
    }
