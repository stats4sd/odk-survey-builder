<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

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
    	$modules_list = "'";
    		
    	foreach ($modules as $id) {
    		$module = Module::where('id',$id)->first();
    		$file_name = $module->file;
    		$modules_list .= $file_name.',';
    	}
    	$modules_list = substr($modules_list, 0, -1);
    	$modules_list .= "'";
 
        $scriptName = 'merge_odk_form.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $base_path = base_path();
       	$date = str_replace(':', '', date('c'));
       	$date = str_replace('-', '', $date);
       	$date = str_replace('+', '', $date);
        $file_name = $date."rhomis.xlsx";
       
        $process = new Process("python3.7 {$scriptPath} {$base_path} {$file_name} {$modules_list}");

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
