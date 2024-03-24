<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseRentalRequestModel extends Model
{
    use HasFactory;

    protected $table = 'house_rental_requests';
    protected $fillable = [
        'request_id',
        'name',
        'start_date',
        'end_date',
        'priority',
        'address',
        'phone_number',
        'email',
        'contact_method',
        'files',
        'fee',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'files' => 'array'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
