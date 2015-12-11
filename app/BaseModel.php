<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function scopeFindByKey($query, $key)
    {
        return $query->where('key', $key);
    }
}