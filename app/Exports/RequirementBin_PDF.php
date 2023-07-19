<?php


namespace App\Exports;

use App\Models\User;
Use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;

class RequirementBin_PDF implements FromCollection,
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents
{
    /**
     *
     *     @return \Illuminate\Support\Collection
     */

    //For exporting PDF
     public function registerEvents(): array
     {
         return [


             // Register an event listener that will be fired before the export process starts.
             BeforeExport::class => function (BeforeExport $event) {
                 // Do something before the export process starts.

             },

             // Register an event listener that will be fired after the export process ends.
             AfterExport::class => function (AfterExport $event) {
                 // Do something after the export process ends.
             },
         ];
     }


    public function collection()
    {


        return User::with('requirementbin','profile')->get();



    }

    public function map($user): array {
        $mappedData = [];

    foreach ($user->requirementbin as $requirementbin) {
        $first_name = $user->profile->first_name;
        $last_name = $user->profile->last_name;
        $name = $first_name . " " . $last_name;


        $requirementbin->start_datetime = Carbon::parse($requirementbin->start_datetime)->format('F d, Y h:i A');
        $requirementbin->end_datetime = Carbon::parse($requirementbin->end_datetime)->format('F d, Y h:i A');


        $mappedData[] = [
            'Created by' => $name,
            'Date Posted' => $requirementbin->created_at,
            'Title' => $requirementbin->title,
            'Date Started' => $requirementbin->start_datetime,
            'Deadline' => $requirementbin->end_datetime,
            'Status' => $requirementbin->status,


        ];
    }

    return $mappedData;
    }

    public function headings(): array{

        return[
            'Posted by',
            'Date Posted',
            'Title',
            'Date Started',
            'Deadline',
            'Status'
        ];
    }


    // public function registerEvents(): array {

    //     return [

    //         Aftersheet::class => function(Aftersheet $event){
    //             $event->sheet->getStyle('A1:F1')->applyFromArray([

    //                 'font' => [
    //                     'bold' => true
    //                 ]

    //             ]);
    //         }

    //     ];
    // }
}
