<?php

namespace App\Livewire\Packages;

use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;

    public $name;
    public $description;
    public $price;
    public $package;

    protected function rules()
    { 
        return [
            'name' => 'required|string|max:255|unique:packages,name,' . $this->package->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function mount(Package $package)
    {
        $this->package = $package;
        $this->name = $package->name;
        $this->description = $package->description;
        $this->price = $package->price;
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->package->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->alert('success', 'Package successfully updated', [
            'toast' => false,
            'position' => 'center'
        ]);

        // Optionally, you can reset the form fields or redirect the user
        $this->reset(['name', 'description', 'price']);
        return redirect()->route('packages.index'); // Redirect to the package list page
    }

    public function render()
    {
        return view('livewire.packages.create');
    }
}
