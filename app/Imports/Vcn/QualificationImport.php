<?php namespace App\Imports\Vcn;
    use App\Models\Qualification;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;

    class QualificationImport extends BaseImport implements ToModel, WithHeadingRow
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
            if($row['qualifications']) {
                $qualificationsList = explode(",",$row['qualifications']);

                $array = [];

                foreach($qualificationsList as $qualification) {
                    $array[] = [
                        'account_id'    => $row['account_id'],
                        'name'          => $qualification,
                        'ingest_id'         => cache('ingest')->id
                    ];
                }

                Qualification::insert($array);
            }
        }
    }
