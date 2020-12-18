<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class PicturesUpload extends Component
{
    use WithFileUploads;

    public $pictures=[];

    public function uploadMultipleFiles(){
        $this->validate([
            'pictures.*' => 'image'
        ]);

        if( !empty( $this->pictures ) ){
            foreach( $this->pictures as $picture ){
                $picture->store('public/products');
            }
        }
    }
    
    public function render()
    {
        return view('livewire.pictures-upload');
    }
}
