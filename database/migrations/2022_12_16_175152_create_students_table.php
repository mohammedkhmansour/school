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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('gender_id')->constrained('genders','id')->cascadeOnDelete();
            $table->foreignId('nationalitie_id')->constrained('nationalities','id')->cascadeOnDelete();
            $table->foreignId('blood_id')->constrained('type_bloods','id')->cascadeOnDelete();
            $table->date('Date_Birth');
            $table->foreignId('Grade_id')->constrained('grades','id')->cascadeOnDelete();
            $table->foreignId('Classroom_id')->constrained('classrooms','id')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections','id')->cascadeOnDelete();
            $table->foreignId('parent_id')->constrained('my_parents','id')->cascadeOnDelete();
            $table->string('academic_year');
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
        Schema::dropIfExists('students');
    }
};
