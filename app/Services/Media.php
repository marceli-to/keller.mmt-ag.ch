<?php
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Media
{ 

  /**
   * The temp upload directory.
   */
  protected $temp_directory;

  /**
   * The upload directory.
   */
  protected $upload_directory;

  /**
   * Constructor
   */
  public function __construct($opts = array())
  {
    $this->temp_directory = 'public/temp';
    $this->upload_directory = 'public/uploads';
  }

  /**
   * Removes a bunch of files from storage
   * 
   * @param Array $files
   */
  public function removeMany($files = NULL)
  {
    foreach($files as $file)
    {
      return Storage::delete(
        $this->upload_directory . DIRECTORY_SEPARATOR . $file->name
      );
    }
  }

  /**
   * Removes a file from storage
   * 
   * @param String $filename
   */
  public function remove($filename = NULL)
  {
    return Storage::delete(
      $this->upload_directory . DIRECTORY_SEPARATOR . $filename
    );
  }

  /**
   * Sanitize a filename
   *
   * @param str $filename
   * @param boolean  $force_lowercase - Force the string to lowercase?
   * @param boolean  $anal - If set to *true*, will remove all non-alphanumeric characters.
   */

  protected function sanitize($filename, $force_lowercase = true, $anal = true)
  {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "=", "+", "[", "{", "]", "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;", "â€”", "â€“", ",", "<", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($filename)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9._\-]/", "", $clean) : $clean ;
    return ($force_lowercase) ? (function_exists('mb_strtolower')) ? mb_strtolower($clean, 'UTF-8') : strtolower($clean) : $clean;
  }

}
