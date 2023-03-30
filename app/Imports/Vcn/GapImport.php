<?php namespace App\Imports\Vcn;
    use App\Models\GAP;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;

    class GapImport extends BaseImport implements ToModel, WithHeadingRow
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

            if($row['primary_gap']) {
                $gapParts = explode("/", $row['primary_gap']);

                $array[] = [
                    'group'     => $gapParts[0],
                    'activity'  => $gapParts[1],
                    'position'  => $gapParts[2],
                    'type'      => 1,
                    'account_id'=> $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
            }

            if($row['secondary_gap']) {
                $gapParts = explode("/", $row['secondary_gap']);

                $array[] = [
                    'group'     => $gapParts[0],
                    'activity'  => $gapParts[1],
                    'position'  => $gapParts[2],
                    'type'      => 2,
                    'account_id'=> $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
            }

            if($row['tertiary_gap']) {
                $gapParts = explode("/", $row['tertiary_gap']);

                $array[] = [
                    'group'     => $gapParts[0],
                    'activity'  => $gapParts[1],
                    'position'  => $gapParts[2],
                    'type'      => 3,
                    'account_id'=> $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
            }

            if($row['additional_gaps']) {
               $otherGaps = explode(",", $row['additional_gaps']);

               foreach($otherGaps as $gap) {
                $gapParts = explode("/", $gap);

                $array[] = [
                    'group'     => $gapParts[0],
                    'activity'  => $gapParts[1],
                    'position'  => $gapParts[2],
                    'type'      => 4,
                    'account_id'=> $row['account_id'],
                    'ingest_id'         => cache('ingest')->id
                ];
               }
            }

            GAP::insert($array);
        }
    }
