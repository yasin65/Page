@extends('layouts.home')
@section('admin_content')

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Create Tag</h2>

						<a class=" btn btn-success pull-right ml-5" href="{{route('tag.index')}}">Back</a>

					</div>
					<div class="box-content">
						<form class="form-horizontal"action ="{{route('tag.store')}}"method="post">
							@csrf
						  <fieldset>
						  	@include('includes.errors');
							<div class="control-group">
							  <label class="control-label">Tag Name</label>
							  <div class="controls">
								<input type="name"placeholder ="Tag Name"id="name" name="name">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3"name="description"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Submit</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			
@endsection