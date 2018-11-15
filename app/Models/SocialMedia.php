<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    const FACEBOOK = 'facebook';
    const INSTAGRAM = 'instagram';
    const GOOGLE = 'GOOGLE';
    const TWITTER = 'twitter';

    static function isValidSocialMedia($type)
    {
        return $type === $this->FACEBOOK ||
            $type === $this->INSTAGRAM ||
            $type === $this->GOOGLE ||
            $type === $this->TWITTER;
    }
}
