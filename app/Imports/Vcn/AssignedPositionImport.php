<?php namespace App\Imports\Vcn;
    use App\Models\AssignedPosition;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Illuminate\Support\Str;
    use PhpOffice\PhpSpreadsheet\Shared\Date;

    class AssignedPositionImport extends BaseImport implements ToModel, WithHeadingRow
    {
        public function headingRow() : int {
            return 5;
        }
        /**
        * @param array $row
        *
        * @return \Illuminate\Database\Eloquent\Model|null
        */
        public function model(array $row)
        {
            return new AssignedPosition([
                'name'          => trim(Str::after($row['position'],": ")),
                'reports_to'    => trim(Str::after($row['reports_to_position'], ": ")),
                'started_at'    => Date::excelToDateTimeObject($row['position_start_date']),
                'supervisor'    => $row['supervisor'],
                'account_id'    => $row['account_id'],

                'ingest_id'         => cache('ingest')->id
            ]);
        }
    }
