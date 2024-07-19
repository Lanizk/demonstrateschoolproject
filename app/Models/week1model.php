<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class week1model extends Model
{
    use HasFactory;
    protected $table = 'week';
    static public function getRecord()
    {
        return week1model::get();
    }

    static public function getWeekUsingName($weekName)
    {
        return week1model::where('name', '=', $weekName)->first();
    }
}
