<?php
namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;

class ListComponent extends Component
{
  use WithPagination;

  /**
   * The field to be sorted
   */
  public $field = 'name';

  /**
   * The direction to be sorted
   */
  public $direction = 'asc';

  /**
   * The search query
   */
  #[Url(as: 'q')] 
  public $search = '';

  /**
   * The pagination limit
   */
  public $paginationLimit = 45;

  /**
   * The query string
   */
  protected $queryString = [
    'field',
    'direction'
  ];

  public function sortBy($field)
  {
    if ($this->field === $field)
    {
      $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
    } 
    else {
      $this->direction = 'asc';
    }
    $this->field = $field;
  }

  public function resetSearch()
  {
    $this->search = '';
  }

  public function paginationView()
  {
    return 'components.pagination';
  }
}