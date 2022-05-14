<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'title' => 'required|max:20',
          'date' => 'required|date_format:Y-m-d\TH:i',
          'address' => 'required|max:200',
          'shopname' => 'required|max:50',
          'content' => 'required|max:500',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'date' => '開催日時',
            'address' => '開催場所住所',
            'shopname' => '開催場所店名',
            'content' => 'パーティー詳細説明',
        ];
    }
}
