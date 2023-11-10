<?php

namespace App\Models;

use Laravel\Scout\Searchable as ScoutSearchable;
trait Searchable
{
    use ScoutSearchable;

    public static function search($searchTerm)
    {
        return self::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('body', 'like', '%' . $searchTerm . '%');
    }

    public function toSearchableArray()
    {
        $array = [
            'title' => $this->title,
            'body' => $this->body,
        ];
        return $array;
    }
}
