<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTypeModel extends Model
{
    use HasFactory;

    protected $table = 'request_types';
    protected $fillable = [
        'type',
        'code',
        'name',
        'table_name',
        'status',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
