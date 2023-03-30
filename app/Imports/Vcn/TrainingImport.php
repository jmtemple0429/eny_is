<?php namespace App\Imports\Vcn;
    use App\Models\Training;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Illuminate\Support\Str;
    use PhpOffice\PhpSpreadsheet\Shared\Date;

    class TrainingImport extends BaseImport implements ToModel, WithHeadingRow
    {
        public function headingRow() : int {
            return 6;
        }
        /**
        * @param array $row
        *
        * @return \Illuminate\Database\Eloquent\Model|null
        */
        public function model(array $row)
        {
            return new Training([
                'date'              => Date::excelToDateTimeObject($row['start_date']),
                'data_source'       => $row['data_source'],
                'course_name'       => $row['course_name'],
                'primary_subject'   => $row['primary_subject'],
                'detailed_subject'  => $row['detailed_subject'],
                'account_id'        => $row['account_id'],
                'ingest_id'         => cache('ingest')->id
            ]);
        }
    }
