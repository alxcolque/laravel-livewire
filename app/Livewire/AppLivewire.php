<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\WithPagination;
use Livewire\Component;

class AppLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    //public $categories = [];
    public $title, $url;
    public $app = null, $isView = false, $isEdit = false;
    public $query = '';

    public function search()
    {
        $this->resetPage();
    }
    protected $rules = [
        'title' => 'required',
        'url' => 'string|nullable'
    ];

    public function index(){
        return view('apps.index');
    }
    public function render()
    {
        $apps = Application::where('title', 'like', '%' . $this->query . '%')->paginate(5);
        return view('livewire.app-livewire', compact('apps'));
    }
    public function save()
    {
        if ($this->isEdit) {
            $this->update();
        } else {
            $this->store();
        }
    }

    public function store()
    {
        $validatedData = $this->validate();
        $data = Application::create($validatedData);

        if ($data) {
            session()->flash('success', 'added successfully!');
        } else {
            session()->flash('error', 'Unable to create details!');
        }

        $this->resetInputs();

        // Dispatching browser event to close modal
        $this->dispatchBrowserEvent('close-modal');
    }

    private function resetInputs()
    {
        $this->title = null;
        $this->url = null;
        $this->isEdit = false;
        $this->isView = false;
        $this->app = null;
    }

    public function show(Application $data)
    {
        $this->app = $data;
        if ($data) {
            $this->title = $data->title;
            $this->url = $data->url;
            $this->isView = true;
        } else {
            return redirect()->route('books');
        }
    }

    public function edit(Application $data)
    {
        $this->isView = false;
        $this->isEdit = true;
        if ($data) {
            $this->title = $data->title;
            $this->url = $data->url;
            $this->isEdit = true;
        } else {
            return redirect()->route('apps');
        }
    }

    /**
     * Function : Update Book Details
     * @param NA
     * @return response
     */
    public function update()
    {
        $validatedData = $this->validate();

        // If app exist
        if ($this->app) {
            $this->app->title = $validatedData['title'];
            $this->app->url = $validatedData['url'];
            $this->app->save();
            session()->flash('success', 'updated successfully!');
        } else {
            session()->flash('error', 'Unable to update. record not found!');
        }
        $this->isEdit = false;

        // Dispatching browser event to close modal
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete(Application $app)
    {
        // Assign model object to variable
        $this->app = $app;
    }

    public function destroy()
    {
        // If model
        if ($this->app) {
            $this->app->delete();
            session()->flash('success', 'record deleted successfully!');
        } else {
            session()->flash('error', 'Unable to delete. record not found!');
        }

        // Dispatching browser event to close modal
        $this->dispatchBrowserEvent('close-modal');
    }

    /**
     * Function : Close Modal
     */
    public function closeModal()
    {
        // calling reset inputs function
        $this->resetInputs();
    }

}
