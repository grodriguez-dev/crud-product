<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    //definimos unas variables
    public $products, $description, $amount, $id_product;
    public $modal = false;
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }

    public function crear()
    {
        $this->clearInputs();
        $this->openModal();
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function clearInputs()
    {
        $this->description = '';
        $this->amount = '';
        $this->id_product = '';
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->id_product = $id;
        $this->description = $product->description;
        $this->amount = $product->amount;
        $this->openModal();
    }

    public function delete($id)
    {
        $product = Product::find($id)->delete();
        session()->flash('message', 'Deleted successfully');

    }

    public function save()
    {
        Product::updateOrCreate(['id' => $this->id_product],
            [
                'description' => $this->description,
                'amount' => $this->amount,
            ]);

       session()->flash('message', 
            $this->id_product ? 'Updated successfully' : 'Create successfully'
        );

        $this->closeModal();
        $this->clearInputs();
    }
}
