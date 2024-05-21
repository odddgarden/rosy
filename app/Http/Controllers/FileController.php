<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        $user = Auth::user();

        return view('files.index', compact('files', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'synopsis' => ['required'],
            'genre' => ['required', 'in:action,horror,comedy,romance'],
            'pdf_file' => ['required', 'mimes:pdf', 'max:2048']
        ]);

        $pdfFile = $request->file('pdf_file');
        $filename = $pdfFile->getClientOriginalName();

        // Store the file in storage/app/public/pdfs
        $path = $pdfFile->storeAs('pdfs', $filename);

        $pdf = new File();
        $pdf->user_id = Auth::id();
        $pdf->title = $request->title;
        $pdf->synopsis = $request->synopsis;
        $pdf->genre = $request->genre;
        $pdf->filename = $filename;
        $pdf->save();

        return redirect('files')->with('success', 'PDF uploaded!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $file = File::find($id);

        return view('files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
