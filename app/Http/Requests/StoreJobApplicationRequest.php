<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'         => ['required','string','min:3','max:120'],
            'email'        => ['required','email','max:120'],
            'phone'        => ['required','string','max:30'],
            'desired_role' => ['required','string','max:120'],
            'education'    => ['required','in:fundamental,fundamental incompleto,médio,médio incompleto,técnico,técnico incompleto,superior,superior incompleto,pos,pos incompleto,mestrado,mestrado incompleto,doutorado,doutorado incompleto'],
            'linkedin_url' => ['nullable','url','max:255'],
            'cv'           => [
                'required','file','max:1024',    // 1024 KB = 1MB
                'mimes:doc,docx,pdf'            
            ],
        ];
    }
    public function messages(): array
    {
        return ['cv.max'=>'O arquivo deve ter no máximo 1MB.'];
    }
}
