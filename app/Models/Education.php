<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Education extends Model
{
    protected $fillable = [
        'user_id' , 
        'degree' , 
        'school' , 
        'start_date' ,
        'end_date' ,
        'description' , 
    ] ;


    public function user(): BelongsTo 
    {
        return $this -> belongsTo(User::class) ; 
    }

}
