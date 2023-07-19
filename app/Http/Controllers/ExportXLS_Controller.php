<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Maatwebsite\Excel\Facades\Excel;
Use App\Exports\RequirementBin_Excel;
Use App\Exports\RequirementBin_PDF;


class ExportXLS_Controller extends Controller
{
    public function export_requirementbin(){

        return Excel::download(new RequirementBin_Excel, 'Requirement-Bin-Reports.xlsx') ;

    }

    private $excel;

    public function __construct(Excel $excel){
        $this->excel = $excel;
    }

    public function export_requirementbin_pdf(){

        // return Excel::download(new RequirementBin_PDF, 'Requirement-Bin-Reports.pdf', Excel::DOMPDF) ;
        return Excel::download(new RequirementBin_PDF, 'Requirement-Bin-Reports.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

}
