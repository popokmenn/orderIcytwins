<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    const SOCIAL = 'SOCIAL';
    const ORDER = 'ORDER';

    protected $table = 'links';

    protected $fillable = [
        'type', // SOCIAL/ORDER
        'order',
        'name',
        'url',
        'open_new_tab',
    ];

    protected $casts = [
        'open_new_tab' => 'boolean'
    ];

    public $timestamps = true;

}
