<?php


namespace App\Exports;

use App\Models\User;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;


class RequirementBin_Excel implements FromCollection, ShouldAutoSize, WithMapping
{
    /**
     *
     *     @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        $user = User::with('requirementbin')->get();
        dd($user);

    }

    public function map($user): array {
        return [
            $user->title,
            $user->email,
            $user->requirementbin->title,

        ];
    }
}
