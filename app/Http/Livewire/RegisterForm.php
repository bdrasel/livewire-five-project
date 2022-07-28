<?php

namespace App\Http\Livewire;

use App\Models\RegisterForm as ModelsRegisterForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RegisterForm extends Component
{
    use LivewireAlert;
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $role = 'customer';
    public string $company_name = '';
    public string $vat_number = '';

    protected $rules = [
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'email' => 'required|email|unique:register_forms',
        'password' => 'required|min:8',
        'role' => 'required',
        'company_name' => 'required_if:role,vendor',
        'vat_number' => 'required_if:role,vendor',
    ];

   
 
    public function render()
    {
        return view('livewire.register-form');
    }

    public function save()
    {
        $this->validate();

        $user = new ModelsRegisterForm();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->role = $this->role;
        $user->company_name = $this->company_name;
        $user->vat_number = $this->vat_number;
        $user->save();

        $this->alert('success', 'customer created successfully', [
            'position' => 'center',
            'timer' => '2000',
            'toast' => false,
            'timerProgressBar' => true,
            ]);

        $this->reset();

        // session()->flash('message', 'Customer created successfully!');

        
    }


    public function updated($property)
    {
        $this->validateOnly($property);
    }
}
