<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    /**
     * Баннеры c неоткрученными показами
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->whereColumn('views', '<', 'amount');
    }

}
