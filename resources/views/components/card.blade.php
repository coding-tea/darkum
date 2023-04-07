<div class="card m-1" style="width: 18rem;">
  <img src="{{ $image ?? NULL }}" class="card-img-top" alt="{{ $title }}">
  <div class="card-body">
    <h5 class="card-title">{{ $title }}</h5>
    <p class="card-text">{{ $description }}</p>
    <a href="#" class="btn btn-primary">Edit annoce</a>
    <a href="#" class="btn btn-danger">delete annoce</a>
  </div>
</div>