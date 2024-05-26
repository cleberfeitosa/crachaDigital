<?php

namespace App\Modules\Common\Core\Entities;

class Repository
{
    protected $tableName;

    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
    }

    protected function paginate($builder, $page = 1, $take = 15)
    {
        $page = max(1, $page ?? 1);
        $take = max(1, $take ?? 15);

        $totalRegisters = $builder->count();

        // Calcular a página atual garantindo que não ultrapasse o número total de páginas
        $currentPage = min(ceil($totalRegisters / $take), $page);

        // Calcular o deslocamento
        $skip = ($currentPage - 1) * $take;

        $registers = $builder->skip($skip)->take($take)->get();
        $lastPage = ceil($totalRegisters / $take);

        return [
            'data' => $registers,
            'total' => $totalRegisters,
            'currentPage' => $currentPage,
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

    /**
     * @param Model $entity Entidade a ser salva
     */
    function save($entity)
    {
        $entity->save();
        $entity->refresh();
        return $entity;
    }
    /**
     * Salva múltiplos registros.
     *
     * @param array $entities Array de entidades a serem salvas.
     * @return array Array de entidades salvas.
     */
    function saveMany($entities)
    {
        $savedEntities = [];

        foreach ($entities as $entity) {
            $savedEntities[] = $this->save($entity);
        }

        return $savedEntities;
    }
}
