@extends('layouts.yellow.master')

@section('title', __('Checkout'))

@section('content')

    @include('partials.page-header', [
        'paths' => [
            url('/')                => __('Home'),
            route('products.index') => __('Products'),
            route('cart')           => __('Cart'),
        ],
        'active' => __('Checkout'),
    ])

    <div class="checkout block">
        <div class="container">
            <ul class="text-danger">
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <x-form :action="route('checkout')" method="POST">
                @php $user = optional(auth('user')->user()) @endphp
                <div class="row">
                    <div class="col-12 col-md-8 mb-md-1 offset-md-2">
                        <div class="card mb-lg-0">
                            <div class="card-body p-3">
                                <h3 class="card-title">@lang('Billing Details')</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <x-input name="name" placeholder="Name *" :value="$user->name" />
                                        <x-error field="name" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input name="phone" placeholder="Phone Number *" :value="$user->phone_number ?? ''" />
                                        <x-error field="phone" />
                                    </div>
                                </div>
{{--                                <div class="form-row">--}}
{{--                                    <div class="form-group col-md-12">--}}
{{--                                        <x-input type="email" name="email" placeholder="Email" :value="$user->email" />--}}
{{--                                        <x-error field="email" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label class="d-block">@lang('Delivery Area') <span class="text-danger">*</span></label>
                                    <div class="form-control @error('shipping') is-invalid @enderror h-auto">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="inside-dhaka" name="shipping" value="Inside Dhaka" data-val="{{ config('services.shipping.Inside Dhaka') }}">
                                            <label class="custom-control-label" for="inside-dhaka">@lang('Inside Dhaka')</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="outside-dhaka" name="shipping" value="Outside Dhaka" data-val="{{ config('services.shipping.Outside Dhaka') }}">
                                            <label class="custom-control-label" for="outside-dhaka">@lang('Outside Dhaka')</label>
                                        </div>
                                    </div>
                                    <x-error field="shipping" />
                                </div>
                                <div class="form-group mb-0">
                                    <x-textarea name="address" placeholder="Address *">{{ $user->address }}</x-textarea>
                                    <x-error field="address" />
                                </div>
                                <div class="ordered-products"></div>
                            </div>
                            <div class="card-footer p-3">
                                <button type="submit" class="btn btn-primary btn-xl btn-block">@lang('Place Order')</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 mt-md-1 offset-md-1">
                        <div class="card mb-lg-0">
                            <div class="card-body p-1">
                                <h4 class="p-2">@lang('Product Overview')</h4>
                                @include('partials.cart-table')
                            </div>
                            <div class="card-body p-3">
                                <table class="checkout__totals mb-0">
                                    <tbody class="checkout__totals-subtotals">
                                    <tr>
                                        <th>@lang('Subtotal')</th>
                                        <td class="checkout-subtotal desktop">{!!  theMoney(0)  !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('Shipping')</th>
                                        <td class="shipping">{!!  theMoney(0)  !!}</td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                    <tr>
                                        <th>@lang('Total')</th>
                                        <td><span>{!!  theMoney(0)  !!}</span></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
@endsection
