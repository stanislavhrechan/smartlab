<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            /*
            |--------------------------------------------------------------------------
            | Тип и статус
            |--------------------------------------------------------------------------
            */

            'type' => [
                'required',
                Rule::in(['opportunity', 'informational']),
            ],

            'status' => [
                'required',
                Rule::in(['draft', 'published']),
            ],

            /*
            |--------------------------------------------------------------------------
            | Даты
            |--------------------------------------------------------------------------
            */

            'start_date' => [
                'nullable',
                'date',
            ],

            'end_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date',
            ],

            /*
            |--------------------------------------------------------------------------
            | Вознаграждение (только opportunity)
            |--------------------------------------------------------------------------
            */

            'reward_type' => [
                'nullable',
                Rule::requiredIf(
                    fn () => $this->input('type') === 'opportunity'
                ),
                Rule::in(['none', 'fixed', 'negotiable']),
            ],

            'reward_amount' => [
                'nullable',
                'required_if:reward_type,fixed',
                'numeric',
                'min:0',
            ],

            'reward_currency' => [
                'nullable',
                'string',
                'size:3',
            ],

            'accepts_applications' => [
                'nullable',
                'boolean',
            ],

            /*
            |--------------------------------------------------------------------------
            | Партнёры проекта
            |--------------------------------------------------------------------------
            */

            'partners' => [
                'nullable',
                'array',
            ],

            'partners.*' => [
                'integer',
                'distinct',
                'exists:partners,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Цели проекта
            |--------------------------------------------------------------------------
            */

            'goals' => [
                'nullable',
                'array',
            ],


            'goals.*.description' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Активности проекта
            |--------------------------------------------------------------------------
            */

            'activities' => [
                'nullable',
                'array',
            ],

            'activities.*.title' => [
                'required',
                'string',
                'max:255',
            ],

            'activities.*.description' => [
                'nullable',
                'string',
            ],

            'activities.*.partners' => [
                'nullable',
                'array',
            ],

            'activities.*.partners.*' => [
                'integer',
                'distinct',
                'exists:partners,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Результаты проекта
            |--------------------------------------------------------------------------
            */

            'outputs' => [
                'nullable',
                'array',
            ],


            'outputs.*.description' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Галерея
            |--------------------------------------------------------------------------
            */

            'gallery' => [
                'nullable',
                'array',
                'max:20',
            ],

            'gallery.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ];
    }

    /**
     * Пользовательские сообщения об ошибках.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Názov projektu je povinný.',
            'title.max' => 'Názov projektu môže obsahovať maximálne 255 znakov.',

            'description.required' => 'Popis projektu je povinný.',

            'image.image' => 'Obrázok musí byť platný obrázok.',
            'image.mimes' => 'Obrázok musí byť vo formáte JPG, PNG alebo WEBP.',
            'image.max' => 'Obrázok môže mať maximálne 5 MB.',

            'type.required' => 'Vyberte typ projektu.',
            'type.in' => 'Neplatný typ projektu.',

            'status.required' => 'Vyberte stav projektu.',
            'status.in' => 'Neplatný stav projektu.',

            'end_date.after_or_equal' => 'Dátum ukončenia nemôže byť pred dátumom začiatku.',

            'reward_type.required' => 'Vyberte typ odmeny.',
            'reward_type.in' => 'Neplatný typ odmeny.',
            'reward_amount.required_if' => 'Zadajte výšku odmeny.',
            'reward_amount.numeric' => 'Odmena musí byť číslo.',
            'reward_amount.min' => 'Odmena nemôže byť záporná.',

            'partners.*.exists' => 'Vybraný partner neexistuje.',

            'activities.*.title.required' => 'Každá aktivita musí mať názov.',
            'activities.*.partners.*.exists' => 'Vybraný partner aktivity neexistuje.',

            'gallery.max' => 'Galéria môže obsahovať maximálne 20 obrázkov.',
            'gallery.*.image' => 'Každý súbor v galérii musí byť obrázok.',
            'gallery.*.mimes' => 'Obrázky v galérii musia byť JPG, PNG alebo WEBP.',
            'gallery.*.max' => 'Každý obrázok v galérii môže mať maximálne 5 MB.',
        ];
    }
}
