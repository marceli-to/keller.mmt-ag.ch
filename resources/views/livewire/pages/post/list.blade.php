<div class="max-width-page">
  @foreach($posts as $post)
    <x-post :post="$post" />
  @endforeach
</div>
