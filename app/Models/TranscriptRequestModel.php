<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranscriptRequestModel extends Model
{
    use HasFactory;

    protected $table = 'transcript_requests';
    protected $fillable = [
        'request_id',
        'is_all_semesters',
        'semesters',
        'transcript_type',
        'number_of_copies_vi',
        'number_of_copies_en',
        'reason'
    ];

    protected $casts = [
        'semesters' => 'array'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
