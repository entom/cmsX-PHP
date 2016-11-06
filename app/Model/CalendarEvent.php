<?php

namespace App\Model;

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
        'title', 'description', 'event_date', 'calendar_event_category_id'
    ];

    /**
     * category method
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\CalendarEventCategory', 'calendar_event_category_id', 'id');
    }

    /**
     * getAllWithCategory method
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllWithCategory() {
        return self::with('category')->get();
    }

}
