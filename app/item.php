<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'item';
    public $timestamps = false;
    protected $primaryKey = 'item_id';
}
