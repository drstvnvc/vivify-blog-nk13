<?php

namespace App\Http\Requests;

use App\Rules\DateMin18YearsAgo;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    // name, email, password, password_confirmation
    return [
      'name' => 'required|string|max:255',
      'email' => 'required|email:rfc|unique:users',
      'password' => 'required|string|min:6|confirmed', // [new RequiredRule, new StringRule,],
      // 'password_confirmation' => 'same:password'
      'date_of_birth' => ['required', 'date', new DateMin18YearsAgo],
      'agreed' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'agreed.required' => 'You must agree to our terms and conditions'
    ];
  }
}
