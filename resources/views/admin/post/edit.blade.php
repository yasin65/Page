@extends('layouts.home')
@section('admin_content')



<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header" data-original-title>
<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Post</h2>
<a class=" btn btn-success pull-right ml-5" href="{{route('post.index')}}">Back</a>

</div>
<div class="box-content">
<form action="{{ route('post.update',[$post->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        @include('includes.errors')
        <div class="form-group">
            <label for="title">Post title</label>
            <input type="name" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="category">Post Category</label>
            
            <select name="category" id="category" class="form-control">
                <option value="" style="display: none" selected>Select Category</option>
                @foreach($categories as $c)
                <option value="{{ $c->id }}"selected> {{ $c->name }} </option>
                @endforeach
            </select>
        </div>


        
        



        <div class="form-group">
            <label for="image">Image</label>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>

                <div style="max-width: 100px; max-height: 100px;overflow:hidden; margin-left: auto">
                <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                </div>


        </div>
        <div class="form-group">
            <label>Choose Post Tags</label>
            <div class=" d-flex flex-wrap">
                @foreach($tags as $tag) 
                <div class="custom-control custom-checkbox" style="margin-right: 20px">
                    <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{ $tag->id }}"
                            @foreach($post->tags as $t)
                            @if($tag->id == $t->id) checked @endif
                            @endforeach>
                    <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control"
                placeholder="Enter description">{{ $post->description }}</textarea>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-lg btn-primary">Update</button>
    </div>
</form>   

</div>
</div><!--/span-->

</div><!--/row-->


@endsection