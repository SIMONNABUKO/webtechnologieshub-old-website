<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image; //Intervention Image
use App\Service;
use App\User;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services= Service::all();
        return view('index')->withServices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request data validation
        $this->validate($request, 
        array('service_title'=>'required|Max:255','service_description'=>'required'));
    //Upload the image
    $uploadedFile = $request->file('service_image');

    //Get File Name
    $file_name = $uploadedFile->getClientOriginalName();

    //Display File Extension
    $file_extension= $uploadedFile->getClientOriginalExtension();

    //Display File Size
    $file_size= $uploadedFile->getSize();

    //Display File Mime Type
    $file_mime= $uploadedFile->getMimeType();

    //Move Uploaded File
    $destinationPath = 'storage/service_images';

    $uploadedFileName= $file_name.$file_size.time().'.'.$file_extension;
    $uploadedFile->move($destinationPath, $uploadedFileName);

    //Resize image here
    // open an image file
    $resizedImg = Image::make('storage/service_images/'.$uploadedFileName);
   
    // now you are able to resize the instance
    $resizedImg->resize(200, 150);
    //open logo image to resize
    $pathToLogoToResize= Image::make('book_images/logo.png');
    //Resize the logo image
    $pathToLogoToResize->resize(70, 80);
    //save the logo img
    $pathToLogoToResize->save('book_images/logo.jpg');
    // and insert a watermark for example
    $resizedImg->insert('book_images/logo.jpg');
    
    // finally we save the image as a new file
    $resizedImg->save('storage/service_images/'.$uploadedFileName);
 

    
    $service = new Service;
    $service->service_title = $request->service_title;
    $service->service_description = $request->service_description;
    $service->service_image=$uploadedFileName;
    $service->save();
    

    }
public function show($id)
{


$service=Service::find($id);
views($service)->record();
return view('services.show')->withService($service);


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
    public function edit($id)
    {
        //return the service based on id
        $service = Service::find($id);
        return view('services.edit')->withService($service);
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
        $this->validate($request, 
        array('service_title'=>'required|Max:255','service_description'=>'required'));
    //Upload the service_image
    $uploadedFile = $request->file('service_image');

    //Get File Name
    $file_name = $uploadedFile->getClientOriginalName();

    //Display File Extension
    $file_extension= $uploadedFile->getClientOriginalExtension();

    //Display File Size
    $file_size= $uploadedFile->getSize();

    //Display File Mime Type
    $file_mime= $uploadedFile->getMimeType();

    //Move Uploaded File
    $destinationPath = 'storage/service_images';

    $uploadedFileName= $file_name.$file_size.time().'.'.$file_extension;
    $uploadedFile->move($destinationPath, $uploadedFileName);

    //Resize image here
    // open an image file
    $resizedImg = Image::make('storage/service_images/'.$uploadedFileName);
   
    // now you are able to resize the instance
    $resizedImg->resize(200, 150);
    //open logo image to resize
    $pathToLogoToResize= Image::make('book_images/logo.png');
    //Resize the logo image
    $pathToLogoToResize->resize(70, 80);
    //save the logo img
    $pathToLogoToResize->save('book_images/logo.jpg');
    // and insert a watermark for example
    $resizedImg->insert('book_images/logo.jpg');
    
    // finally we save the image as a new file
    $resizedImg->save('storage/service_images/'.$uploadedFileName);

    //updating starts here
    $service= Service::find($id);
    $service->service_title=$request->input('service_title');
    $service->service_description=$request->input('service_description');
    $service->service_image=$uploadedFileName;
    $service->save();
    return redirect('/')->with('Success', 'The tutorial has been updated successfully'); 

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
