<?php

namespace App\Modules\Common\Core\Entities;

use Illuminate\Support\Facades\DB;

class Repository
{
    protected $tableName;

    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
    }

    protected function paginate($builder, $page = 1, $take = 15)
    {
        $registers = $builder->skip($page * $take)->take($take)->get();

        $totalRegisters = DB::table($this->tableName)->count();
        $lastPage = ceil($totalRegisters / $take);

        return [
            'data' => $registers,
            'total' => $take,
            'currentPage' => $page,
            'lastPage' => $lastPage
        ];
    }

    protected function whereLike($builder, $columnName, $value)
    {
        return $builder->whereRaw(
            "UPPER($columnName) LIKE UPPER(?)",
            ["%$value%"]
        );
    }
}
