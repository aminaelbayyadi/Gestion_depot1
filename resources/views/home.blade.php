@extends('layouts.app')
@extends('layouts.sidebar')
<head>
    <meta charset="utf-8">
   
</head>

@section('content')
<div style="width: 50%">
    {!! $receptionsChart->container() !!}
</div>
@endsection

  

@push('scripts')



@endpush
