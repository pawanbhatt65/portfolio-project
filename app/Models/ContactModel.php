<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $table = "contact";
    protected $primaryKey = "contact_id";
    public $timestamps = true;
    protected $softDeleted = false;

    protected $fillable = [
        'contact_id', 'name', 'phone', 'email', 'subject', 'message', 'query_time',
    ];
}
