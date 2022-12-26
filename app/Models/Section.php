<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name_Section'];
    protected $fillable=['Name_Section','grade_id','class_id'];


        // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function My_classs()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
        // علاقة الاقسام مع المعلمين
        public function teachers()
        {
            return $this->belongsToMany(Teacher::class,'teacher_section');
        }

        public function Grades()
        {
            return $this->belongsTo('App\Models\Grade','grade_id');
        }

}
