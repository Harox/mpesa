<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model{

    protected $fillable =[
        'type','number','value','reference','thirdReference','conversationId','transactionId','method','description','status'
    ];

    protected $table = 'payments';
}
