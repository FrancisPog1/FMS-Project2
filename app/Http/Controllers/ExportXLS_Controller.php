<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Maatwebsite\Excel\Facades\Excel;
Use App\Exports\RequirementBin_Excel;
Use App\Exports\RequirementBin_PDF;
Use App\Exports\Activities_Excel;
Use App\Exports\Activities_PDF;


class ExportXLS_Controller extends Controller
{
    public function export_requirementbin_xls(){

        return Excel::download(new RequirementBin_Excel, 'Requirement-Bin-Reports.xlsx') ;

    }

    public function export_requirementbin_pdf(){

        // return Excel::download(new RequirementBin_PDF, 'Requirement-Bin-Reports.pdf', Excel::DOMPDF) ;
        return Excel::download(new RequirementBin_PDF, 'Requirement-Bin-Reports.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    public function export_activities_xls(){

        return Excel::download(new Activities_Excel, 'Activities_Reports.xlsx') ;
    }

    public function export_activities_pdf(){

        // return Excel::download(new Activities_PDF, 'Requirement-Bin-Reports.pdf', Excel::DOMPDF) ;
        return Excel::download(new Activities_PDF, 'Activities_Reports.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

}
