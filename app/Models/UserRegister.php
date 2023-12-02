<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserRegister extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = "user_registers";
    protected $primaryKey = "user_register_id";
    public $timestamps = true;
    public $softDeletes = true;

    protected $fillable = [
        "user_register_id", "name", "phone", "email", "email_verify", "password", "confirm_password", "added_at", "edited_at",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'confirm_password',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
        $this->attributes['confirm_password'] = bcrypt($value);
    }
}
