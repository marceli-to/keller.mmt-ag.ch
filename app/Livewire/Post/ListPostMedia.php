<?php
namespace App\Livewire\Post;
use App\Livewire\ListComponent;
use App\Services\Media as MediaService;
use App\Models\Post;
use App\Models\Media;
use Livewire\Component;

class ListPostMedia extends Component
{
  protected $view = 'livewire.pages.post.media';

  public $mediaItems = [];

  public function mount($mediaItems)
  {
    $this->mediaItems = $mediaItems->sortBy('order');
  }

  public function delete(Media $media)
  {
    (new MediaService())->remove($media->name);
    $media->delete();
    $this->mediaItems = $this->mediaItems->except($media->id);
  }

  public function order(Media $media, $order)
  {
    $media->order = $order;
    $media->save();
    $this->mediaItems->firstWhere('id', $media->id)->order = $order;
  }

  public function render()
  {
    return view($this->view);
  }

}