<?php

use App\Http\Controllers\Admin\AdminApplicationsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminCompanysController;
use App\Http\Controllers\Admin\AdminContactsController;
use App\Http\Controllers\Admin\AdminHomeController as AdminAdminHomeController;
use App\Http\Controllers\Admin\AdminResumesController;
use App\Http\Controllers\Admin\AdminUserController as AdminAdminUserController;
use App\Http\Controllers\Admin\AdminVacanciesController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Api\WebControllerApi;
use App\Http\Controllers\Corporate\CorporateApplicationsController;
use App\Http\Controllers\Corporate\CorporateCompanysController;
use App\Http\Controllers\Corporate\CorporateHomeController;
use App\Http\Controllers\Corporate\CorporateVacanciesController;
use App\Http\Controllers\Corporative\CorporativeHomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::controller(WebControllerApi::class)->group(function(){
    Route::get('/api/vagas', 'vacancyList');
}); */

//WebController
Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index');

    //Login
    Route::get('login', 'login');
    Route::post('login', 'loginAction');

    //Register
    Route::get('/cadastro/pessoa', 'registerPerson');
    Route::post('/cadastro/pessoa', 'registerPersonActions');
    Route::get('/cadastro/corporativo', 'registerCompany');
    Route::post('/cadastro/corporativo', 'registerCorporateActions');

    //Vacancies
    Route::get('/vagas', 'vacancyList');
    Route::get('/vaga/{slug}', 'vacancyDetail');

    //Categories
    Route::get('/categorias', 'categoriesList');
    Route::get('/categoria/{slug}/vagas', 'categoryVacancies');

    //Contact
    Route::get('/contato', 'contact');
    Route::post('/contato', 'contactRegister');

    //About
    Route::get('/sobre', 'about');

    //Search
    Route::post('/buscar/vagas', 'searchVacancies');
    Route::get('/busca/de/{key_words}/{localization}/{category}', 'vacanciesSearched');

    //Vacancies
    Route::post('/aplicar-vaga/{vacancy_id}', 'application');
    Route::get('/aplicar-vaga/{vacancy_id}', 'application');

    //Messages
    /*  Route::get('/mensagem', 'message'); */
});

//ADMIN

Route::middleware(['auth', 'can:accessAdminDashboard'])->group(function () {

    Route::controller(AdminAdminHomeController::class)->group(function () {
        Route::get('/admin/home', 'index');
        Route::get('/admin/configuracoes', 'config');
        Route::put('/admin/perfil/atualizar', 'configForms');
        Route::get('/admin/sair', 'logout');
    });

    /* Users */
    Route::controller(AdminAdminUserController::class)->group(function () {
        Route::get('/admin/usuarios', 'home')->name("home");
        Route::post('/admin/usuario/buscar', 'search');

        Route::get('/admin/usuarios/buscar/{search}', 'home');

        Route::get('/admin/usuarios/cadastro', 'forms')->name("forms");
        Route::post('/admin/usuarios/cadastro', 'formsAcition')->name("formsAcition");

        Route::get('/admin/usuario/{user_id}/editar', 'forms');
        Route::put('/admin/usuario/{user_id}/editar', 'formsAcition');

        Route::get('/admin/usuario/{user_id}/excluir/foto', 'deletePhoto');
        Route::get('/admin/usuario/{user_id}/excluir', 'delete');
    });




    /* Resumes */
    Route::controller(AdminResumesController::class)->group(function () {
        Route::get('/admin/curriculos', 'home');
        Route::get('/admin/curriculo/{resume_id}', 'detail');

        Route::post('/admin/curriculos/buscar', 'search');
        Route::get('/admin/curriculos/buscar/{search}', 'home');

        Route::get('/admin/curriculos/cadastro/{user_id}', 'forms');
        Route::post('/admin/curriculos/cadastro', 'formsAcition');

        Route::get('/admin/curriculo/{resume_id}/editar', 'forms');
        Route::put('/admin/curriculo/{resume_id}/editar', 'formsAcition');

        Route::get('/admin/curriculo/{resume_id}/excluir', 'delete');
    });

    /* Companys */
    Route::controller(AdminCompanysController::class)->group(function () {
        Route::get('/admin/empresas', 'home');
        Route::get('/admin/usuario/{user_id}/empresas', 'companysUserList');
        Route::get('/admin/empresa/{company_id}', 'detail');

        Route::post('/admin/empresas/buscar', 'search');
        Route::get('/admin/empresas/buscar/{search}', 'home');

        Route::get('/admin/empresas/cadastro/{user_id}', 'forms');
        Route::post('/admin/empresas/cadastro', 'formsAcitions');

        Route::get('/admin/empresa/{company_id}/editar', 'forms');
        Route::put('/admin/empresa/{company_id}/editar', 'formsAcitions');

        Route::get('/admin/empresa/{company_id}/excluir/logo', 'deleteLogo');
        Route::get('/admin/empresa/{company_id}/excluir', 'delete');
    });


    /* Vancacies */
    Route::controller(AdminVacanciesController::class)->group(function () {
        Route::get('/admin/vagas', 'home');
        Route::get('/admin/empresa/{company_id}/vagas', 'vacancyCompanyList');

        Route::get('/admin/categorias/{category_id}/vagas', 'vacanciesCategoriesList');
        Route::get('/admin/vaga/{vacancy_id}', 'detail');

        Route::post('/admin/vagas/buscar', 'search');
        Route::get('/admin/vagas/buscar/{search}', 'home');

        Route::get('/admin/vagas/cadastro/{company_id}', 'forms');
        Route::post('/admin/vagas/cadastro', 'formsAcitions');

        Route::get('/admin/vaga/{vacancy_id}/editar', 'forms');
        Route::put('/admin/vaga/{vacancy_id}/editar', 'formsAcitions');

        Route::get('/admin/vaga/{vacancy_id}/excluir/logo', 'deleteLogo');
        Route::get('/admin/vaga/{vacancy_id}/excluir', 'delete');
    });


    /* Applications */
    Route::controller(AdminApplicationsController::class)->group(function () {
        Route::get('/admin/vaga/aplicacoes/{vacancy_id}', 'home');

        Route::get('/admin/vaga/aplicacoes/curriculo/{app_id}', 'detail');
        Route::get('/admin/vaga/aplicacoes/curriculo/{app_id}/{option}', 'actions');
    });


    /* Categories */
    Route::controller(AdminCategoriesController::class)->group(function () {
        Route::get('/admin/categorias', 'home');


        Route::post('/admin/categorias/buscar', 'search');
        Route::get('/admin/categorias/buscar/{search}', 'home');

        Route::get('/admin/categorias/cadastro', 'forms');
        Route::post('/admin/categorias/cadastro', 'formsAcitions');

        Route::get('/admin/categoria/{category_id}/editar', 'forms');
        Route::put('/admin/categoria/{category_id}/editar', 'formsAcitions');

        Route::get('/admin/categoria/{category_id}/excluir', 'delete');
    });


    /* Message */
    Route::controller(AdminContactsController::class)->group(function () {
        Route::get('/admin/contatos', 'home');

        Route::post('/admin/contatos/buscar', 'search');
        Route::get('/admin/contatos/buscar/{search}', 'home');

        Route::get('/admin/contato/{contact_id}/editar', 'details');
        Route::put('/admin/contato/{contact_id}/editar', 'formsAcitions');

        Route::get('/admin/contato/{contact_id}/excluir', 'delete');
    });
});


