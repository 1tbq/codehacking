<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //we are used pluck method as lists() method seems to be deprecated
       $roles = Role::pluck('name','id')->all();


       //return dd($roles);
        return view('admin.users.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        //below is the persisting data with the photos

        //check to see if the password field is empty
        // checking for the empty fields functionality can also
        //be put in a method and used in several places
        if(trim($request->password)==''){
            //use the except() method to filter out the password field
            // similar method called only() could be use for filtering which accepts the form fields in the parameters
            $input = $request->except('password');
        }else{
            $input = $request->all();
        }



        $input = $request->all();
        //if the file name exist
        if($file= $request->file('photo_id')){
            //create the file name with the time stamp
            $name =time().$file->getClientOriginalExtension();
            //move the file to image directory creat the directroy if it doesn't exists
            $file->move('images',$name);
            //creat a new photo in database
            $photo = Photo::create(['file'=>$name]);
            //once we create the $photo variable we have the
            //photo id available right away we dont need to get
            //it like we did in native php pull out the last inserted item
            $input['photo_id']= $photo->id;

        }
        //to encrypt the password
        $input['password']=bcrypt($request->password);
        //if we dont have a photo in the form we can just create the input without the photo
        User::create($input);

        //below is persisting data without the photos
//        User::create($request->all());
        return redirect('admin/users');

//       return $request->all();

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //find the user
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();

        //return the view
        return view('admin/users/edit',compact('user','roles'));





        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {

        //find the user
        $user =User::findOrFail($id);
        //put all the request in a variable
        if(trim($request->password)==''){
            //use the except() method to filter out the password field
            // similar method called only() could be use for filtering which accepts the form fields in the parameters
            $input = $request->except('password');
        }else{
            $input = $request->all();
        }
        //checking for the file
        if($file = $request->file('photo_id')) {
            //create a name for the file
            $name = time() . $file->getClientOriginalName();
            //move th file to the directory
            $file->move('images', $name);
            //create the photo
            $photo = Photo::create(['file'=>$name]);
            //asign to photo id
            $input['photo_id']= $photo->id;
        }

        $input['password']=bcrypt($request->password);
        //update
        $user->update($input);
        //redirect
        return redirect('/admin/users');
        //

        //to check if its working below is the code to check
        //return $request->all();

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path().$user->photo->file);
        $user->delete();

        Session::flash('deleted_user','The user has been deleted');

       return redirect('admin/users');


    }
}
