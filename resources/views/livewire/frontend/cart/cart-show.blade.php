<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Your cart</h1></div>
          </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                <form action="#" method="post" class="cart style2">
                    @if ($carts->count() > 0)
                        <table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cartItem)
                                    <tr class="cart__row border-bottom line1 cart-flex border-top">
                                        <td class="cart__image-wrapper cart-flex-item">
                                            @if ($cartItem->product->productImages)
                                            <a href="{{ url('collections/'. $cartItem->product->category->slug . '/' . $cartItem->product->slug) }}"><img style="max-height: 200px" class="cart__image" src="{{ asset($cartItem->product->productImages[0]->image) }}" alt="Elastic Waist Dress - Navy / Small"></a>
                                            @endif
                                        </td>
                                        <td class="cart__meta small--text-left cart-flex-item">
                                            <div class="list-view-item__title">
                                                <a class="text-dark font-weight-bold" href="{{ url('collections/'. $cartItem->product->category->slug . '/' . $cartItem->product->slug) }}">{{ $cartItem->product->name }} </a>
                                            </div>


                                            <div class="cart__meta-text">
                                                @if ($cartItem->productColor)
                                                    Color: {{ $cartItem->productColor->color->name }}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="cart__price-wrapper cart-flex-item">
                                            @if ($cartItem->product->selling_price)
                                                <b class="money text-danger">${{ $cartItem->product->selling_price }}</b>
                                            @else
                                                <b class="money text-danger">${{ $cartItem->product->original_price }}</b>
                                            @endif
                                        </td>
                                        <td class="cart__update-wrapper cart-flex-item text-right">
                                            <div class="cart__qty text-center">
                                                <div class="qtyField">
                                                    <a wire:loading.attr="disabled" wire:click="decrementQuantity({{ $cartItem->id }})" class="quantityBtn" href="javascript:void(0);"><i class="icon icon-minus"></i></a>
                                                    <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="{{ $cartItem->quantity }}" pattern="[0-9]*">
                                                    <a wire:loading.attr="disabled" wire:click="incrementQuantity({{ $cartItem->id }})" class="quantityBtn" href="javascript:void(0);"><i class="icon icon-plus"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right small--hide cart-price">
                                            @if ($cartItem->product->selling_price)
                                                <div><span class="money">${{ $cartItem->product->selling_price * $cartItem->quantity }}</span></div>
                                                @php
                                                    $totalPrice += $cartItem->product->selling_price  * $cartItem->quantity;
                                                @endphp
                                            @else
                                                <div><span class="money">${{ $cartItem->product->original_price * $cartItem->quantity }}</span></div>
                                                @php
                                                    $totalPrice += $cartItem->product->original_price  * $cartItem->quantity;
                                                @endphp
                                            @endif
                                        </td>
                                        <td class="text-center small--hide"><a wire:click="removeCartItem({{ $cartItem->id }})" href="javascript:void(0)" class="btn btn--secondary cart__remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-left">
                                        <a href="{{ url('/collections') }}" class="btn--link cart-continue"><i class="icon icon-arrow-circle-left"></i> Continue shopping</a></td>
                                    <td colspan="3" class="text-right">
                                    <a href="{{ url('/checkout') }}" class="btn btn-warning w-100" style="background-color: #0fa829; color: #FFF">Checkout</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <h5>No Product Found In Your Card</h5>
                    @endif

                </form>
               </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                <div class="solid-border">
                  <div class="row">
                      <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Total</strong></span>
                    <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                        <span class="money">${{ $totalPrice }}</span>
                    </span>
                  </div>
                </div>

            </div>
        </div>
    </div>

</div>
