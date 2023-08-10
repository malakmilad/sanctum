<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => 200,
            'message' => 'user created successfully',
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'token' => $this->createToken('MyApp')->plainTextToken,
            ],

        ];
    }
}
