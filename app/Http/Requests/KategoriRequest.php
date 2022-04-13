<?php

namespace App\Http\Requests;

use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
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
        // $id = (int) $this->get('id_kategori');

        // return $id;

        
        return [
            'nama_kategori' => ['required'],
        ];
    }
}
