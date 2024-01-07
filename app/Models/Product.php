<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "products";
    protected $primaryKey = "product_id";
    public $timestamps = true;
    public $softDeletes = true;

    protected $fillable = [
        'product_id', 'name', 'price', 'image', 'description', 'user_id', 'added_at', 'edited_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
