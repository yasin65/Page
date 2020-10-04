@extends('layouts.home')
@section('admin_content')

	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>

				<a class=" btn btn-primary pull-right ml-5" href="{{route('category.create')}}">create Category</a>

				
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th width="10%">Category Name</th>
						  <th width="10%"> Slug</th>
						  <th width="30%">Description</th>
						  <th width="10%">Status</th>
						  <th width="20%">Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($categories as $category)
					<tr>
						<td>{{$category->name}}</td>
						<td class="center">{{Str::limit($category->description,15)}}</td>
						<td class="center">{{$category->slug}}</td>
						<td class="center">
							<span class="label label-success">active</span>
						</td>
						<td class="center">
							<a class="btn btn-success" href="{{route('category.edit',[$category->id])}}">
							<i class="halflings-icon white edit"></i>  
							</a>

							<a class="btn btn-success" href="{{route('category.show',[$category->id])}}">
							<i class="halflings-icon white show"></i>  
							</a>

							<form action="{{route('category.destroy',[$category->id])}}" method="post">
							@csrf
							@method('DELETE')
										
										<button class="btn btn-danger"><i class="halflings-icon white trash"></i> </button>
									
							</form>

						</td>
					</tr>
					@endforeach
				  </tbody>
			  </table>            
			</div>
		</div><!--/span-->
	

@endsection