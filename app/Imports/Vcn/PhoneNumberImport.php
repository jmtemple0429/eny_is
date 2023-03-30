<?php namespace App\Imports\Vcn;
    use App\Models\PhoneNumber;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;

    class PhoneNumberImport extends BaseImport implements ToModel, WithHeadingRow
    {
        public function headingRow() : int {
            return 4;
        }

        private function toE164($number) {
            $number = str_replace('(','',
                str_replace(')','',
                str_replace('-','',$number)
            ));

            return (strlen($number) === 10) ?
                "+1" . $number : "+" . $number; 
        }
        /**
        * @param array $row
        *
        * @return \Illuminate\Database\Eloquent\Model|null
        */
        public function model(array $row)
        {
            $array = [];

            if($row['home_phone']) {
                $array[] = [
                    'number'     => encrypt($this->toE164($row['home_phone'])),
                    'key'        => hash('sha256',$this->toE164($row['home_phone'])),
                    'label'      => encrypt('Home Phone'),
                    'account_id' => $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
            }

            if($row['cell_phone']) {
                $array[] = [
                    'number'     => encrypt($this->toE164($row['cell_phone'])),
                    'key'        => hash('sha256',$this->toE164($row['cell_phone'])),
                    'label'      => encrypt('Cell Phone'),
                    'account_id' => $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
            }

            if($row['work_phone']) {
                $array[] = [
                    'number'     => encrypt($this->toE164($row['work_phone'])),
                    'key'        => hash('sha256',$this->toE164($row['work_phone'])),
                    'label'      => encrypt('Work Phone'),
                    'account_id' => $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
            }

            PhoneNumber::insert($array);
        }
    }
