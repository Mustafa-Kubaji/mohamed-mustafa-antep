<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{

    public function model(array $row)
    {
        return new Category([
            "name"=>$row[0]
        ]);
    }
}
