<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role ; 
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{


    use HasFactory, HasRoles;



    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'specialty' , 
        'profile_photo' , 
        'created_at' , 
        'bio' , 
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>    
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function sentRequests(): HasMany
    {
        return $this -> hasMany(Connection::class , 'sender_id') ; 
    }

    public function receivedRequests(): HasMany
    {
        return $this -> hasMany(Connection::class , 'receiver_id' ) ; 

    }

    public function application(): belongsToMany 
    {
        return $this -> belongsToMany(Application::class) ;
    }

    public function educations(): belongsToMany 
    {
        return $this -> belongsToMany(Education::class) ; 
    }

    public function experiences(): BelongsToMany
    {
        return $this -> belongsToMany (Experience::class) ; 
    }

    public function skills(): BelongsToMany
    {
        return $this -> belongsToMany(Skill::class) ; 
    }




}
