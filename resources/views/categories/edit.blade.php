@extends("master")
@section("content")
    {{-- @dump($categories) --}}

    <div class="row">

        <div class="col-md-4 ">
       
            <form method="post" class="container" action="/category/{{$category->id}}">
                {{-- {{$errors}} --}}
                @method("patch")
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" value="{{$category->cat_name}}" class="form-control" placeholder="" aria-describedby="helpId">
              @error('name')
                <small id="helpId" class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Comment</label>
              <textarea name="comments" class="form-control">{{$category->comments}}</textarea>
              @error('comments')
              <small id="helpId" class="text-danger">{{$message}}</small>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block py-1 my-1">Save</button>
        </form>
        </div>
    </div>
@endsection