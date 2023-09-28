<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Product extends Model
{
    protected $fillable = [
        `product_id`,
         `name`, `description`,
          `price`, `category`,
           `photo`, `int_stock`,
            `low_stock`,
             `created_at`,
            `updated_at`,
            `product_cost`,
            `product_available_for_sale`,
                `product_status`,
                `slug`
        ];
   
}
