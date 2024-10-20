<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request, UserService $userService): JsonResponse
    {
        return $this->sendResponse(['test' => 'testing'], 'debug');

        $validator = Validator::make($request->all(), $request->rules());

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = $userService->create($request->name, $request->email, $request->password);

        $success['token'] =  $user->createToken('MyApp')->plainTextToken;

        return $this->sendResponse($success, 'User register successfully.');
    }
}
