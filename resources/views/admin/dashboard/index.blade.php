@extends('layouts.home')
@section('admin_content')
<h1>User Name: {{Auth::user()->name}}</h1>
<h1>User Eamil: {{Auth::user()->email}}</h1>

@endsection