@extends('layout')
@section('title', 'Account')
@section('content')
    <x-titlebar title="Account" color="FFAD7E"/>
    <div class="h-screen pt-14">
        <div >

            <div >
                <div >
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endsection

