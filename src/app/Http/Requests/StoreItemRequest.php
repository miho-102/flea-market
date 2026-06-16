<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
        'name' => ['required'],
        'categories' => ['required'],
        'condition' => ['required'],
        'description' => ['required'],
        'price' => ['required', 'integer', 'min:1'],
        'image' => ['required', 'image'],
        ];
    }
    public function messages()
    {

        return [
        'name.required' => '商品名を入力してください',

        'categories.required' => 'カテゴリを選択してください',

        'condition.required' => '商品の状態を選択してください',

        'description.required' => '商品説明を入力してください',

        'price.required' => '価格を入力してください',
        'price.integer' => '価格は数字で入力してください',

        'image.required' => '商品画像を選択してください',
        ];
    }
}
