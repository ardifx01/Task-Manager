<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'created_by', 'status'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function progress(){
        $total = $this->tasks()->count();
        $completed = $this->tasks()->where('status', 'completed')->count();
        return $total > 0 ? round(($completed / $total) * 100, 2) : 0;
    }
}
