@extends('layout')
@section('title', 'Account')
@section('content')
    <x-titlebar title="Account: Wachtwoord veranderen" color="FFAD7E"/>
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

