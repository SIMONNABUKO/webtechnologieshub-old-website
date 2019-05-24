<?php

namespace App\Http\Controllers;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Book;
use Image; //Intervention Image

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show', 'find']]);
    }


    public function index()
    {
        //
       $books = Book::orderBy('created_at', 'desc')->paginate(4);
       return view('books.index')->with('books', $books);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'book_title'=>'required',
            'slug'=>'required',
            'book_descr'=>'required',
            'book_image'=>'image|nullable|max:2048'
    ]);

// Upload file Method 1




        $uploadedFile = $request->file('book_image');
   
      //Display File Name
      $file_name = $uploadedFile->getClientOriginalName();
   
      //Display File Extension
      $file_extension= $uploadedFile->getClientOriginalExtension();
  
      //Display File Size
      $file_size= $uploadedFile->getSize();
   
      //Display File Mime Type
      $file_mime= $uploadedFile->getMimeType();
   
      //Move Uploaded File
      $destinationPath = 'storage/book_images';
      
      $uploadedFileName= $file_name.$file_size.time().'.'.$file_extension;
      $uploadedFile->move($destinationPath, $uploadedFileName);

      //Resize image here
    // open an image file
$resizedImg = Image::make('storage/book_images/'.$uploadedFileName);

// now you are able to resize the instance
$resizedImg->resize(200, 150);
//open logo image to resize
$pathToLogoToResize= Image::make('book_images/logo.png');
//Resize the logo image
$pathToLogoToResize->resize(60, 60);
//save the logo img
$pathToLogoToResize->save('book_images/logo.jpg');
// and insert a watermark for example
$resizedImg->insert('book_images/logo.jpg');

// finally we save the image as a new file
$resizedImg->save('storage/book_images/'.$uploadedFileName);
    
        //End of upload file Method 1





// Upload file Method 2
        // //Handle file upload
        // if($request->hasfile('book_image')){

        //     $fileNameWithExt = $request->file('book_image')->getClientOriginalName();
        //     //Get file name without extension
        //     $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //     //Get file extension
        //     $fileExtension = $request->file('book_image')->getClientOriginalExtension();
        //     //Final file to store
        //     $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
        //     //where to save the file
        //     $destinationPath = 'book_images';
        //     //Upload file
        //     $fileNameToStore->move($destinationPath,$fileNameToStore->getClientOriginalName());

        // }else{
        //     $fileNameToStore = "noImage.jpg";
        //     //Get file name with extension


        // }

//End of upload file method 2









        //creating a new post

        $book = new Book;
        $book->book_title = $request->input('book_title');
        $book->slug = $request->input('slug');
        $book->link=$request->input('link');
        $book->book_descr = $request->input('book_descr');
        $book->user_id = auth()->user()->id;
        $book->book_image = $uploadedFileName;
        $book->save();

        $text = "webtechnoloieshub.com updates\n"
            . "<b>New tutorial added to the website: </b>\n"
            . "<b>Course Title:</b>"."$request->book_title\n"
            . "Course Download Link:"."$request->link\n";
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        return redirect('/books')->with('success', 'A new tutorial has been added successfully');
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

        $book = Book::find($id);
        views($book)->record();
        
       return view('books.show')->with('book', $book);
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

        $book = Book::find($id);

        if(Auth()->user()->id !==$book->user_id){
             return  redirect('/books')->with('error', 'You have no permission to access this page');
        }
        return view('books.edit')->with('book', $book);
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
        //

         //validation
        $this->validate($request, [
            'book_title'=>'required',
            'slug'=>'required',
            'book_descr'=>'required',
            'book_image'=>'image|nullable|max:1999'
    ]);

    // Upload file Method 1




    $uploadedFile = $request->file('book_image');
   
    //Display File Name
    $file_name = $uploadedFile->getClientOriginalName();
 
    //Display File Extension
    $file_extension= $uploadedFile->getClientOriginalExtension();

    //Display File Size
    $file_size= $uploadedFile->getSize();
 
    //Display File Mime Type
    $file_mime= $uploadedFile->getMimeType();
 
    //Move Uploaded File
    $destinationPath = 'storage/book_images';
    
    $uploadedFileName= $file_name.$file_size.time().'.'.$file_extension;
    $uploadedFile->move($destinationPath, $uploadedFileName);

    //Resize image here
  // open an image file
$resizedImg = Image::make('storage/book_images/'.$uploadedFileName);

// now you are able to resize the instance
$resizedImg->resize(200, 150);
//open logo image to resize
$pathToLogoToResize= Image::make('book_images/logo.png');
//Resize the logo image
$pathToLogoToResize->resize(60, 60);
//save the logo img
$pathToLogoToResize->save('book_images/logo.jpg');
// and insert a watermark for example
$resizedImg->insert('book_images/logo.jpg');

// finally we save the image as a new file
$resizedImg->save('storage/book_images/'.$uploadedFileName);
        //creating a new post

        $book = Book::Find($id);
        $book->book_title = $request->input('book_title');
        $book->slug = $request->input('slug');
        $book->link=$request->input('link');
        $book->book_descr = $request->input('book_descr');
        $book->book_image =$uploadedFileName;
        $book->save();
        return redirect('/books')->with('success', 'The book has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */






     public function find(Request $request)
     {
// Gets the query string from our form submission
$query = $request->input('search');
// Returns an array of articles that have the query string located somewhere within
// our articles titles. Paginates them so we can break up lots of search results.
$books = Book::where('book_title', 'LIKE', '%' . $query . '%')->get();

// returns a view and passes the view the list of articles and the original query.
return view('books.search_results')->withBooks($books);
     }

     public function search(Request $request)
     {
// Gets the query string from our form submission
$query = $request->input('search');
// Returns an array of articles that have the query string located somewhere within
// our articles titles. Paginates them so we can break up lots of search results.
$books = Book::where('book_title', 'LIKE', '%' . $query . '%')->get();

// returns a view and passes the view the list of articles and the original query.
return view('books.search_results')->withBooks($books);
     }





    public function destroy($id)
    {
        //
        $book = Book::find($id);
        $book->delete();
        return redirect('/books')->with('success', 'The book has been deleted');
    }

    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }
}
