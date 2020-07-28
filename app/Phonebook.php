<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    protected $fillable = [
        'name', 'lastname', 'company', 'mobile', 'mobile2', 'work', 'work2'
    ];
}
