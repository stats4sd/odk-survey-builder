@extends('layouts.app')

@section('content')
    <div class="accordion-area">
        <div class="panel">
            <div
                id="builder"
                class="collapse show"
                aria-labelledby="builder"
                data-parent="#surveybuilder"
            >
                <div class="panel-body">
                    <div class="w-100">
                        <div id='app'>
                            <survey-builder-edit :form={{$form}}></survey-builder-edit>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
