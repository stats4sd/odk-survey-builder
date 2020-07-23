<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Module;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;


class FormController extends Controller
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
        $user = Auth::user();

        $forms = $user->forms;

        return view('account')->with('forms', $forms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, String $file)
    {
        $form = new Form;
        $form->user_id = Auth::id();
        $form->form_title = $request->formTitle;
        $form->form_id = $request->formId;
        $form->default_language = $request->defaultLanguage;
        $form->full_core = $request->selectedCore;
        $form->file = $file;
        $form->save();

        $form->modules()->sync($request->selectedModules);
        $form->themes()->sync($request->selectedThemes);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::with(['modules', 'themes'])->get();
        $form = $form->find($id);

        return view('edit')->with('form', $form);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $file_name, $id)
    {
        Form::where('id', $id)->update([
            'user_id'=> Auth::id(),
            'form_title'=> $request->formTitle,
            'form_id'=> $request->formId,
            'default_language'=> $request->defaultLanguage,
            'full_core'=> $request->selectedCore,
            'file' => $file_name
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Form::find($id);
        $form_title = $form->form_title;
        Form::destroy($id);
        return  response()->json(['message' => 'The '.$form_title.' form has been successfully deleted.']);
    }

    public function download(Request $request)
    {
    	$modules = $request->selectedModules;
        $core = $request->selectedCore;
        $form_title = "'".$request->formTitle."'";
        $form_id = "'".$request->formId."'";
        $default_language = $request->defaultLanguage;
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
        $file_name = $date.str_replace(' ', '_', $request->formTitle).".xlsx";

        $process = new Process("pipenv run python3 {$scriptPath} {$base_path} {$file_name} {$modules_list} {$core} {$form_title} {$form_id} {$default_language}");

        $process->run();

        if(!$process->isSuccessful()) {

           throw new ProcessFailedException($process);

        } else {

            $process->getOutput();
        }

        $this->store($request, $file_name);

        $path_download = Storage::url('/odk_forms/'.$file_name);

        return response()->json(['path' => $path_download]);
    }

    public function generateNewFile(Request $request, $id)
    {
        $modules = $request->selectedModules;
        $core = $request->selectedCore;
        $form_title = "'".$request->formTitle."'";
        $form_id = "'".$request->formId."'";
        $default_language = $request->defaultLanguage;
        $modules_list = "'";

        foreach ($modules as $mod_id) {
            $module = Module::where('id',$mod_id)->first();
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
        $file_name =  $date.str_replace(' ', '_', $request->formTitle).".xlsx";

        $process = new Process("pipenv run python3 {$scriptPath} {$base_path} {$file_name} {$modules_list} {$core} {$form_title} {$form_id} {$default_language}");

        $process->run();

        if(!$process->isSuccessful()) {

           throw new ProcessFailedException($process);

        } else {

            $process->getOutput();
        }

        $this->update($request, $file_name, $id);

        $path_download = Storage::url('/odk_forms/'.$file_name);

        return response()->json(['path' => $path_download]);
    }
}
