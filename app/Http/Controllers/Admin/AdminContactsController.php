<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;

class AdminContactsController extends Controller
{
    public function home(Request $request)
    {

        if($request->search){
            $contacts = Contacts::join('users', 'contacts.user_id', '=', 'users.id')
            ->where('users.name', 'like', '%'.$request->search.'%')
            ->select('contacts.*')
            ->orderBy('id', 'DESC')->paginate(5);

        }else{
            $contacts = Contacts::orderBy('id', 'DESC')->paginate(5);
        }
       
        return view('admin.contacts.index', compact('contacts'));
    }

    public function search(Request $request)
    {
        return redirect('/admin/contatos/buscar/'.$request->search);
    }

    public function contactsUserList(Request $request)
    {
        $contacts = Contacts::where("user_id","=",base64_decode($request->user_id))->orderBy('id', 'DESC')->paginate(5);
        $user = User::find(base64_decode($request->user_id));
        return view('admin.contacts.index', compact('contacts','user'));
    }

    public function details(Request $request)
    {
        $formEdit = Contacts::find($request->contact_id);
        
        return view('admin.contacts.details', compact('formEdit'));
    }

    public function formsAcitions(Request $request, int $contact_id = null)
    {

            $contact = Contacts::findOrFail($contact_id);

            $contact->response = $request->response;
            
            if($contact->update()){
                return redirect('/admin/contato/'.$contact_id.'/editar')->with('message', 'Mensagem atualizada com sucesso!');
            }else{
                return redirect('/admin/contatos')->with('message', 'Erro ao atualizar a mesangem');

            }
       
    }

    public function delete(Request $request)
    {
        $contact = Contacts::findOrFail($request->contact_id);

        $contact->delete();
        return redirect('/admin/contatos')->with('message', 'Mensagem deletado com sucesso!');

    }
}
