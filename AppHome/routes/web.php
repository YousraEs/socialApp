<?php

use App\Services\Calcul;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Yaml\Inline;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PublicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
GET    : Lecture
POST   : Ajouter
PUT    : Modification complete
PATCH  : Modification partielle
DELETE : Supprimer
*/

// Route::get('/salam',function(){
//     return view('salam',[
//         'nom'=> 'essamadi',
//         'prenom'=> 'yousra',
//         'cours'=> ['HTML', 'CSS', 'JS', 'REACT', 'LARAVEL']
//     ]);
// }); 


// Route::get('/salam/{nom}/{prenom}',function($nom, $prenom){
//     return view('salam',[
//         'nom'=>$nom, 
//         'prenom'=>$prenom
//     ]);
// });


// Route::get('/salam/{nom}/{prenom}',function(Request $request){
//     return view('salam',[
//         'nom'=>$request-> nom, 
//         'prenom'=>$request-> prenom
//     ]);
// });

// Route::get('/',['controller','function']);
// Route::get('/',['App\Http\Controllers\homeController','index']);

// grouper les route
// Route::name('profiles.')->prefix('profiles')->group(function(){
//     Route::controller(ProfileController::class)->group(function(){
//         Route::get('/','index')->name('index');
//         Route::get('/create','create')->name('create');
//         Route::post('/','store')->name('store');
//         Route::delete('/{profile}','destroy')->name('destroy');
//         Route::get('/{profile}/edit', 'edit')->name('edit');
//         Route::put('/{profile}', 'update')->name('update');
//         Route::get('/{profile}','show')->name('show')->where('profile', '\d+');
//     });
// });

Route::resource('profiles', ProfileController::class); 
Route::resource('publications', PublicationController::class); 

Route::get('/',[HomeController::class, 'index'])->name('homePage');

Route::middleware('guest')->group(function(){
    Route::get('/login',[LoginController::class, 'show'])->name('login.show');
    Route::post('/login',[LoginController::class, 'login'])->name('login');
});

Route::get('/logout',[LoginController::class, 'logout'])->name('login.logout');
//Route::get('/profile/{id}',[ProfileController::class, 'show'])->name('profile.show')->where('id','\d+');
Route::get('/information',[InformationController::class, 'index'])->name('information.index');



// route facultative (ila kan 8aykhdem wila makanxi makaynxi moxkil)
Route::get('/age/{age?}',function($age = NULL){
    if(empty($age)){
        return 'age inconnu';
    }else{
        return 'age' .' '. $age;
    }
});


// trois fonction de la route
Route::get('/route', function(){
    dd(Route::current()); // donne les information du route
    // dd(Route::currentRouteName()); // donne le nom de route
    // dd(Route::currentRouteAction()); // donne l'action actuelle
})->name('route');


// redirection vers un autre site
Route::get('/google',function(){
    return redirect()->away('https://www.google.com');
});


// le couplage fort (makhasnax nkhdmo biha)
Route::get('/somme/{a}/{b}', function($a,$b){
    $calcul = new Calcul();
    return $calcul->somme($a,$b);
});


// injection de dépendance (couplage faible)
// Route::get('/somme/{a}/{b}', function($a,$b, Calcul $calcul){
//     return $calcul->somme($a,$b);
// });


// response 
Route::get('/salam', function(){
    // return new Response('Salam',404);
    return response()->download('storage/profile/profile.jpg',disposition:'inline');
});


// cookie
Route::get('/cookie/get',function(Request $request){
    dd($request->cookie('age'));
});

Route::get('/cookie/set/{cookie}',function($cookie){
    $response = new Response();
    $cookieObject = cookie('age',$cookie,1);
    return $response->withCookie($cookieObject);
});


// header => ensemble des information envoyer de server a navigateur
    // content-type : text/plain image/png application/json
    // cache
    // ...
    // X-profile = 15

Route::get('/header',function(Request $request){
    // dd($request->header());
    // dd($request->header('host'));
    $response = new Response(['data'=> 'ok']);
    return $response->withHeaders([
        'Content-Type' => 'Application/json',
        'X-bool' => 'yes'
    ]);
});


// request
Route::get('/request',function(Request $request){
    dd($request->url(),
    $request->fullUrl()); // kad affichi lina 7ta query parametre
    // dd($request->path());
    // dd($request->is('request'));
    // dd($request->host());
    // dd($request->method());
    // dd($request->isMethod('POST'));
    // dd($request->ip());
});