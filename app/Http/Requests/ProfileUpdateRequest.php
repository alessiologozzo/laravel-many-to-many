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
            "name" => "required|unique:users,name,".$user->id."|max:40",
            "email" => "required|unique:users,email,".$user->id."|max:100",
            "profile_image" => "max:255|mimes:png,jpg,svg",
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
            "name.required" => "Il nome utente è obbligatorio",
            "name.unique" => "Il nome utente inserito non è disponibile",
            "name.max" => "Il nome utente non può superare i 40 caratteri",

            "email.required" => "L'indirizzo E-Mail è obbligatorio",
            "email.unique" => "L'indirizzo E-Mail inserito non è disponibile",
            "email.max" => "L'indirizzo E-Mail non può superare i 100 caratteri",
            
            "profile_image.max" => "L'immagine del profilo non può superare i 255 caratteri",
            "profile_image.mimes" => "Il file inserito deve essere di tipo png, jpeg o svg",

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
