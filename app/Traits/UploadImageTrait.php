<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImageTrait
{


    public function uploadImage(Request $request, $inputName, $path)
{
    if ($request->hasFile($inputName)) {
        $image = $request->file($inputName); // Obtém o arquivo
        $ext = $image->getClientOriginalExtension(); // Obtém a extensão
        $day = date('d');
        $month = date('m');
        $year = date('Y');

        // Nome único para evitar conflitos
        $imageName = 'media_' . uniqid() . '-ssistema-' . $day . '-' . $month . '-' . $year . '.' . $ext;

        // Move a imagem para a pasta
        $image->move(public_path($path), $imageName);

        // Retorna o caminho correto
        return $path . '/' . $imageName;
    }

    return null; // Retorna null caso não tenha imagem
}


}
