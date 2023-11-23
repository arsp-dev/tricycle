<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteIsolate extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'date_of_admission',
        'date_of_sample_collection',
        'date_received_arsrl',
        'date_of_testing',
        'date_released',
    ];



    public function site_isolate()
    {
        return $this->belongsTo(Isolate::class);
    }
}
