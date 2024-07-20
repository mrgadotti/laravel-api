<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    // public const CREATED_AT = null;
    // public const UPDATED_AT = null;
    public $timestamps = false;
    protected $primaryKey = 'cd_curso';
    public $incrementing = true;
    protected $fillable = ['ds_curso','ds_observacao'];
}
