<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterCorporateRequest;
use App\Http\Requests\RegisterCorporativeRequest;
use App\Http\Requests\RegisterPersonRequest;
use App\Http\Requests\searchVacanciesRequest;
use App\Models\Applications;
use App\Models\Categories;
use App\Models\Contacts;
use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WebController extends Controller
{
    /* HOME */
    public function index()
    {
        $categories = Categories::all();
        $vacancies = Vacancies::with('company')->orderBy('id', 'DESC')->paginate(5);

        return view('web.index', compact('categories', 'vacancies'));
    }

    /* LOGIN */
    public function login()
    {
        if (Auth::check()) {
            if(Auth::user()->type == "admin"){
                return redirect()->intended('admin/home');
            }elseif(Auth::user()->type == "corporate"){
                return redirect()->intended('corporativo/home');
            }else{
                return redirect()->intended('usuario/home');
            }
           
        }

        return view('web.forms.login');
    }

    public function loginAction (LoginRequest $request)
    {
        $validator = $request->validated();

       if(!Auth::attempt($validator)){
                return redirect('login')
                ->withErrors("E-mail ou senha incorretos")
                ->withInput();
            
       }

       $user = User::find(Auth::user()->id);
       
       if($user->type == "admin"){
            $request->session()->regenerate();
            return redirect()->intended('admin/home');
       }else if($user->type == "corporate"){
            $request->session()->regenerate();
            return redirect()->intended('corporativo/home');
       }else{
             $request->session()->regenerate();
            return redirect()->intended('usuario/home');
       }

    }


    /* ABOUT */
    public function about()
    {
        return view('web.about');
    }

    /* REGISTER */
    public function registerPerson()
    {
        return view('web.forms.registerPerson');
    }

    public function registerPersonActions(RegisterPersonRequest $request)
    {
        $validatedData = $request->validated();
        $user = new User();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->type = $validatedData['type'];

        if($user->save()){
            if(!Auth::attempt($request->only('email', 'password'))){
                return redirect('login')
                ->withErrors("E-mail ou senha incorretos")
                ->withInput();
         }

       $request->session()->regenerate();
    
       return redirect()->intended('admin/home');
    }
       

    }

    public function registerCompany()
    {
        return view('web.forms.registerCompany');
    }

    
    public function registerCorporateActions(RegisterCorporateRequest $request)
    {

        $validatedData = $request->validated();
        $user = new User();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->type = $validatedData['type'];

        if($user->save()){
            if(!Auth::attempt($request->only('email', 'password'))){
                return redirect('login')
                ->withErrors("E-mail ou senha incorretos")
                ->withInput();
         }

       $request->session()->regenerate();
    
       return redirect()->intended('corporativo/home');
    }
    }

    /* CONTACT */
    public function contact()
    {
        return view('web.forms.contact');
    }

    public function contactRegister(ContactRequest $request)
    {
        $validatedData = $request->validated();
        $contact = new Contacts();

        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->subject = $validatedData['subject'];
        $contact->message = $validatedData['message'];
        $contact->save();

        return redirect('contato')->with('message', 'Mensagem enviada com sucesso!');
    }

    /* VACANCIES */
    public function vacancyList()
    {
        $vacancies = Vacancies::with('company')->orderBy('id', 'DESC')->paginate(5);

        return view('web.vacancies.vacancyList', compact('vacancies'));
    }

    public function vacancyDetail(Request $request)
    {
        $vacancy = Vacancies::with('company')
                    ->where("slug","=", $request->slug)
                    ->firstOrFail();

        return view('web.vacancies.vacancyDetail', compact('vacancy'));
    }

    /* CATEGORIES */
    public function categoriesList()
    {
        $categories = Categories::all();

        return view('web.categories.categoriesList', compact('categories'));
    }

    public function categoryVacancies(Request $request)
    {
        $category = Categories::where('slug', '=', $request->slug)->firstOrFail();
        $vacancies = Vacancies::with('company')->where('category_id', $category->id)->orderBy('id', 'DESC')->paginate(5);
        //$vacancies = Vacancies::where('category_id', $category->id)->get();
        return view('web.categories.categoryVacancies', compact('vacancies', 'category'));
    }

    /* SEARCH */
    public function searchVacancies(searchVacanciesRequest $request)
    {
       // $validatedData = $request->validated();
       

        return redirect(url('/busca/de/'.$request->key_words.'/'.$request->localization.'/'.$request->category));

    }

    /* SEARCH  VACANCIES*/

    public function vacanciesSearched(Request $request)
    {
        $category = Categories::where('slug','=',$request->category)->firstOrFail();
        $categories = Categories::all();
        $vacancies = Vacancies::
                  where('title','LIKE', '%'.$request->key_words.'%')
                ->where('localization','LIKE', '%'.$request->localization.'%')
                ->where('category_id','=', $category->id)
                ->orderBy('id', 'DESC')
                ->paginate(5);

          return view('web.vacancies.searchVacancies', compact('vacancies', 'categories'));
    }

    /* APPLICATIONS */
    public function application(Request $request)
    {
        $vacancy = Vacancies::findOrFail(base64_decode($request->vacancy_id));
        $application = new Applications();
        $application->vacancy_id = base64_decode($request->vacancy_id);
        $application->user_id = auth()->user()->id;
        $application->situation = 'sent';
        $application->save();

        return redirect(url('/vaga/'.$vacancy->slug));
       
    }

    /* MESSAGES */
    public function message(String $code = "404", 
                            String $title = "Página não encontrada"
                            , String $message = "Lamentamos, a página que procura não existe no nosso site! Talvez vá para nossa página inicial ou tente usar uma pesquisa?")
    {
       $data = [
            'code' => $code,
            'title' => $title,
            'message' => $message
       ];
        return view('web.messages.message', compact('data'));
    }
}
