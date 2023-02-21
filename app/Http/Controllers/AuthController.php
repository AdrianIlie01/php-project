<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request) {

        try {

            if ($request->isMethod("post")) {

                $request->validate([
                    'user_name' => 'required|string',
                    'password' => 'required|string',
                ]);
                $password = $request->get('password');

                $user = User::where('user_name', '=', $request->get('user_name'))->first();
                Hash::check($password,$user->password);

                var_dump(Hash::check($password,$user->password));

                if (!$user) {
                    throw new UnauthorizedException('Unauthorized = credentiale incorecte');
//                return view('auth.welcome');
                }

                $credentials = $request->only('user_name', 'password');
                var_dump($credentials);
                $token = Auth::attempt($credentials);
                if (!$token) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Unauthorized !token',
                    ], 401);
                }

                $user = Auth::user();
                return response()->json([
                    'status' => 'success',
                    'user' => $user,
                    'authorisation' => [
                        'token' => $token,
                        'type' => 'bearer',
                    ]
                ]);

            }
            return view("auth.login");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function  register(Request $request)  {

        try {

            if ($request->isMethod("post")) {

                $password = $request->get('password');
                $confirmPassword = $request->get('confirm_password');
                $hasedPass = Hash::make($password);
                $hasedConfirmPass = Hash::make($confirmPassword);



                if (Hash::check($password, $hasedPass) === Hash::check($confirmPassword, $hasedConfirmPass)) {
//                    $user = new User();
//                    $user->user_name = $request->get('userName');
//                    $user->password = $hasedPass;
//                    $user->save();
                    $user = User::create([
                        'user_name' => $request->get('user_name'),
                        'password' => $hasedPass,
                    ]);

                    $profile = new Profile();
                    $profile->user_id = $user->id;
                    $profile->first_name = $request->get('first_name');
                    $profile->last_name = $request->get('last_name');
                    $profile->photo = $request->get('user_photo');
                    $profile->country = $request->get('country');
                    $profile->city = $request->get('city');
                    $profile->street = $request->get('street');
                    $profile->postal_code = $request->get('postal_code');
                    $profile->bio = $request->get('bio');
                    $profile->birth_date = $request->get('birth_date');

                    $resProfile = $profile->save();
                    $token = Auth::login($user);
                    var_dump($token);
                    return response()->json([
                        'status' => 'success',
                        'message' => 'User created successfully',
                        'user' => $user,
                        'authorisation' => [
                            'token' => $token,
                            'type' => 'bearer',
                        ]
                    ]);

                    //TODO
                    // if lastName empty => User saved without profile delete that user (transaction rollback)

//                    return redirect('login');
                } else {
                    echo 'confirm_password != password';
                    return view("auth.register");
                }
            }
            return view("auth.register");
        }
        catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function logout()
    {
        try {
            Auth::logout();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function me()
    {
        try {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
        ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function refresh()
    {
        try {
            return response()->json([
                'status' => 'success',
                'user' => Auth::user(),
                'authorisation' => [
                    'token' => Auth::refresh(),
                    'type' => 'bearer',
                ]
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function welcome() {
        return view('auth.welcome');
    }
}
