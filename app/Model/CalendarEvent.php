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
        return $this->belongsTo('App\Model\CalendarEventCategory', 'calendar_event_category_id', 'id');
    }

    /**
     * getAllWithCategory method
     * @param null $start
     * @param null $end
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllWithCategory($start = null, $end = null) {
        if($start != null && $end != null) {
            $start = date('Y-m-d', strtotime($start));
            $end = date('Y-m-d', strtotime($end));
            $conds = [
                ['event_date', '>=', $start],
                ['event_date', '<=', $end],
            ];
            $data = self::with('category')->where($conds)->get();
        } else {
            $data = self::with('category')->get();
        }

        return $data;
    }

}
