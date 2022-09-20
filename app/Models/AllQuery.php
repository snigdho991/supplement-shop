<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllQuery extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'businessname',
        'email',
        'phone',
        'address',
        'ip_address',
        'zip',
        'city',
        'state',
    ];

    public function avatarLetter($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }
}
