<?php


namespace App\Exports;

use App\Models\RequirementBin;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class RequirementBin_Excel implements FromCollection
{
    /**
     *
     *     @return \Illuminate\Support\Collection
     */



    public function collection()
    {

        return RequirementBin::all();

    }
}
