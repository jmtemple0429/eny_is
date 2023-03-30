<?php namespace App\Imports\RCC;
    use App\Models\Client;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Carbon\Carbon;

    class ClientImport extends BaseImport implements ToModel, WithHeadingRow
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
            return new Client([
                'name' => strtoupper($row['clients_id']),
                'household' => $row['account_name_account_name'],
                'age' => $row['age'],
                'military' => $row['military_affiliation'],
                'ingest_id'         => cache('ingest')->id
            ]);
        }
    }
