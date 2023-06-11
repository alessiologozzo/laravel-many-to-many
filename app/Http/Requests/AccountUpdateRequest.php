<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user = auth()->user(); 
        return [
            "name" => "required|unique:users,name,".$user->id."|max:40",
            "email" => "required|unique:users,email,".$user->id."|max:100",
            "new_password" => "required|string|min:8"
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
            
            "new_password.required" => "Inserisci una nuova password",
            "new_password.string" => "Inserisci una nuova password",
            "new_password.min" => "La password deve essere composta da almeno 8 caratteri"
        ];
    }
}