<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CalendarEvent
 * @package App
 */
class CalendarEvent extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'event_date'
    ];

}
