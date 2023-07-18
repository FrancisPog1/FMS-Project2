<?php


namespace App\Exports;

use App\Models\Activities;


Use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class RequirementBin_Excel implements FromView
{
    use Exportable;
    /**
     *
     *     @return \Illuminate\Support\Collection
     */



    public function view(): View
    {

        return view('Academic_Head.AcadHead_Setup.AcadHead_Reports.submission_reports', [
                    'requirementbins' => Activities::all()
        ]);

    }
}
