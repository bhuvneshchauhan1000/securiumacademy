@extends('layouts.site')
@section('content')
@php
    $courses = \App\Models\Course::with(['courseCategory', 'academy', 'university'])->where('slug', $slug)->first();
@endphp

@endsection