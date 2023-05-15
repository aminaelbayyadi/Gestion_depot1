@extends('layouts.app')
@extends('layouts.sidebar')
<head>
    <meta charset="utf-8">
   
</head>
<style> 
#main {
  border: 1px solid black;
  display: flex;
}



</style>
@section('content')
<div id="main">

<div style="width: 50%">
    {!! $receptionsChart->container() !!}
</div>
<div style="width: 50%">
    {!! $sortiesChart->container() !!}
</div>
<div>

@endsection

  

@push('scripts')



@endpush
