<div class="{{ $class ?? '' }}">
    <div>
        <div class="row">
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="{{asset($logo->mobile)}}" alt="" width="180" height="54">
                    </div>
                    <div class="media-body m-l-20">
                        <h4 class="media-heading">{{ $company->name }}</h4>
                        <p class="m-0"><span class="digits">{{ $company->phone }}</span></p>
                    </div>
                </div>
                <!-- End Info-->
            </div>
            <div class="col-sm-6">
                <div class="text-md-right">
                    <h3>Invoice #<span class="digits counter">{{ $order->id }}</span></h3>
                    <p>
                        Ordered At: {{ $order->created_at->format('M') }}<span class="digits"> {{ $order->created_at->format('d, Y') }}</span>
                        {{--                                            <br> Invoiced At: {{ date('M') }}<span class="digits"> {{ date('d, Y') }}</span>--}}
                    </p>
                </div>
                <!-- End Title-->
            </div>
        </div>
    </div>
    <hr>
    <!-- End InvoiceTop-->
    <div class="row">
        <div class="col-md-6">
            <div class="media">
                <div class="media-body m-l-20">
                    <h5>Customer Information:</h5>
                    <h5 style="font-weight: 400;" class="media-heading">Name: {{ $order->name }}</h5>
                    <h5 style="font-weight: 400;">Phone: {{ $order->phone }}</h5>
                    <h5 style="font-weight: 400;">Address: {{ $order->address }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-md-right" id="project">
                <h6>Note</h6>
                <p>{{ $order->note ?? 'N/A' }}</p>
            </div>
        </div>
    </div>
    <!-- End Invoice Mid-->
    <div>
        <div class="table-responsive invoice-table" id="table">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th width="95">Price</th>
                    <th width="10">Quantity</th>
                    <th width="95">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product->image }}" alt="Image" width="80" height="70">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->quantity * $product->price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th rowspan="5" colspan="3" style="text-align: center; vertical-align: middle; font-size: 24px;">
                        <span style="font-weight: 400;">Condition</span>: TK. {{ $order->data->shipping_cost + $order->data->subtotal - ($order->data->advanced ?? 0) - ($order->data->discount ?? 0) }}
                    </th>
                </tr>
                <tr>
                    <th>Subtotal</th>
                    <th>{{ $order->data->subtotal }}</th>
                </tr>
                <tr>
                    <th>Advanced</th>
                    <th>{{ $order->data->advanced ?? 0 }}</th>
                </tr>
                <tr>
                    <th>Shipping</th>
                    <th>{{ $order->data->shipping_cost }}</th>
                </tr>
                <tr>
                    <th>Discount</th>
                    <th>{{ $order->data->discount ?? 0 }}</th>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- End Table-->
    </div>
</div>
