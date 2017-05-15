@extends('layouts.Manager')

@section('content')
	<!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Homepage</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('Manager.home')}}">Home</a></li>                        
            </ol>
        </div>
    </div>
     <div><a href="#">Manager Homepage</a></div>
@endsection
