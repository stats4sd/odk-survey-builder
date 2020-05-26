<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       	#dd($request);
        #return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }

    public function download(Request $request)
    {
    	$modules = $request->selectedModules;
    	dd($modules);
        $scriptName = 'merge_odk_form.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $base_path = base_path();
       
       
        $file_name = date('c')."rhomis.xlsx";
       
        $process = new Process("python3.7 {$scriptPath} {$base_path} {$file_name} {$modules}");

        $process->run();
        
        if(!$process->isSuccessful()) {
            
           throw new ProcessFailedException($process);
        
        } else {
            
            $process->getOutput();
        }
       
        $path_download =  Storage::url('/odk_forms/'.$file_name);
        return response()->json(['path' => $path_download]);
    }
}
