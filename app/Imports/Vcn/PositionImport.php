<?php namespace App\Imports\Vcn;
    use App\Models\Position;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;
    use Illuminate\Support\Str;

    class PositionImport extends BaseImport implements ToModel, WithHeadingRow
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
           if($row['archived'] === "No" && $row['focis_category'] === "Disaster Services") {
                return new Position([
                    'name'      => trim(Str::after($row['position_name_hyperlink_to_configuration'],": ")),
                    'type'      => $row['position_type'],
                    'sub_type'  => $row['position_sub_type'],
                    'ingest_id'         => cache('ingest')->id
                ]);
           }
        }
    }
