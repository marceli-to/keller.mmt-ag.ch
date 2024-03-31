<?php
namespace App\Livewire\Project;
use App\Livewire\ListComponent;
use App\Models\Project;
use Livewire\Component;

class ListProject extends ListComponent
{
  protected $view = 'livewire.pages.project.list';

  public function delete(Project $project)
  {
    $project->delete();
    return redirect(route('project.index'));
  }

  public function render()
  {
    return view($this->view)->with([
      'projects' => Project::with('client')->search('name', $this->search)->orderBy($this->field, $this->direction)->paginate($this->paginationLimit),
    ]);
  }

}