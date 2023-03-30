<?php namespace App\Imports\RCC;
    use App\Models\DisasterCase;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Carbon\Carbon;

    class VirtualCaseImport extends BaseImport implements ToModel, WithHeadingRow
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
            $case = DisasterCase::whereCaseNumber($row['case_number'])
                ->first();   

            $case->is_virtual = true;
            $case->save();
            
        }
    }
