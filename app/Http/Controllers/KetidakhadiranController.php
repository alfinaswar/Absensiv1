<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use App\Models\Ketidakhadiran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KetidakhadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ketidakhadiran::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('ketidakhadiran.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-id="' . $row->id . '">Delete</a>';
                    return $btn;
                })
                ->addColumn('preview_dokumen', function ($row) {
                    if ($row->Dokumen) {
                        $url = asset('storage/' . $row->Dokumen);
                        return '<a href="' . $url . '" target="_blank">Preview Dokumen</a>';
                    } else {
                        return 'Tidak ada dokumen';
                    }
                })
                ->rawColumns(['action', 'preview_dokumen'])
                ->make(true);
        }
        return view('ketidakhadiran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = JenisCuti::get();
        return view('ketidakhadiran.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        if ($request->hasFile('Dokumen')) {
            $file = $request->file('Dokumen');
            $filePath = $file->storeAs('Dokumen', time() . '_' . $file->getClientOriginalName(), 'public');
            $data['Dokumen'] = $filePath;
        }
        $data['idUser'] = auth()->user()->id;
        $data['idAbsen'] = 0;
        // Simpan data ke database
        Ketidakhadiran::create($data);

        return redirect()->route('ketidakhadiran.index')->with('success', 'Ketidakhadiran berhasil diajukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ketidakhadiran $ketidakhadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ketidakhadiran $ketidakhadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ketidakhadiran $ketidakhadiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ketidakhadiran $ketidakhadiran)
    {
        //
    }
}
