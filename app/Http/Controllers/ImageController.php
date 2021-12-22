<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function get()
    {
        $response = image::all();

        return $response;
    }

    public function getById(Request $req)
    {
        $response = image::where("id", "=", $req['id'])->first();

        return $response;
    }

    public function post(Request $req)
    {
        $folder = time();
        $destinationPath = public_path('/images/gallery/' . $folder . '/');

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $image_name = Str::orderedUuid() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);

            $saveImage = new image();
            $saveImage->name = $req['name'];
            $saveImage->folder = $folder;
            $saveImage->image = '/images/gallery/' . $folder . '/' . $image_name;
            $saveImage->location = $req['location'];
            $saveImage->save();

            $response = [
                "detail" => "success",
                "result" => $saveImage,
            ];
        } else {
            $response = [
                "detail" => "error",
                "result" => "No se ha recibido ninguna imágen.",
            ];
        }

        return $response;
    }

    public function put(Request $req)
    {
        $record = image::where("id", "=", $req['id'])->first();
        if ($req->hasFile('image')) {
            $obsolet_image = public_path() . $record->image;
            $image = $req->file('image');
            $image_name = Str::orderedUuid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/gallery/' . $record->folder . '/');
            $image->move($destinationPath, $image_name);
            if (@file_exists($obsolet_image)) {
                unlink($obsolet_image);
            }
        } else {
            $image_name = $record->image;
        }

        $update = image::where("id", $req['id'])->update([
            "location" => $req['location'],
            "name" => $req['name'],
            "image" => '/images/gallery/' . $record->folder . '/' . $image_name,
        ]);

        $res = image::where('id', $req['id'])->first();

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
        $record = image::where("id", "=", $req['id'])->first();

        if ($record) {
            $result = File::deleteDirectory(public_path('images/transparencia/' . $record->folder . '/'));

            if ($result) {
                $delete = image::where("id", "=", $req['id'])->delete();

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
        } else {
            return $response = [
                "detail" => "error",
                "result" => "Este registro no existe.",
            ];
        }

    }
}
