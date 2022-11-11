<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class JobPostFormSubmitRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'skill_category_id' => 'required|integer',
            'skill_sub_category_id' => 'required|integer',
            'project_title' => 'required',
            'project_description' => 'required',
            'budget' => 'required',
            'experience_level' => 'required',
            'freelancer_working_type' => 'required',
            'preffered_freelancer_location_country',
            'job_location_city',
            'job_starting_date',
            'job_starting_date_timestamp',
            'job_ending_time',
            'job_ending_time_timestamp',
            'job_total_duration',
            'job_total_length',
            'estimate_project_duration_type',
            'estimate_project_duration_time',
            'estimate_project_duration_time_timestamp',
            'promotion_type',
            'job_post_slug',
            'post_expire_date',
            'post_expire_date_timestamp',
            'status',
        ];
    }
}
