<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Htpp\Response;
use App\Imports\UserImport;
use Excel;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        return view('admin.users.buat_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
    		'name' => 'required|min:4',
            'nim' => 'required|min:4|unique:users',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required|min:8|confirmed',
    	]);

    	$data =  new User();
        $data->name = $request->name;
        $data->nim = $request->nim;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        $role = Role::select('id')->where('name','Mahasiswa')->first();

        $data->roles()->attach($role);
    	//User::create($data);
    	return redirect(route('admin.users.index'))->with('message','User Baru Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('admin.users.view_user',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect()->route('admin.users.index');
        }
        $roles = Role::all();
        // dd($user);
        return view('admin.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        switch ($request->input('action')) {
            case 'data':
                $this->validate($request, [
                    'name' => 'required|min:4',
                    'nim' => 'required|min:4',
                    'email' => 'required|min:4|email',
                ]);
        
                $user->roles()->sync($request->roles);

                $user->name = $request->name;
                $user->nim = $request->nim;
                $user->email = $request->email;
                $user->save();
                // dd($data);
                return redirect()->route('admin.users.index')->with('message','User Berhasil di Perbarui!');
    
            case 'password':
                $this->validate($request, [
                    'nim' => 'required|min:4',
                ]);
        
                // $data = User::find($id);
                $user->password = Hash::make($request->nim);
                // dd($data);
                $user->save();
        
                //User::create($data);
                return redirect(route('admin.users.index'))->with('message','Reset Password User Berhasil!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $user = User::findOrFail($request->user_id);
        // dd($user);
        $user->roles()->detach();
        $user->delete();
        // if(Gate::denies('delete-users')){
        //     return redirect()->route('admin.users.index');
        // }
        // $user->roles()->detach();
        // $user->delete();

        return redirect()->route('admin.users.index')->with('message','User Berhasil di Hapus!');
    }

    public function importuser(){
        return view('admin.users.import.index');
    }

    public function importuserstore(Request $request){
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new UserImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Import User File Berhasil']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }

    public function download(){
        $file = public_path(). "/template/ExcelUser.xlsx";
        return response()->download($file);
    }
}
