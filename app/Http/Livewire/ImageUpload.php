<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    use WithFileUploads;

    public $image = [];

    public function saveImage()
    {
        $this->validate([
            'image.*' => 'image|max:1024'
        ]);

        foreach ($this->image as $image) {
            $image->store('public');
            // $image->storeAs('public', $image->getClientOriginalName());
        }
    }





    public function render()
    {
        return view('livewire.image-upload', [
            'images' => collect(Storage::files('public'))
                ->filter(function ($file) {
                    return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['png', 'jpg', 'jpeg', 'gif', 'webp']);
                })
                ->map(function ($file) {
                    return Storage::url($file);
                })
        ]);
    }
}
