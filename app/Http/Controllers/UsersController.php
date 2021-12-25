<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function get()
    {
        $response = User::all();

        return $response;
    }

    public function post(Request $req)
    {
        $result = new User;

        $result->name = $req['name'];
        $result->email = $req['email'];
        $result->pasword = Hash::make($req['password']);
        $result->save();

        if ($result) {
            $response = [
                "result" => $result,
            ];
        } else {
            $response = [
                "detail" => "error",
                "result" => "Ocurrió un problema al creaar el registro.",
            ];
        }

        return $response;
    }

    public function put(Request $req)
    {
        $user = User::where('id', $req['id'])->first();

        $user->name = $req['name'];
        $user->name = $req['email'];
        $user->name = $req['password'];

        $user->save();

        if ($user) {
            $response = [
                "result" => $user,
            ];
        } else {
            $response = [
                "detail" => "error",
                "result" => "Ocurrió un problema al actualizar el registro.",
            ];
        }

        return $response;
    }
}
