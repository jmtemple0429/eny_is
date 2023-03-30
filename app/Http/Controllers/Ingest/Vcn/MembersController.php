<?php namespace App\Http\Controllers\Ingest\Vcn;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Imports\Vcn\MemberImport;
    use App\Imports\Vcn\GapImport;
    use App\Imports\Vcn\QualificationImport;
    use App\Imports\Vcn\PhoneNumberImport;
    use App\Imports\Vcn\LanguageImport;

    class MembersController extends Controller
    {
        public function store(Request $request) {
            \Excel::import(new MemberImport, $request->file);
            \Excel::import(new GapImport, $request->file);
            \Excel::import(new QualificationImport, $request->file);
            \Excel::import(new PhoneNumberImport, $request->file);
            \Excel::import(new LanguageImport, $request->file);

            return redirect()->route('ingest.vcn.positions');
        }
    }
