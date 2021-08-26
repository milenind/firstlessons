<?php

namespace App\Models;

class AdminDataTable
{
    private array $models = [];
    private array $table = [];

    public function __construct($data)
    {
        foreach ($data as $row=>$column)
        {
            $this->models[$row] = $column;
        }
    }

    /**
     * @param $records
     * @return array
     */
    public function render($records): array
    {
        foreach ($records as $record){
            $this->table[$record->title] = [];
            foreach ($this->models as  $function) {
                $this->table[$record->title][] = $function($record);
            }
        }
        return $this->table;
    }

}