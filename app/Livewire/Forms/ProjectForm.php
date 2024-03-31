<?php
namespace App\Livewire\Forms;
use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{
  public ?Project $project;

  #[Validate('required')]
  public $name = '';

  public function setProject(Project $project)
  {
    $this->project = $project;
  }

  public function store() 
  {
    $this->validate();
    Project::create(
      $this->only([
        'name',
        'budget',
        'client_id',
      ])
    );
    $this->reset(); 
  }

  public function update()
  {
    $this->validate();
    $this->client->update(
      $this->only([

      ])
    );
  }
}
