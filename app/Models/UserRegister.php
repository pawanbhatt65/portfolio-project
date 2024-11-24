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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verify' => 'datetime',
    ];

}
