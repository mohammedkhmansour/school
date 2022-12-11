<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name_Class'];
    protected $fillable=['Name_Class','grade_id'];


    public function Grades()
    {
        // return $this->belongsTo('App\Models\Grade', 'grade_id');
         return $this->belongsTo(Grade::class, 'grade_id');

    }
}
