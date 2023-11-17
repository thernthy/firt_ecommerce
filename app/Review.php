<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
    protected $fillable = ['product_id', 'user_id', 'comment', 'rating'];

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
