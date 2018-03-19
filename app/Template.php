<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'url',
    ];

    public function course()
    {
        return $this->belongsTo(\App\Course::class);
    }

    public function toArray()
    {
        return [
            'template_id' => $this->id,
            'year' => $this->year,
            'url' => $this->url,
        ];
    }
}
