<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInvitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'email',
        'token',
        'expires_at',
        'accepted',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accept()
    {
        $this->update(['accepted' => true]);
    }

    public function deny()
    {
        $this->delete();
    }
}
