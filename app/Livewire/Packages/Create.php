<?php

namespace App\Livewire\Packages;

use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $name;
    public $description;
    public $price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        Package::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'created_by' => Auth::id(), // Assuming you want to track who created the package
        ]);

        $this->alert('success', 'Package successfully created', [
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
