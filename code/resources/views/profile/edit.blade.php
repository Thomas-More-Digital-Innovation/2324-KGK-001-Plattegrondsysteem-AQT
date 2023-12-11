@extends('layout')
@section('title', 'Account')
@section('content')
    <h1 class="font-bold text-3xl h-14 border-b-2 border-black flex justify-center items-center p-2" style="background-color:#FFAD7E;"> Account: Wachtwoord veranderen </h1>
    <x-errorhandler />
    <div class="h-screen">
        <div >
            <div >
                <div >
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endsection

