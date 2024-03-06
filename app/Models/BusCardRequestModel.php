<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusCardRequestModel extends Model
{
    use HasFactory;

    protected $table = 'bus_card_requests';
    protected $fillable = [
        'request_id',
        'bus_number',
        'interline_bus_type',
        'address',
        'phone_number',
        'process_place',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
