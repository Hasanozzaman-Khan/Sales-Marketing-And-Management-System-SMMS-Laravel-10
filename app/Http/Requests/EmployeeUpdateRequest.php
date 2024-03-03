<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // $id = $this->route('employee');
        $id = request()->route('id');
        // dd($id);
        return [
            // 'name' => 'required|min:2|max:50|unique:users,name,'.$id,
            'comp_id' => 'required',
            // 'image' => 'required',
        ];
    }
}
