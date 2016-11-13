<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class BaseModel
 * @package App
 */
class BaseModel extends Model
{

    /**
     * @param $sql
     * @return mixed
     */
    public function selectQuery($sql)
    {
        return DB::select($sql);
    }

    /**
     * @param $sql
     */
    public function sqlStatement($sql)
    {
        DB::statement($sql);
    }

    /**
     * convertCreatedDates method
     * @param $object
     */
    public static function convertCreatedDates(&$object)
    {
        $object->created_date = date('Y-m-d', strtotime($object->created_at));
        $object->created_time = date('H:i:s', strtotime($object->created_at));
    }

    /**
     * convertCreatedDates method
     * @param $object
     */
    public static function convertUpdatedDates(&$object)
    {
        $object->updated_date = date('Y-m-d', strtotime($object->updated_at));
        $object->updated_time = date('H:i:s', strtotime($object->updated_at));
    }

}
