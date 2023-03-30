<?php namespace App\Imports\Vcn;
    use App\Models\Language;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;

    class LanguageImport extends BaseImport implements ToModel, WithHeadingRow
    {
        public function headingRow() : int {
            return 4;
        }

        /**
        * @param array $row
        *
        * @return \Illuminate\Database\Eloquent\Model|null
        */
        public function model(array $row)
        {
            $array = [];

            if($row['second_language']) {
                $array[] = [
                    'name'       => $row['second_language'],
                    'speak'      => $row['speak_2nd'],
                    'write'      => $row['write_2nd'],
                    'read'       => $row['read_2nd'],
                    'account_id' => $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
            }

            
            if($row['third_language']) {
                $array[] = [
                    'name'       => $row['third_language'],
                    'speak'      => $row['speak_3rd'],
                    'write'      => $row['write_3rd'],
                    'read'       => $row['read_3rd'],
                    'account_id' => $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
            }

            Language::insert($array);
        }
    }
