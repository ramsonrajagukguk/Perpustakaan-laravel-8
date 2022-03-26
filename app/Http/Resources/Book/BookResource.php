<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'judul' => $this->judul,
            'author_id' => new AuthorResource($this->author),
            'category_id' => $this->category_id,
            'keterangan' => $this->keterangan,
            'jumlah' => $this->jumlah,
            'cover' => $this->cover,
            'stored_at' =>$this->created_at->diffForHumans()
        ];
    }
}