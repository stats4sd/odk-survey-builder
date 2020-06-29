@extends('layouts.app')

@section('content')

 
    <div class="row justify-content-center">
        <div class="col-md-10">
            <account :forms="{{$forms}}"
            ></account>
            
            
        </div>
    </div>

@endsection
