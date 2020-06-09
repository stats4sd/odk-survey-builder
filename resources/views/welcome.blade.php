@extends('layouts.nohead')

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
                            <survey-builder></survey-builder>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
