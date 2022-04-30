<?php

namespace App\Http\Requests\admin;

use App\Models\Question;
use App\Models\Subject;
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
        $x= Subject::where('subject_name',$request->subject_name)->get()->toArray();
        return [
            'title' => ['required', Rule::unique('questions')->where(function ($query) use($x)  {
              
                    return $query->where('subject_id',$x[0]['id'])->where('title', $this->title);
                
            })],
            'end_time'=>'required|after_or_equal:start_time'

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
