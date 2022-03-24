<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthLoginResource extends JsonResource {

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function toArray($request) {
        return [
            'access_token' => $this->user->createToken($this->user->email)->plainTextToken,
            'type' => 'Bearer',
            'user' => new UserResource($this->user)
        ];
    }
}
