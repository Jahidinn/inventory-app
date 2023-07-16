<?php

namespace App\Models;

use App\Models\Items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(Items::class);
    }

    public function getRouteKeyName()
    {
        return 'unit_id';
    }
}
