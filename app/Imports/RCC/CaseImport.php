<?php namespace App\Imports\RCC;
    use App\Models\DisasterCase;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Carbon\Carbon;

    class CaseImport extends BaseImport implements ToModel, WithHeadingRow
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
            $addressParts = explode(",", $row['intake_pre_disaster_address']);
            return new DisasterCase([
                'case_number'       => $row['case_number'],
                'address_key' => $addressParts[0] . ", " . $addressParts[1] . ", NY",
                'address'           => $addressParts[0],
                'city'              => $addressParts[1],
                'county'            => $addressParts[3],
                'county_key'        => $addressParts[3],
                'household'         => $row['account_name_account_name'],
                'responder1'   => $this->normalizeName($row["created_by_full_name"]),
                'responder2'  => $this->normalizeName($row["second_responder_full_name"]),
                'status'            => $row['status'],
                'amount_disbursed'  => $row['total_amount_disbursed'],
                'date'              => Carbon::parse($row['datetime_opened']),
                'event'             => $row['event_event'],
                'ingest_id'         => cache('ingest')->id
            ]);
        }

        private function normalizeName($name) {
            if(is_null($name)) 
                return $name;

            $nameParts = explode(" ", ucwords(strtolower($name)));

            return $nameParts[1] . ", " . $nameParts[0];
        }
    }
