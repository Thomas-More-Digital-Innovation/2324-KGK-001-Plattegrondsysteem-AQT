@extends('layout')
@section('title', 'Protocollen')
@section('content')
   <?php
      $protocoldetail = DB::table('protocoldetail')->where([['id', '=', $id]])->first();
      $protocoltypeid = $protocoldetail->protocoltypeid;
      $protocoltype = DB::table('protocoltype')->where([['id', '=', $protocoltypeid]])->first();
      $protocolid = $protocoltype->id;
      $protocolname = $protocoltype->name;
   ?>
   <x-titlebar title={{$title}} color={{$color}} back=true link="./protocoltype?id={{$protocolid}}&t={{$protocolname}}&c={{$color}}"/>
   <x-protocolinfo id={{$id}} color={{$color}} />
@endsection