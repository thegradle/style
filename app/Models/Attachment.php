<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFilename($path)
    {
        return substr(strrchr($path, "/"), 1);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
