<?php
use Illuminate\Pagination\LengthAwarePaginator;
use App\Tutorial;
use App\Service;
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
Route::get('/updated-activity', 'BooksController@updatedActivity');

Route::get('/find', [
    'uses' => 'BooksController@find'
  ]);
  Route::get('/search', [
    'uses' => 'BooksController@search'
  ]);
Route::resource('books', 'BooksController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/put', function() {
Storage::cloud()->put('test.txt', 'Hello World');
    return 'File was saved to Google Drive';
});
Route::get('/put2', function() {
    Storage::cloud()->put('Simon.txt', 'My name Is Simon Nabuko Angatia');
        return 'The file Simon.txt has been to Google Drive';
    });

    Route::get('download/{id}', 'TutorialsController@download');


   Route::resource('tutorials', 'TutorialsController'

    
//     $dir = '/';
//     $recursive = true; // Có lấy file trong các thư mục con không?
//     $content = collect(Storage::cloud()->listContents($dir, $recursive));
//    $contents= $content->where('type', '=', 'file');
   
//    foreach($contents as $tutorial){
//     if (Tutorial::where('tutorial_path', '=', Tutorial::get('tutorial_path'))->exists()) {
//         echo "The file already exists in the database";
//         return false;
//      }else{
//         $tutorials = new Tutorial();
//         $tutorials->tutorial_name=$tutorial['name'];
//         $tutorials->tutorial_type=$tutorial['type'];
//         $tutorials->tutorial_path=$tutorial['path'];
//         $tutorials->tutorial_filename= $tutorial['filename'];
//         $tutorials->tutorial_extension= $tutorial['extension'];
//         $tutorials->tutorial_mimetype=$tutorial['mimetype'];
//         $tutorials->tutorial_dirname=$tutorial['dirname'];
//         $tutorials->tutorial_size= $tutorial['size'];
//         $tutorials->tutorial_basename=$tutorial['basename'];
//         $tutorials->save();
//      }
  
// }
//   return "The details have been successfully saved in the database";



// 

);
Route::get('/search', 'TutorialsController@search');

Route::get('refresh',  function(){

    $dir = '/';
    $recursive = true; // also get files from sub-directories?
    $content = collect(Storage::cloud()->listContents($dir, $recursive));
   $contents= $content->where('type', '=', 'file');
   
   foreach($contents as $tutorial){
       $db_all=Tutorial::all();
    foreach($db_all as $db_each){
        $db_tutorial_path=$db_each->tutorial_path;
    }
    global $db_tutorial_path;
    $tutorial_path = $tutorial['path'];
    if ($tutorial_path == $db_tutorial_path){
        // tutorial found
     echo "The file exists in the database";
        return false;
     }else{
        $tutorials = new Tutorial();
        $tutorials->tutorial_name=$tutorial['name'];
        $tutorials->tutorial_type=$tutorial['type'];
        $tutorials->tutorial_path=$tutorial['path'];
        $tutorials->tutorial_filename= $tutorial['filename'];
        $tutorials->tutorial_extension= $tutorial['extension'];
        $tutorials->tutorial_mimetype=$tutorial['mimetype'];
        $tutorials->tutorial_dirname=$tutorial['dirname'];
        $tutorials->tutorial_size= $tutorial['size'];
        $tutorials->tutorial_basename=$tutorial['basename'];
        $tutorials->save();
     }
  
}
  return "The details have been successfully saved in the database";





});

    Route::get('/get', function() {
        $dir = '/';
        $recursive = false; // fetch files from subfolders too
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));
        $filename = $contents[0]['name'];
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first(); // 
        //return $file; // array with file info
        $rawData = Storage::cloud()->get($file['path']);
        return response($rawData, 200)
            ->header('Content-Type', $file['mimetype'])
            ->header('Content-Disposition', "attachment; filename='$filename'");
    });
    Route::get('/file', function() {
        return view('tutorials.file');
    });


Route::get('/', 'ServicesController@index');
Route::get('services/create', 'ServicesController@create');
Route::post('services/create', 'ServicesController@store');
Route::put('services/edit/{id}', 'ServicesController@update');
Route::get('services/show/{id}', 'ServicesController@show');
Route::delete('services/delete/{id}', 'ServicesController@delete');
Route::get('services/edit/{id}', 'ServicesController@edit');

//  group routes
Route::get('groups/index', 'GroupsController@index');
Route::get('groups/create', 'GroupsController@create');
Route::post('groups/create', 'GroupsController@store');
Route::patch('groups/edit/{id}', 'GroupsController@update');
Route::get('groups/show/{id}', 'GroupsController@show');
Route::delete('groups/delete/{id}', 'GroupsController@delete');
Route::get('groups/edit/{id}', 'GroupsController@edit');




