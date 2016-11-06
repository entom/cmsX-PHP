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

}
