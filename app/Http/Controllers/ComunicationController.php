<?php

namespace App\Http\Controllers;

use App\Models\comunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ComunicationController extends Controller
{
    public function get()
    {
        $response = comunication::all();

        return $response;
    }

    public function getById(Request $req)
    {
        $response = comunication::where("id", "=", $req['id'])->first();

        return $response;
    }

    public function post(Request $req)
    {
        $folder = time();
        $destinationPath = public_path('/images/comunication/' . $folder . '/');

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $image_name = Str::orderedUuid() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);

            $saveCommunication = new comunication;
            $saveCommunication->title = $req['title'];
            $saveCommunication->description = $req['description'];
            $saveCommunication->folder = $folder;
            $saveCommunication->image = '/images/comunication/' . $folder . '/' . $image_name;
            $saveCommunication->save();

            $response = [
                "detail" => "success",
                "result" => $saveCommunication,
            ];
        } else {
            $response = [
                "detail" => "error",
                "result" => "Hace falta una imágen para que la información sea guardada con exito.",
            ];
        }

        return $response;
    }

    public function put(Request $req)
    {
        $record = comunication::where("id", "=", $req['id'])->first();
        if ($req->hasFile('image')) {
            $obsolet_image = public_path() . $record->image;
            $image = $req->file('image');
            $image_name = Str::orderedUuid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/comunication/' . $record->folder . '/');
            $image->move($destinationPath, $image_name);
            if (@getimagesize($obsolet_image)) {
                unlink($obsolet_image);
            }
        } else {
            $image_name = $record->image;
        }

        $update = comunication::where("id", $req['id'])->update([
            "title" => $req['title'],
            "image" => '/images/comunication/' . $record->folder . '/' . $image_name,
            "description" => $req['description'],
        ]);

        $res = comunication::where('id', $req['id'])->first();

        if ($update) {
            $response = [
                "detail" => "success",
                "result" => $res,
            ];
        } else {
            $response = [
                "detail" => "error",
                "result" => "Ocurrió un problema al actualizar el registro.",
            ];
        }
        return $response;
    }

    public function delete(Request $req)
    {
        $record = comunication::where("id", "=", $req['id'])->first();
        $result = File::deleteDirectory(public_path('images/comunication/' . $record->folder . '/'));

        if ($result) {
            $delete = comunication::where("id", "=", $req['id'])->delete();

            if ($delete) {
                $response = [
                    "detail" => "success",
                    "result" => $delete,
                ];
            } else {
                $response = [
                    "detail" => "error",
                    "result" => "Ocurrió un problema al eliminar el registro.",
                ];
            }
        } else {
            $response = [
                "detail" => "error",
                "result" => "Ocurrió un problema al eliminar el registro.",
            ];
        }

        return $response;
    }
}
