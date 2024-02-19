<?php

namespace App\Livewire\Pupuk;

use App\Models\Pupuk;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $title = 'Daftar Pupuk';
    public $search = '';

    protected $updateQueryString = [
        'search' => ['except' => '']
    ];
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $pupuks = Pupuk::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.pupuk.index', compact('pupuks'));
    }
}
