<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Maatwebsite\Excel\Facades\Excel;
Use App\Exports\RequirementBin_Excel;

class ExportXLS_Controller extends Controller
{
    public function export_requirementbin(){

        return Excel::download(new RequirementBin_Excel, 'Requirement-Bin-Reports.xlsx') ;

    }

}
