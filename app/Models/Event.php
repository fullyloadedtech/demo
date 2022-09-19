<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Event extends Model
{
    use SoftDeletes;

    /**
     * @var  string
     */
    protected $table = 'events';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    // REVERSE THIS AFTER INITIAL IMPORT
    protected $guarded = []; // this bypasses $fillable requirement

    //public function user()
    //{
    //    return $this->belongsTo(\App\User::class);
    //}

    public function validate($data, $scenario)
    {
        switch ($scenario) {
            case 'create':
            case 'update':
                $rules = [
                    'title' => 'required',
                    'start' => 'required|date',
                    'end' => 'required|date|after_or_equal:start',
                ];

                break;
        }

        return Validator::make($data, $rules);
    }

    public function scopeFilter($query, $data)
    {
        if (! empty($data['start'])) {
            $query->where('start', '>=', $data['start']);
        }
        if (! empty($data['end'])) {
            $query->where('end', '<=', $data['end']);
        }
        $query->whereHas('user');

        return $query;
    }
}
