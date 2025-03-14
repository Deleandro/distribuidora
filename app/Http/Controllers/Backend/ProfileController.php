<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use File;

class ProfileController extends Controller
{
    //visualiza perfil
    public function index()
    {
        return view('admin/profile/index');
    }

    //atualiza perfil
    public function update(Request $request)
    {
       // dd($request->all());
       $request->validate([
        'name'  => ['required','max:100'],
        'email' => ['required','email', 'unique:users,email,'.Auth::user()->id],
        'image' => ['image','max:2048'],
       ]);

       $user = Auth::user();

       if($request->hasFile('image')){
        //Verificar se existe imagem e delete
        if(File::exists(public_path($user->image))){
            File::delete(public_path($user->image));
        }

        $image = $request->image;
        $imageName = rand() . '-ss-' .$image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);
        //caminho past imagens
        $path = "/uploads/" . $imageName;
        $user->image = $path;
       }

       $user->name = $request->name;
       $user->email = $request->email;
       $user->save();

// Display a success toast with no title
//flash()->success('Dados atualizados com sucesso');
    toastr()->success('Dados atualizados com sucesso');
      // return redirect()->back()->with('success', 'Dados atualizados com sucesso!'); outro modelo
       return redirect()->back();
    }


    public function updatePassword(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed','min:8'],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Senha alterada com sucesso!');
       // return redirect()->back()->with('successSenha','Senha alterada com sucesso');
        return redirect()->back();



    }

}
