<?php namespace App\Imports\Vcn;
    use App\Models\HourListing;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Illuminate\Support\Str;
    use PhpOffice\PhpSpreadsheet\Shared\Date;

    class HourImport extends BaseImport implements ToModel, WithHeadingRow
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
            return new HourListing([
                'account_id'       => $row['account_id'],
                'hours'            => $row['hours'],
                'date'             => Date::excelToDateTimeObject($row['date']),
                'activity'          => $row['activity'],
                'type'              => $row['hours_type'],
                'position'          => trim(Str::after($row['position'],":")),
                'ingest_id'         => cache('ingest')->id
            ]);
        }
    }
