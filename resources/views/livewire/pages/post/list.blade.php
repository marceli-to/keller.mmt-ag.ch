<div class="max-w-xl">
  @foreach($posts as $post)
    <x-post :post="$post" />
  @endforeach
</div>