// CORPORATIVE
Route::middleware(['auth'])->group(function () {
    Route::controller(CorporateHomeController::class)->group(function () {
        Route::get('/corporativo/home', 'index');
        Route::get('/corporativo/configuracoes', 'config');
        Route::put('/corporativo/perfil/atualizar', 'configForms');
        Route::get('/corporativo/sair', 'logout');
    });

    Route::controller(CorporateCompanysController::class)->group(function () {
        Route::get('/corporativo/empresas', 'home');
        Route::get('/corporativo/usuario/{user_id}/empresas', 'companysUserList');
        Route::get('/corporativo/empresa/{company_id}', 'detail');

        Route::post('/corporativo/empresas/buscar', 'search');
        Route::get('/corporativo/empresas/buscar/{search}', 'home');

        Route::get('/corporativo/empresas/cadastro', 'forms');
        Route::post('/corporativo/empresas/cadastro', 'formsAcitions');

        Route::get('/corporativo/empresa/{company_id}/editar', 'forms');
        Route::put('/corporativo/empresa/{company_id}/editar', 'formsAcitions');

        Route::get('/corporativo/empresa/{company_id}/excluir/logo', 'deleteLogo');
        Route::get('/corporativo/empresa/{company_id}/excluir', 'delete');
    });

    /* Applications */
    Route::controller(CorporateApplicationsController::class)->group(function () {
        Route::get('/corporativo/vaga/aplicacoes/{vacancy_id}', 'home');

        Route::get('/corporativo/vaga/aplicacoes/curriculo/{app_id}', 'detail');
        Route::get('/corporativo/vaga/aplicacoes/curriculo/{app_id}/{option}', 'actions');
    });

    /* Vancacies */
    Route::controller(CorporateVacanciesController::class)->group(function () {
        Route::get('/corporativo/vagas', 'home');
        Route::get('/corporativo/empresa/{company_id}/vagas', 'vacancyCompanyList');

        Route::get('/corporativo/vaga/{vacancy_id}', 'detail');

        Route::post('/corporativo/vagas/buscar', 'search');
        Route::get('/corporativo/vagas/buscar/{search}', 'home');

        Route::get('/corporativo/vagas/cadastro/{company_id}', 'forms');
        Route::post('/corporativo/vagas/cadastro', 'formsAcitions');

        Route::get('/corporativo/vaga/{vacancy_id}/editar', 'forms');
        Route::put('/corporativo/vaga/{vacancy_id}/editar', 'formsAcitions');

        Route::get('/corporativo/vaga/{vacancy_id}/excluir/logo', 'deleteLogo');
        Route::get('/corporativo/vaga/{vacancy_id}/excluir', 'delete');
    });
});

//companys
