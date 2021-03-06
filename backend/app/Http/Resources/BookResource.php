<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource {

    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author'  => $this->author,
            'isbn_code' => $this->isbn_code,
            'plot' => $this->plot,
            'add_date' => $this->whenPivotLoaded('user_book', function () {
                return $this->pivot->add_date;
            }),
            'completed_readings' => $this->whenPivotLoaded('user_book', function () {
                return $this->pivot->completed_readings;
            })

        ];
    }
}
