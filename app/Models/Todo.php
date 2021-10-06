<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * @package App\Models
 * @property string name
 * @property boolean is_completed
 * @property boolean is_delayed
 */
class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'is_completed', 'is_delayed'
    ];
}
