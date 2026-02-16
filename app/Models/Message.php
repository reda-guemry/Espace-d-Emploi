<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    protected $fillable = [
        'sender_id' , 
        'content' , 
        'content' ,
        'type' , 
    ] ;


    public function sender() 
    {
        return $this -> belongsTo(Conversation::class)  ;
    }

}
