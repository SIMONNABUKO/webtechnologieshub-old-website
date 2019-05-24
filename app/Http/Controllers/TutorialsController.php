<?php

namespace App\Http\Controllers;
use App\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Image; //Intervention Image

class TutorialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show','find','search','download']]);
    }


    public function index()
    {
        //
        $tutorials = Tutorial::orderBy('created_at', 'desc')->paginate(10);
        return view('tutorials.index')->withTutorials($tutorials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('tutorials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating request data
        $this->validate($request, array(
            'tutorial_name'=>'required|Max:255',
            'tutorial_path'=>'required',
            'tutorial_filename'=>'required',
            'tutorial_size'=>'required',
            'tutorial_mimetype'=>'required'
        ));

          $uploadedFile = $request->file('tutorial_image');
   
      //Display File Name
      $file_name = $uploadedFile->getClientOriginalName();
   
      //Display File Extension
      $file_extension= $uploadedFile->getClientOriginalExtension();
  
      //Display File Size
      $file_size= $uploadedFile->getSize();
   
      //Display File Mime Type
      $file_mime= $uploadedFile->getMimeType();
   
      //Move Uploaded File
      $destinationPath = 'storage/tutorial_images';
      
      $uploadedFileName= $file_name.$file_size.time().'.'.$file_extension;
      $uploadedFile->move($destinationPath, $uploadedFileName);


        //request variables
        $tutorial = new Tutorial;
        $tutorial->tutorial_name=$request->tutorial_name;
        $tutorial->tutorial_path=$request->tutorial_path;
        $tutorial->tutorial_description=$request->tutorial_description;
        $tutorial->tutorial_path=$request->tutorial_path;
        $tutorial->tutorial_dirname=$request->tutorial_dirname;
        $tutorial->tutorial_image=$request->tutorial_image;
        $tutorial->tutorial_filename=$request->tutorial_filename;
        $tutorial->tutorial_size=$request->tutorial_size;
        $tutorial->tutorial_extension=$request->tutorial_extension;
        $tutorial->tutorial_image=$uploadedFileName;
        $tutorial->save();
       return redirect('tutorials.show')->with('Success', 'The tutorial has been added successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tutorial = Tutorial::find($id);
        views($tutorial)->record();
        return view('tutorials.show')->with('tutorial', $tutorial);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tutorial=Tutorial::find($id);
        return view('tutorials.edit')->with('tutorial', $tutorial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validating request data
         $this->validate($request, array(
            'tutorial_name'=>'required|Max:255',
            'tutorial_path'=>'required',
            'tutorial_filename'=>'required',
            'tutorial_size'=>'required',
            'tutorial_mimetype'=>'required'
        ));
        //image pload
        $uploadedFile = $request->file('tutorial_image');

    //Get File Name
    $file_name = $uploadedFile->getClientOriginalName();

    //Display File Extension
    $file_extension= $uploadedFile->getClientOriginalExtension();

    //Display File Size
    $file_size= $uploadedFile->getSize();

    //Display File Mime Type
    $file_mime= $uploadedFile->getMimeType();

    //Move Uploaded File
    $destinationPath = 'storage/tutorial_images';

    $uploadedFileName= $file_name.$file_size.time().'.'.$file_extension;
    $uploadedFile->move($destinationPath, $uploadedFileName);

    
        //request variables
        $tutorial = Tutorial::find($id);
        $tutorial->tutorial_name=$request->input('tutorial_name');
        $tutorial->tutorial_path=$request->input('tutorial_path');
        $tutorial->tutorial_description=$request->input('tutorial_description');
        $tutorial->tutorial_path=$request->input('tutorial_path');
        $tutorial->tutorial_dirname=$request->input('tutorial_dirname');
        $tutorial->tutorial_image=$request->input('tutorial_image');
        $tutorial->tutorial_filename=$request->input('tutorial_filename');
        $tutorial->tutorial_size=$request->input('tutorial_size');
        $tutorial->tutorial_extension=$request->input('tutorial_extension');
        $tutorial->tutorial_image=$uploadedFileName;
        $tutorial->save();
       return redirect()->route('tutorials.show', $tutorial->id)->with('Success', 'The tutorial has been added successfully'); 


    }

    public function download($id)
    {
        //Downloading the file clicked
        
            $tutorial= Tutorial::Find($id);
            $tutorial_name = $tutorial->tutorial_name;
            $dir = '/';
            $recursive= true;//Search the file in directories and sub-d also
            $contents = collect(Storage::cloud()->listContents($dir, $recursive));
            $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($tutorial_name, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($tutorial_name, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!
        //return $file; // array with file info
        $rawData = Storage::cloud()->get($file['path']);
        return response($rawData, 200)
            ->header('ContentType', $file['mimetype'])
            ->header('Content-Disposition', "attachment; filename=$tutorial_name");
    
    return view('tutorials.download')->withMessage('Thank you for downloading the tutorial');
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
// Gets the query string from our form submission
$query = $request->input('search');
// Returns an array of articles that have the query string located somewhere within
// our articles titles. Paginates them so we can break up lots of search results.
$books = Tutorial::where('tutorial_name', 'LIKE', '%' . $query . '%')->get();

// returns a view and passes the view the list of articles and the original query.
return view('tutorials.search_results')->withBooks($books);
    }




    public function destroy($id)
    {
        //
    }
}
