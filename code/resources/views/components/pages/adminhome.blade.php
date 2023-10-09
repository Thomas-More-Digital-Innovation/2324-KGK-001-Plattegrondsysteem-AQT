<?php 
// if (Admin::handle()) { 
//    url()->previous();
// };
?>
@extends('layout')
@section('title', 'Admin')
@section('content')
   <x-titlebar title="Admin" color="FF7E7E" back=true />
   <x-adminboxes />
@endsection