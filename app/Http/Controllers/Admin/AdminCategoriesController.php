<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoriesController extends Controller
{
    public function home(Request $request)
    {
        if($request->search){
            $categories = Categories::where('title', 'like', '%'.$request->search.'%')
            ->orderBy('id', 'DESC')->paginate(5);

        }else{
            $categories = Categories::orderBy('id', 'DESC')->paginate(5);
        }
       
        return view('admin.categories.index', compact('categories'));
    }

    public function categoriesVacanciesList(Request $request)
    { 
        $categories = Categories::find(base64_decode($request->category_id));
        $vancacies = Vacancies::where("category_id","=",base64_decode($request->category_id))->orderBy('id', 'DESC')->paginate(5);

        return view('admin.categories.index', compact('categories','vancacies'));
    }


    public function search(Request $request)
    {
        return redirect('/admin/categorias/buscar/'.$request->search);
    }

    public function forms(Request $request)
    {
        $formEdit = Categories::find($request->category_id);
        $user = User::find(base64_decode($request->user_id));
        
        return view('admin.categories.forms', compact('formEdit', 'user'));
    }

    public function formsAcitions(CategoriesRequest $request, int $category_id = null)
    {

        if($request->action == "create"){
            $validatedData =  $validatedData = $request->validated();
            $category = new Categories();
            $category->title = $validatedData['title'];
            $category->icon = $validatedData['icon'];
            $category->slug = Str::slug($validatedData['title']);
          
            
            if($category->save()){
                return redirect('/admin/categorias')->with('message', 'Categoria cadastrada com sucesso!');
            }else{
                return redirect('/admin/categorias/cadastro/')->with('message', 'Erro ao cadastrar a categoria!');

            }
            
        }

        if($request->action == 'update'){
            $category = Categories::findOrFail($category_id);
            $validatedData = $request->validated();

            $category->title = $validatedData['title'];
            $category->icon = $validatedData['icon'];
            $category->slug = $request->slug;
            
            if($category->update()){
                return redirect('/admin/categoria/'.$category_id.'/editar')->with('message', 'Categoria atualizada com sucesso!');
            }else{
                return redirect('/admin/categorias')->with('message', 'Erro ao atualizar a categoria');

            }

        }
       
    }
    public function delete(Request $request)
    {
        $company = Categories::findOrFail($request->category_id);

        $company->delete();
        return redirect('/admin/categorias')->with('message', 'Categoria deletada com sucesso!');

    }
}
