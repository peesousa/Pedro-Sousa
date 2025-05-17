<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case Published = 'published';
    case Draft = 'draft';


    public function label(): string
    {
        return match ($this) {
            self::Published=> 'Projeto publicado',
            self::Draft => 'Rascunho de projeto',
        };
    }
}
