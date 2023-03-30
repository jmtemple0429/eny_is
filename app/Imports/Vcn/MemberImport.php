<?php namespace App\Imports\Vcn;
    use App\Models\Member;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Imports\BaseImport;

    class MemberImport extends BaseImport implements ToModel, WithHeadingRow
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
            $nameParts = explode(", ", $row['account_name']);

            return new Member([
                    'first_name'        => $this->normalizeText($nameParts[1]),
                    'last_name'         => $this->normalizeText($nameParts[0]),
                    'account_name'      => $this->normalizeText($row['account_name']),
                    'chapter'           => $row['chapter_name'],
                    'status'            => $row['current_status'],
                    'is_responder'      => ($row['dis_responder'] === "Yes") ? true : false,
                    'email'             => $row['email'],
                    'email_key'         => $row['email'],
                    'second_email'      => $row['second_email'],
                    'second_email_key'  => $row['second_email'],
                    'address'           => $this->normalizeText($row['address']),
                    'city'              => $this->normalizeText($row['city']),
                    'county'            => $this->normalizeText(str_replace(" County","",str_replace("St.","Saint",$row['county_of_residence']))),
                    'county_key'        => $this->normalizeText(str_replace(" County","",str_replace("St.","Saint",$row['county_of_residence']))),
                    'availability'      => $row['geog_availability'],
                    'available_now'     => ($row['available_now'] === "Yes") ? true : false,
                    'member_number'     => $row['member_number'],
                    'account_id'        => $row['account_id'],
                    'dr'                => ($row['last_action'] !== "Out Process") ? $row['dr'] : null,
                    'ingest_id'         => cache('ingest')->id
            ]);
        }
    }
