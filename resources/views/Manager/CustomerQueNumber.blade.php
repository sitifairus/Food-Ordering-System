@extends('layouts.Manager')

@section('content')
        <div class="container">
            <div class="content">
                <div>
                	<a href="#">Queue Number Status</a>
                	<br>
                	<table class="table table-bordered">
					  <thead>
					  	<th>
					  		<td>Current Number : {{$QueNum}}</td>
					  		<td></td>
					  	</th>
					  </thead>
					</table>
                </div>
            </div>
        </div>
@endsection