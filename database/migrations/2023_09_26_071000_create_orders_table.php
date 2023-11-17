<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->unsignedBigInteger('user_id'); // Foreign key referencing Customers Table
            $table->date('order_date');
            $table->string('status'); // e.g., "pending," "shipped," "delivered"
            $table->decimal('total_amount', 10, 2); // Decimal for total amount
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}