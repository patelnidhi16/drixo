<?php

namespace App\Http\Requests\admin;

use App\Models\Question;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\FormRequest;

class Eligible_Student extends HttpFormRequest
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
    public function rules(Request $request)
    {
        return [
            'title' => ['required', Rule::unique('students')->where(function ($query)  {
                for ($i=0; $i < count($this->id); $i++) { 
                    return $query->where('subject_id', $this->id[$i])->where('title', $this->title)->where('subject_id', $this->subject_id);
                }
            })],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'title field is required',
            'title.unique' => 'title is already taken',
        ];
    }
}
