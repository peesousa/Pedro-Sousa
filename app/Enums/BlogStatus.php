<?php

namespace App\Enums;

enum BlogStatus: string
{
    case Published = 'published';
    case Draft = 'draft';


    public function label(): string
    {
        return match ($this) {
            self::Published=> 'Post publicado',
            self::Draft => 'Rascunho do post',
        };
    }
}
