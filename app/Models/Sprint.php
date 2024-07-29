<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sprint extends Model
{
    use HasFactory;

    const STATUS_TODO = 'todo';
    const STATUS_DOING = 'doing';
    const STATUS_DONE = 'done';

    const PRIORITY_LOW = 'low';
    const PRIORITY_MEDIUM = 'medium';
    const PRIORITY_HIGH = 'high';

    const TYPE_FEATURE = 'feature';
    const TYPE_BUG = 'bug';
    const TYPE_TASK = 'task';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status',
        'start_date',
        'end_date',
        'expected_end_date',
        'duration',
        'priority',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'expected_end_date' => 'date',
        'duration' => 'integer',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Boot the model and add a saving event listener to set the expected_end_date.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($sprint) {
            if ($sprint->start_date && $sprint->duration) {
                $sprint->expected_end_date = (new Carbon($sprint->start_date))->addDays($sprint->duration);
            }
        });
    }
}
