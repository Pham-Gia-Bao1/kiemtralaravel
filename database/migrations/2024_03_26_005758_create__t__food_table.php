<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_Food', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->json('images')->nullable();
            $table->string('main_img'); // Thêm cột để lưu trữ đường dẫn ảnh
            // Thêm cột để lưu trữ đường dẫn ảnh
            $table->decimal('old_price', 10, 2); // Sử dụng decimal để lưu trữ giá tiền
            $table->decimal('new_price', 10, 2);
            $table->string('description');// Sử dụng decimal để lưu trữ giá tiền mới

            $table->string('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T_Food');
    }
};
