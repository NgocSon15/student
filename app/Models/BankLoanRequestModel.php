<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankLoanRequestModel extends Model
{
    use HasFactory;

    protected $table = 'bank_loan_requests';
    protected $fillable = [
        'request_id',
        'reason',
        'tuition_type'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
