<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'vacancie_id' , 
        'user_id' , 
        'message' , 
        'cv_attached' , 

    ] ;


    public function user (): BelongsTo  
    {
        return $this -> belongsTo(User::class) ;
    }

    public function job(): BelongsTo 
    {
        return $this -> belongsTo(Vacancie::class) ;
    }

}
