@extends('layouts.home')
@section('admin_content')

	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>

				<a class=" btn btn-primary pull-right ml-5" href="{{route('post.create')}}">create Post</a>

				
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th width="10%">Post title</th>
						  <th width="10%"> Category Name</th>
						  <th width="20%">Image</th>
						  <th width="30%">Tags</th>
						  <th width="10%">Status</th>
						  <th width="20%">Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($posts as $post)
					<tr>
						<td>{{$post->title}}</td>
						<td class="center">{{$post->category->name}}</td>
						

						<td class="center">
							<div class="max-width:30px; max-height:40px;overflow:hidden">
							<img src="{{asset($post->image)}}"class="img-fluid" alt="">
						</div>
						</td>

					<td>
                        @foreach($post->tags as $tag) 
                            <span class="badge badge-primary">{{ $tag->name }} </span>
                        @endforeach
                    </td>
                    <td>
                        
                            <span class="badge badge-primary">Active </span>
                        
                    <td class="center">
							<a class="btn btn-success" href="{{route('post.edit',[$post->id])}}">
							<i class="halflings-icon white edit"></i>  
							</a>

							<a class="btn btn-success" href="{{route('post.show',[$post->id])}}">
							<i class="halflings-icon white show"></i>  
							</a>

							<form action="{{route('post.destroy',[$post->id])}}" method="post">
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