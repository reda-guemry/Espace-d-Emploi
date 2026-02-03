<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Experience extends Model
{
    protected $fillable = [
        'user_id' , 
        'position' , 
        'company_name' , 
        'start_date' , 
        'end_date' , 
        'description' , 
    ] ;


    public function user () :BelongsTo 
    {
        return $this -> belongsTo(User::class) ; 
    }

    


}
