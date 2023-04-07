<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPersonRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminUserController extends Controller
{
    public function home(Request $request)
    {
        if($request->search){
            $users = User::where('name','LIKE','%'.$request->search.'%')->orderBy('id','DESC')->paginate(5);
        }else{
            $users = User::orderBy('id','DESC')->paginate(5);
        }
        
        return view('admin.users.index', compact('users'));
    }

    public function forms(Request $request)
    {
        $formEdit = User::find($request->user_id);
        return view('admin.users.forms', compact('formEdit'));
    }

    public function search(Request $request)
    {
        //$users = User::where('name','LIKE','%'.$request->search.'%')->orderBy('id','DESC')->paginate(5);
        return redirect('/admin/usuarios/buscar/'.$request->search);
    }

    public function formsAcition(RegisterPersonRequest $request, int $user_id = null)
    {
        
        if($request->action == "create"){
            $validatedData =  $validatedData = $request->validated();
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);
            $user->type = $validatedData['type'];
    
            if ($request->file('photo')) {
                $uploadPath = 'uploads/users/';
                $extention = $request->file('photo')->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $request->file('photo')->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                $user->photo = $finalImagePathName;
            }
            
            if($user->save()){
                return redirect('/admin/usuarios/cadastro')->with('message', 'Usuário cadastrado com sucesso!');
            }else{
                return redirect('/admin/usuarios/cadastro')->with('message', 'Erro ao cadastrar o usuário');

            }
            
        }

        if($request->action == 'update'){
            $user = User::findOrFail($user_id);
            $validatedData = $request->validated();

            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = $request->password == "" ? $user->password : Hash::make($validatedData['password']);
            $user->type = $validatedData['type'];
            
            if ($request->file('photo')) {
                $uploadPath = 'uploads/users/';
                $extention = $request->file('photo')->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $request->file('photo')->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                $user->photo = $finalImagePathName;
            }
            
            if($user->update()){
                return redirect('/admin/usuario/'.$user_id.'/editar')->with('message', 'Usuário atualizado com sucesso!');
            }else{
                return redirect('/admin/usuarios')->with('message', 'Erro ao atualizar o usuário');

            }

        }

       
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if(File::exists($user->photo)){
            File::delete($user->photo);
        }

        $user->delete();
        return redirect('/admin/usuarios')->with('message', 'Usuário deletado com sucesso!');

    }

    public function deletePhoto(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if(File::exists($user->photo)){
            File::delete($user->photo);
            $user->photo = "";
            $user->save();
        }

        return redirect()->back()->with('message', 'Imagem deletado com sucesso!');

    }
}
