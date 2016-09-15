<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
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
        //to encript the password
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
        //
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
