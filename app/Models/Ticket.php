<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function developer(){
        return $this->belongsTo(User::class,'developer_id');
    }
    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }
    public function project(){
        return $this->belongsTo(Project::class); //return $this->belongsTo(Project::class,'project_id');
    }
    public function reply(){
        return $this->hasMany(Reply::class);
    }
}
