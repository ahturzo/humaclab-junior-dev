@extends('layouts.app')

@section('top-link')
@endsection

@section('content')
	@foreach($cat as $category)
		@php 
    		$i = 0
    	@endphp
    	@foreach($products as $count)
			@if($category->id == $count->category_id)
				@php
					$i++
				@endphp
			@endif
    	@endforeach

    	@if($i > 0)
		<div class="container py-3">
		    <div class="row justify-content-center">
		        <div class="col-md-12">
		            <div class="card">
		                <div class="card-header">
		                	@foreach($products as $pros)
		                		@if($category->id == $pros->category_id)
		                			Product name: <strong>{{ $pros->name }}</strong>
		                			@break
		                		@endif		
		                	@endforeach
		                </div>
		                <div class="card-body">
                      
                        <table class="table table-hover">
			                <thead>
			                  	@foreach($products as $pro)
			                      	<tr>
			                            @if($category->id == $pro->category_id)
			                                @php
			                                  $variant = json_decode($pro->variant_category);
			                                @endphp
			                                @foreach($variant as $var)
			                                  <th scope="col">{{ $var }}</th>   
			                                @endforeach
			                                <th scope="col">Price</th>
			                                @break
			                            @endif
			                      	</tr>
			                    @endforeach
			                </thead>
			                <tbody>
			                    @foreach($products as $pro)
			                      	<tr class="table-active">
			                        	@if($category->id == $pro->category_id)
			                                @php
			                                  $value = json_decode($pro->variant_value);
			                                @endphp
			                                @foreach($value as $var)
			                                  <td>{{ $var }}</td>
			                                @endforeach
			                                <td>{{ $pro->price }}</td>
			                            @endif
			                      	</tr>
			                    @endforeach
			                </tbody>
			            </table>
                    </div>
		                
		            </div>
		        </div>
		    </div>
		</div>
		@endif
	@endforeach 
@endsection

@section('bottom-js')
@endsection