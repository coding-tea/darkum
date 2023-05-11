<div class="card m-1" style="width: 18rem;">
  <img src="{{ $image ?? NULL }}" class="card-img-top" alt="{{ $title }}">
  <div class="card-body">
    <h5 class="card-title">{{ $title }}</h5>
    <p class="card-text">{{ $description }}</p>
    <form method="post" onsubmit="return confirm('do you want to delete your announce?')" action="{{ route($routeDelete, $id) }}">
      @csrf 
      @method('DELETE')
      <button class="btn btn-primary"><a href="{{ route($routeEdit, $id) }}">edit</a></button>
      <button type="submit" class="btn btn-danger">delete</button>
    </form>
  </div>
</div>