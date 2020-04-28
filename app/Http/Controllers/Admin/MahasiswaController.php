<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Htpp\Response;
use App\Imports\MahasiswaImport;
use Excel;

class MahasiswaController extends Controller
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
        $data = Mahasiswa::mhsall();
        // dd($data);
        return view('admin.mahasiswa.list_mahasiswa',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembimbing = Dosen::all();
        return view('admin.mahasiswa.buat_mahasiswa',compact('pembimbing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required',
            'nama_mhs' => 'required',
            'angkatan' => 'required',
            'sks' => 'required',
            'ipk' => 'required',
            'pem_akademik' => 'required',
            'status_mhs' => 'required',
        ]);
        // dd($validatedData);
        Mahasiswa::create($validatedData);
        return redirect(route('admin.mahasiswa.index'))->with('message','Mahasiswa Baru Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::select('*','ref_mahasiswa.id')
                ->join('ref_dosen','ref_dosen.id','=','ref_mahasiswa.pem_akademik')
                ->where('ref_mahasiswa.id',$id)->firstOrFail();
        // dd($data);
        return view('admin.mahasiswa.view_mahasiswa',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mahasiswa::select('*','ref_mahasiswa.id')
                ->join('ref_dosen','ref_dosen.id','=','ref_mahasiswa.pem_akademik')
                ->where('ref_mahasiswa.id',$id)->firstOrFail();
        $pembimbing = Dosen::all();
        // dd($data);
        return view('admin.mahasiswa.edit_mahasiswa',compact('data','pembimbing'));
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
        $validatedData = $request->validate([
            'nim' => 'required',
            'nama_mhs' => 'required',
            'angkatan' => 'required',
            'sks' => 'required',
            'ipk' => 'required',
            'pem_akademik' => 'required',
            'status_mhs' => 'required',
        ]);
        // dd($validatedData);
        Mahasiswa::where('id',$id)->update($validatedData);
        return redirect(route('admin.mahasiswa.index'))->with('message','Data Mahasiswa Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mahasiswa = Mahasiswa::findOrFail($request->mhs_id);
        $mahasiswa->delete();

        return redirect(route('admin.mahasiswa.index'))->with('message','Data Mahasiswa Berhasil di Hapus!');
    }

    public function importview(){
        return view('admin.mahasiswa.import.index');
    }

    public function importstore(Request $request){
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new MahasiswaImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Import File Berhasil']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }

    public function download(){
        $file = public_path(). "/template/ExcelMahasiswa.xlsx";
        return response()->download($file);
    }
}
