<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;

class PostForm extends Form
{
    #[Rule('required')]
    public string $title = '';

    #[Rule('required')]
    public string $body = '';

    public function store()
    {
        Auth::user()->posts()->create(
            $this->validate()
        );

        flash('Post Created Successfully!', 'success');
        $this->reset();
    }
}
