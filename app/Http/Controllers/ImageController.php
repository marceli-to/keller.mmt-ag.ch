<?php
namespace App\Http\Controllers;
use App\Services\ImageCache;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Config;

class ImageController extends Controller
{
  protected $maxWidth;
  protected $maxHeight;
  protected $coords;
  protected $imageCache;
  protected $imageManager;

  public function __construct(ImageCache $imageCache)
  {
    $this->imageCache = $imageCache;
    $this->imageManager = new ImageManager(new Driver());
  }

  /**
   * Get HTTP response of either original image file or
   * template applied file.
   *
   * @param  string $template
   * @param  string $filename
   * @return Illuminate\Http\Response
   */

  public function getResponse($template, $filename, $maxWidth = NULL, $maxHeight = NULL, $coords = NULL)
  {
    $this->maxWidth  = $maxWidth;
    $this->maxHeight = $maxHeight;
    $this->coords    = $coords;

    switch (strtolower($template)) {
      case 'original':
        return $this->getOriginal($filename);

      case 'download':
        return $this->getDownload($filename);

      default:
        return $this->getImage($template, $filename);
    }
  }

  /**
   * Get the image with the applied template
   *
   * @param string $template
   * @param string $filename
   * @return \Illuminate\Http\Response
   */
  protected function getImage($template, $filename)
  {
    $params = [
      'maxWidth' => $this->maxWidth,
      'maxHeight' => $this->maxHeight,
      'coords' => $this->coords,
    ];

    $cachedPath = $this->imageCache->getCachedImage($template, $filename, $params);

    if (!$cachedPath || !File::exists($cachedPath)) {
      abort(404);
    }

    $mime = File::mimeType($cachedPath);
    $content = File::get($cachedPath);

    return Response::make($content, 200, [
      'Content-Type' => $mime,
      'Cache-Control' => 'max-age=' . (config('imagecache.lifetime', 43200) * 60) . ', public',
      'Etag' => md5($content)
    ]);
  }

  /**
   * Get the original image without any modifications
   *
   * @param string $filename
   * @return \Illuminate\Http\Response
   */
  protected function getOriginal($filename)
  {
    $paths = config('imagecache.paths', []);
    
    foreach ($paths as $path) {
      $filePath = $path . '/' . $filename;
      if (File::exists($filePath)) {
        $mime = File::mimeType($filePath);
        $content = File::get($filePath);

        return Response::make($content, 200, [
          'Content-Type' => $mime,
          'Cache-Control' => 'max-age=' . (config('imagecache.lifetime', 43200) * 60) . ', public',
          'Etag' => md5($content)
        ]);
      }
    }

    abort(404);
  }

  /**
   * Get the image as a download
   *
   * @param string $filename
   * @return \Illuminate\Http\Response
   */
  protected function getDownload($filename)
  {
    $paths = config('imagecache.paths', []);
    
    foreach ($paths as $path) {
      $filePath = $path . '/' . $filename;
      if (File::exists($filePath)) {
        return response()->download($filePath);
      }
    }

    abort(404);
  }
}
