<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowFileRequestModel extends Model
{
    use HasFactory;

    protected $table = 'borrow_file_requests';
    protected $fillable = [
        'request_id',
        'file_types',
        'other_file',
        'start_date',
        'end_date',
        'reason'
    ];

    protected $casts = [
        'file_types' => 'array',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
