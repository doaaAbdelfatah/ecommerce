@extends("master")
@section("content")
    {{-- @dump($categories) --}}

    <div class="row">

        <div class="col-md-4 ">
       
            <form method="post" class="container" action="{{route('category.store')}}">
                {{-- {{$errors}} --}}
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
              @error('name')
                <small id="helpId" class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Comment</label>
              <textarea name="comments" class="form-control"></textarea>
              @error('comments')
              <small id="helpId" class="text-danger">{{$message}}</small>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block py-1 my-1">Save</button>
        </form>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->cat_name}}</td>
                            <td>{{$category->comments}}</td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="/category/{{$category->id}}/delete" >delete</a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4">Empty Result</td>                        
                    </tr>
                    @endforelse
                   
                  
                </tbody>
            </table>
        </div>
    </div>
@endsection