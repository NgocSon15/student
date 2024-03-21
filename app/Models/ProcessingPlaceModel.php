<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessingPlaceModel extends Model
{
    use HasFactory;

    protected $table = 'processing_places';
    protected $fillable = [
        'name',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
