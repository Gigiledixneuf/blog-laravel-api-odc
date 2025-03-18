<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * Transform the resource into an array.
         *
         * @return array<string, mixed>
         */

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            "photo" => $this->photo,
            "auteur" => $this->auteur,
            "content" => $this->content,
            'comment' => $this->comments, //relation avec les commentaires
            'category' => $this->categories, //relation avec la categorie
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
