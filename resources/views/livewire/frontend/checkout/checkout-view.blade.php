<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Checkout</h1></div>
          </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="customer-box returning-customer">
                    <h3><i class="icon anm anm-user-al"></i> Back To Cart Page ? <a href="{{url('/cart')}}" id="customer" class="text-white text-decoration-underline" data-toggle="collapse"> Click here to go</a></h3>
                    <div id="customer-login" class="collapse customer-content">
                        <div class="customer-info">
                            <form>
                                <div class="row">
                                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="exampleInputEmail1">Email address <span class="required-f">*</span></label>
                                        <input type="email" class="no-margin" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="exampleInputPassword1">Password <span class="required-f">*</span></label>
                                        <input type="password" id="exampleInputPassword1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-check width-100 margin-20px-bottom">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value=""> Remember me!
                                            </label>
                                            <a href="#" class="float-right">Forgot your password?</a>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="customer-box customer-coupon">
                    <h3 class="font-15 xs-font-13">Your Order</h3>
                    <div id="have-coupon" class="collapse coupon-checkout-content">
                        <div class="discount-coupon">
                            <div id="coupon" class="coupon-dec tab-pane active">
                                <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                <label class="required get" for="coupon-code"><span class="required-f">*</span> Coupon</label>
                                <input id="coupon-code" required="" type="text" class="mb-3">
                                <button class="coupon-btn btn" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row billing-fields">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                <div class="create-ac-content bg-light-gray padding-20px-all">
                    <fieldset>
                        <h2 class="login-title mb-3">Billing details</h2>
                        <div class="row">
                            <div class="form-group col-md-12 required">
                                <label for="input-fullname">Fullname <span class="required-f">*</span></label>
                                <input wire:model.defer="fullname" name="fullname" id="fullname" type="text">
                                @error('fullname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                <input wire:model.defer="email" name="email" value="" id="email" type="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                <label for="input-phone">Phone <span class="required-f">*</span></label>
                                <input name="phone" value="" id="phone" type="tel" wire:model.defer="phone">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="row">
                            <div class="form-group col-md-12 required">
                                <label for="input-address">Address <span class="required-f">*</span></label>
                                <textarea wire:model.defer="address" name="address" id="address"></textarea>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 required">
                                <label for="city">City <span class="required-f">*</span></label>
                                <input wire:model="city" name="city" value="" id="city" type="text">
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                <label for="input-postcode">Pincode (ZIP Code)<span class="required-f">*</span></label>
                                <input wire:model.defer="pincode" name="pincode" value="" id="pincode" type="text">
                                @error('pincode')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                <label for="input-company">Notes <span class="required-f">*</span></label>
                                <textarea wire:model='notes' name="notes" class="form-control resize-both" rows="3"></textarea>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="your-order-payment">
                    <div class="your-order">
                        <h2 class="order-title mb-4">Your Order</h2>

                        <div class="table-responsive-sm order-table">
                            <table class="bg-white table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-left">Product Name</th>
                                        <th>Price</th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart as $cartItem)
                                        <tr>
                                            <td class="text-left">{{ $cartItem->product->name }}</td>
                                            <td>${{ $cartItem->product->selling_price ?? $cartItem->product->original_price }}</td>
                                            <td>{{$cartItem->product_color_id ? $cartItem->productColor->color->name : ''}}</td>
                                            <td>{{$cartItem->quantity}}</td>
                                            <td>
                                                @if ($cartItem->product->selling_price)
                                                    ${{$cartItem->product->selling_price * $cartItem->quantity}}
                                                @else
                                                    ${{$cartItem->product->original_price * $cartItem->quantity}}
                                                @endif
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse

                                </tbody>
                                <tfoot class="font-weight-600">
                                    <tr>
                                        <td colspan="4" class="text-right">Total </td>
                                        <td>${{$totalProductAmount}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <hr />

                    <div class="your-payment">
                        <h2 class="payment-title mb-3">payment method</h2>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion" class="payment-section">
                                    <div class="card mb-2">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#collapseOne">Cash on Delivery </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="no-margin font-15">Make your payment cash on delivery. Please use your Order ID as the payment reference.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card margin-15px-bottom border-radius-none">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"> PayPal </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="no-margin font-15">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="order-button-payment" wire:ignore>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" wire:click="codOrder" wire:loading.attr="disabled" class="btn">
                                            <span wire:loading.remove wire:target="codOrder">Cash On Delivery</span>
                                            <span wire:loading wire:target="codOrder">Placeing Order ...</span>
                                        </button>
                                    </div>

                                    <div class="col-6">
                                        <div>
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AY3DkAy4kfK5hzCFctEXgztCHnH6PRkfRKkA9r0-pQ2BZV1X5_dVq2yOFFDPvlEcUCnhF2yMb6tXx0zX&currency=USD"></script>
    <script>
        paypal.Buttons({
            // onClick is called when the button is clicked
            onClick: function()  {
                // Show a validation error if the checkbox is not checked
                if (!document.getElementById('fullname').value
                    || !document.getElementById('email').value
                    || !document.getElementById('phone').value
                    || !document.getElementById('address').value
                    || !document.getElementById('country').value
                    || !document.getElementById('city').value

                )
                {
                    livewire.emit('validationForAll');
                    return false;
                } else {
                    @this.set('fullname', document.getElementById('fullname').value);
                    @this.set('email', document.getElementById('email').value);
                    @this.set('phone', document.getElementById('phone').value);
                    @this.set('address', document.getElementById('address').value);
                    @this.set('country', document.getElementById('country').value);
                    @this.set('city', document.getElementById('city').value);

                }
            },
          // Sets up the transaction when a payment button is clicked
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: '0.1' // Can also reference a variable or function
                }
              }]
            });
          },
          // Finalize the transaction after payer approval
          onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
              // Successful capture! For dev/demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              const transaction = orderData.purchase_units[0].payments.captures[0];
              if (transaction.status == 'COMPLETED') {
                livewire.emit('transactionEmit', transaction.id);
              }
            //   alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
              // When ready to go live, remove the alert and show a success message within this page. For example:
              // const element = document.getElementById('paypal-button-container');
              // element.innerHTML = '<h3>Thank you for your payment!</h3>';
              // Or go to another URL:  actions.redirect('thank_you.html');
            });
          }
        }).render('#paypal-button-container');
      </script>
@endpush
