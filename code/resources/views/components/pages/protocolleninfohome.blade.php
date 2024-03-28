@extends('layout')
@section('title', 'Protocollen')
@section('content')
   <?php
      use App\Models\ProtocolDetail;
      use App\Models\ProtocolType;

      $protocoldetail = ProtocolDetail::where('id', $id)->first();
      $protocoltypeid = $protocoldetail->protocoltypeid;
      $protocoltype = ProtocolType::where('id', $protocoltypeid)->first();
      $protocolid = $protocoltype->id;
      $protocolname = $protocoltype->name;
   ?>
   <x-titlebar title={{$title}} color={{$color}} back=true link="./protocoltype?id={{$protocolid}}&t={{$protocolname}}&c={{$color}}"/>
   <x-protocolinfo id={{$id}} color={{$color}} />
@endsection