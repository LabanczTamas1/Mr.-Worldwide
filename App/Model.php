<?php
namespace App;
use App\Database;
class Model
{
    public string $table;
    protected $primaryKey = 'id';
    protected array $attributes;
    protected static Database $DB;
    function __construct($param = null)
    {
        if ($param) $this->create($param);

        self::$DB = new Database;
    }
    public function createCollection(array $query): array
    {
        $modelArray = array();

        $modelClass = get_class($this);

        $refl = new \ReflectionClass($modelClass);
        foreach ($query as $item) {
            array_push($modelArray, new $refl->name($item));

        }
        return $modelArray;
    }
    public function create($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }
    
}