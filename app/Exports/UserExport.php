<?php

namespace App\Exports;

use App\Users;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Users::all();
    }

    public function headings() :array
    {
        return ["id","Full Name", "Identity Number", "gender","religion", "birthdate","email","education","address","phone number","status", "created"];
    }
}
