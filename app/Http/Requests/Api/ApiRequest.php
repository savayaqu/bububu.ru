<?php

namespace App\Http\Requests\Api;

use App\Exceptions\ApiException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
  public function failedAuthorization()
  {
      throw new ApiException('Forbidden', 403);
  }
  public function failedValidation(Validator $validator)
  {
      throw new ApiException('Unprocessable Content', 422, $validator->errors());
  }
}
