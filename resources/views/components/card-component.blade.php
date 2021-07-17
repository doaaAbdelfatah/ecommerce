<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$title}}</h5>
      <p class="card-text">{{$slot}}</p>
      <a href="{{$url ??'#'}}" class="btn btn-primary">{{$btn_msg ?? 'ok'}}</a>
    </div>
  </div>