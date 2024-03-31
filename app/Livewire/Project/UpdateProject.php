<?php
namespace App\Livewire\Project;
use App\Livewire\Forms\ProjectForm;
use Livewire\Component;
use App\Models\Project;
 
class UpdateProject extends Component
{
  public ProjectForm $form;

  protected $view = 'livewire.pages.project.form';

  public function mount(Project $project)
  {
    $this->form->setProject($project);
  }

  public function save()
  {
    $this->form->update();
    return $this->redirect(route('project.index'), navigate: true);
  }

  public function render()
  {
    return view($this->view);
  }
}