@extends('layouts.website')
@section('description')
{{ env('DESCRIPTION') }}
@endsection
@section('content')
<x-banner-component />

<x-feature-component />

<x-quote-component />

<x-about-component />

<x-doctor-component />

<x-contact-component />

@endsection
