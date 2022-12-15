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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Name');
            $table->date('Joining_Date');
            $table->text('Address');
            $table->foreignId('Specialization_id')->constrained('specializations','id')->cascadeOnDelete();
            $table->foreignId('Gender_id')->constrained('genders','id')->cascadeOnDelete();
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
        Schema::dropIfExists('teachers');
    }
};
