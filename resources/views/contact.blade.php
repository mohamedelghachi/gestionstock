@extends('layouts.master')

@section('content')
@parent
<p>contact page</p>
@php
    $message = "Attention !"
@endphp
<x-alert type="danger" :message="$message"/>

@endsection