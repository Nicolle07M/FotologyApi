<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fotografo', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nameUser');
            $table->string('username');
            $table->string('phone');
            $table->string('adress');
            $table->date('birthday');
            $table->string('image');
            $table->text('description');
            $table->string('password');
            $table->string('facebook')->nullable()->change();
            $table->string('instagram')->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotografo');
    }
};
