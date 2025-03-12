<?php
namespace App\Filters\Image\Template;
use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class Thumbnail implements ModifierInterface
{
	protected $size = 300;
	
	/**
	 * Constructor with optional parameters
	 */
	public function __construct($max_width = null, $max_height = null, $coords = null)
	{
		if ($max_width) {
			$this->size = $max_width;
		}
	}
	
	/**
	 * Apply filter to image
	 */
	public function apply(ImageInterface $image): ImageInterface
	{
		return $image->cover($this->size, $this->size);
	}
	
	/**
	 * Backwards compatibility with v2 interface
	 */
	public function applyFilter($image)
	{
		return $this->apply($image);
	}
}