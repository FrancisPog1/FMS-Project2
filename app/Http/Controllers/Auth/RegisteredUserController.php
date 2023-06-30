<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function Create_User(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',
            'confirmed',
            Password::min(8)     //Require at least 8 characters...
            ->letters()         // Require at least one letter...
            ->mixedCase()        // Require at least one uppercase and one lowercase letter...
            ->numbers()         // Require at least one number...
            ->symbols()         // Require at least one symbol...
            ->uncompromised()], // Ensure the password appears less than 3 times in the same data leak...
        ]);
        //Get the ID of the logged in user
        $userId = Auth::user()->id;

        //These are my code where it saves the email, password, and user ID
        $user = new User();
        $user->id = Str::uuid()->toString();        //The uuid will generate a string. It will act as default value for the ID
        $user->foreign_role_id = $request->role;    //Foreign for roles
        $user->email = $request ->email;
        $user->password = Hash::make($request ->password);
        $user->created_by = $userId;

        //These are the old codes for saving the new user.
        // $user = User::create([

        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'id' => Str::uuid()->toString()
        // ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $user->save();
            return response()->json(['success' => true, 'message' => 'User successfully added.'], 200);
        }

        event(new Registered($user));


    }
}
