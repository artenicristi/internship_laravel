<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string website
 * @property int user_id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Company extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
