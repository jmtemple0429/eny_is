<?php namespace App\Imports\RCC;
    use App\Models\RccProfile;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Carbon\Carbon;
    use Illuminate\Support\Str;

    class UserImport extends BaseImport implements ToModel, WithHeadingRow
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
            return new RccProfile([
                'account_name' => str_replace('-','',str_replace(',','',explode(" ",$row['last_name'])[0])) . ", " . $row['first_name'],
                'job'   => $row['job'],
                'is_active' => $row['active'],
                'ingest_id'         => cache('ingest')->id
            ]);
        }
    }
