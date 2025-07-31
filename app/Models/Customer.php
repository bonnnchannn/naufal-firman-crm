<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address'];

    /**
     * Mendefinisikan relasi bahwa seorang Customer bisa memiliki banyak Product.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'subscriptions');
    }
}