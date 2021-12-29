<?php

namespace App\Http\Controllers;

use App\Models\document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get()
    {
        $response = document::all();

        return $response;
    }

    public function getById(Request $req)
    {
        $response = document::where("id", "=", $req['id'])->first();

        return $response;
    }

    public function post(Request $req)
    {
        $folder = time();
        $destinationPath = public_path('/documents/transparencia/' . $folder . '/');

        if ($req->hasFile('document')) {
            $document = $req->file('document');
            $document_name = Str::orderedUuid() . '.' . $document->getClientOriginalExtension();
            $document->move($destinationPath, $document_name);

            $saveDocument = new document();
            $saveDocument->name = $req['name'];
            $saveDocument->folder = $folder;
            $saveDocument->document = '/documents/transparencia/' . $folder . '/' . $document_name;
            $saveDocument->save();

            $response = [
                "detail" => "success",
                "result" => $saveDocument,
            ];
        } else {
            $response = [
                "detail" => "error",
                "result" => "No se ha recibido ningún documento.",
            ];
        }

        return $response;
    }

    public function put(Request $req)
    {
        $record = document::where("id", "=", $req['id'])->first();
        if ($req->hasFile('document')) {
            $obsolet_document = public_path() . $record->document;
            $document = $req->file('document');
            $document_name = Str::orderedUuid() . '.' . $document->getClientOriginalExtension();
            $destinationPath = public_path('/documents/transparencia/' . $record->folder . '/');
            $document->move($destinationPath, $document_name);
            if (@file_exists($obsolet_document)) {
                unlink($obsolet_document);
            }
        } else {
            $document_name = $record->document;
        }

        $update = document::where("id", $req['id'])->update([
            "name" => $req['name'],
            "document" => '/documents/transparencia/' . $record->folder . '/' . $document_name,
        ]);

        $res = document::where('id', $req['id'])->first();

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
        $record = document::where("id", "=", $req['id'])->first();

        if ($record) {
            $result = File::deleteDirectory(public_path('documents/transparencia/' . $record->folder . '/'));

            if ($result) {
                $delete = document::where("id", "=", $req['id'])->delete();

                if ($delete) {
                    $response = [
                        "result" => $delete,
                        "detail" => "success"];
                } else {
                    $response = [
                        "result" => "Ocurrió un problema al eliminar el registro.",
                        "detail" => "error",
                    ];
                }
            } else {
                $response = [
                    "result" => "Ocurrió un problema al eliminar el registro.",
                    "detail" => "error",
                ];
            }

            return $response;
        } else {
            return $response = ["result" => "Este registro no existe.",
                "detail" => "error",
            ];
        }

    }
}
