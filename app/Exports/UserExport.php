<?php

namespace App\Exports;

use App\Armys;
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
        return Armys::select("fullname","no_identity","email","agent_code","address","phone_number")->get();
    }

    public function headings() :array
    {
        return ["Name","Number Identity","Email","Agent Code","Address", "Phone Number"];
    }
}
