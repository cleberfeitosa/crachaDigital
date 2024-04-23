<?php

namespace App\Modules\Common\Core\Entities;

use Illuminate\Support\Facades\DB;

class Repository
{
    protected $builder;
    protected $tableName;


    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
        $this->builder = DB::table($tableName);
    }

    protected function paginate($page = 1, $take = 15)
    {
        $registers = $this->builder->skip($page * $take)->take($take)->get();

        $totalRegisters = DB::table($this->tableName)->count();
        $lastPage = ceil($totalRegisters / $take);

        return [
            'data' => $registers,
            'total' => $take,
            'currentPage' => $page,
            'lastPage' => $lastPage
        ];
    }

    protected function whereLike($columnName, $value)
    {
        $this->builder->whereRaw(
            "UPPER($columnName) LIKE UPPER(?)",
            ["%$value%"]
        );
    }
}
