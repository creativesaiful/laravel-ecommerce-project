@extends('frontend.main_master')
@section('title', 'dashboard')

@section('content')


    <div class="body-content outer-top-xs outer-bottom-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">

@include('frontend.user_navbar')

                <div class="col-md-8">
                    <h2>Hi {{ Auth::user()->name }}, Welcome to deashboard</h2>

                </div>

            </div>
        </div>
    </div>








@endsection
