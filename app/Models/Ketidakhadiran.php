<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketidakhadiran extends Model
{
    use HasFactory;
    protected $table = 'ketidakhadirans';
    protected $guarded = ['id'];

    /**
     * Get the user that owns the Ketidakhadiran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
