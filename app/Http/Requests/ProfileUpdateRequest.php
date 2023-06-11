<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    // public function rules(): array
    // {
    //     return [
    //         'name' => ['string', 'max:255'],
    //         'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
    //     ];
    // }

    public function rules(): array
    {
        $user = auth()->user(); 
        return [
            "profile_image" => "max:255|mimes:png,jpeg,jpg,svg,webp",
            "first_name" => "max:50",
            "last_name" => "max:50",
            "phone_number" => "max:50",
            "country" => "max:50",
            "nationality" => "max:50",
            "city" => "max:50",
            "address" => "max:50"
        ];
    }

    public function messages(){
        
        return [            
            "profile_image.max" => "L'immagine del profilo non può superare i 255 caratteri",
            "profile_image.mimes" => "Il file inserito deve essere di tipo png, jpeg, jpg, svg o webp",

            "first_name.max" => "Il nome non può superare i 50 caratteri",

            "last_name.max" => "Il cognome non può superare i 50 caratteri",

            "phone_number.max" => "Il numero di telefono non può superare i 50 caratteri",

            "country.max" => "Il paese non può superare i 50 caratteri",

            "nationality.max" => "La nazionalità non può superare i 50 caratteri",

            "city.max" => "La città non può superare i 50 caratteri",

            "address.max" => "L'indirizzo non può superare i 50 caratteri"
        ];
    }
}
