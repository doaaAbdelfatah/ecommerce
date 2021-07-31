@extends("master")
@section("content")
{{-- @dump($categories) --}}

<div class="row mt-5">

    <div class="col-md-4 ">

        <form method="post" class="container" action="{{route('category.store')}}">
            {{-- {{$errors}} --}}
            @csrf
            <div class="form-group">
                {{trans_choice('messages.category' ,\App\Models\Category::count())}}
                <label for="">{{trans("messages.Name")}}</label>
                <input type="text" name="name" id="" value="{{old('name')}}" class="form-control" placeholder=""
                    aria-describedby="helpId">
                @error('name')
                <small id="helpId" class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">{{__("messages.Comment")}}</label>
                <textarea name="comments" class="form-control">{{old('comments')}}</textarea>
                @error('comments')
                <small id="helpId" class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block py-1 my-1">Save</button>
        </form>
    </div>
    <div class="col-md-8">
        <div class="row d-flex justify-content-end mx-5">
            <div class="col-5">
                <form class="d-flex" method="post" action="/category/search">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>           
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->cat_name}}</td>
                        <td>{{$category->comments}}</td>
                        <td class="d-flex px-1">
                            <a class="btn btn-sm btn-success" href="/category/{{$category->id}}">edit</a>
                            <form method="post" action="/category/{{$category->id}}/delete">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger mx-1">delete</button>

                            </form>
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
</div>
@endsection