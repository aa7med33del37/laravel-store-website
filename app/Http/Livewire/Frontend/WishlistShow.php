<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistShow extends Component
{

    public function removeWishlistItem(int $wishlistId)
    {
        Wishlist::where('user_id', Auth::user()->id)->where('id', $wishlistId)->delete();
        $this->emit('wishlistAddedUpdated');
        session()->flash('message', 'Product removed from wishlist');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Product removed from wishlist !',
            'type' => 'success',
            'status' => 200,
        ]);
    }

    public function render()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlists' => $wishlists,
        ]);
    }
}
