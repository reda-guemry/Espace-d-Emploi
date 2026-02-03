<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; 



class Vacancie extends Model
{
     protected $fillable = [
        'user_id' , 
        'title' , 
        'description' , 
        'image' ,
        'contract_type' , 
        'location' , 
        'status' ,
        'finish_at' , 

    ] ;


    public function user ():BelongsTo  
    {
        return $this -> belongsTo(User::class) ; 
    }


    public function applications(): HasMany 
    {
        return $this -> hasMany(Application::class) ;
    }
    

}
