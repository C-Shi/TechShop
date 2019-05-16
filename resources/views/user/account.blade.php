@include('user.header')
@include('include.navbar')

<div class="container-fluid">
    <div class="row">
        {{-- sidebar section --}}
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{route('user', [Auth::user()->id])}}" class="list-group-item list-group-item-action">Account Setting</a>
                <a href="{{route('user', [Auth::user()->id, 'page' => 'Order'])}}" class="list-group-item list-group-item-action">Order History</a>
                <a href="{{route('user', [Auth::user()->id, 'page' => 'Cart'])}}" class="list-group-item list-group-item-action">Pending Order</a>
                <a href="{{route('user', [Auth::user()->id, 'page' => 'Customer Service'])}}" class="list-group-item list-group-item-action">Customer Service</a>
            </div>
        </div>

        <div class="col-md-9">
            @switch($page)
                {{-- order case --}}
                @case('Order')
                    @if(count($content) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $order)
                                <tr>
                                    <td scope="row">{{ $order->order_number }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ money_format('$%i',$order->sum() / 100)}}</td>
                                    <td>{{ $order->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">You Do Not Have Order History</div>
                    @endif
                    @break

                {{-- cart case --}}
                @case('Cart')
                    <div class="alert alert-primary" role="alert">
                        Your Order Is Not Completed Yet
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content->order_line as $order_line)
                                <tr>
                                    <td><img src="/storage/images/seeds/laptop.png" height="70" ></td>
                                    <td>{{$order_line->product->name}}</td>
                                    <td>{{$order_line->quantity}}</td>
                                    <td>{{$order_line->product->format_price($order_line->quantity) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <th>Total: </th>
                                <td>{{money_format('$%i', $content->sum() / 100)}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @break

                {{-- customer service case --}}
                @case('Customer Service')
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">
                                        Subject</label>
                                    <select id="subject" name="subject" class="form-control" required="required">
                                        <option value="na" selected="">Choose One:</option>
                                        <option value="refund">Refund</option>
                                        <option value="tracking">Tracking</option>
                                        <option value="complaint">Complaint</option>
                                        <option value="service">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                        placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                    Send Message</button>
                            </div>
                        </div>
                    </form>
                    @break

                {{-- account setting case --}}

                @default
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control editable" value={{ $content->name }} disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" value={{$content->email}} disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control editable" id="inputAddress" placeholder="1234 Main St" disabled>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control editable" id="inputCity" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Province</label>
                                <select id="inputState" class="form-control editable" disabled>
                                    <option>Alberta</option>
                                    <option>British Columba</option>
                                    <option>Manitoba</option>
                                    <option>Saskatchewan</option>
                                    <option>Ontario</option>
                                    <option>Quebec</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control editable" id="inputZip" disabled>
                            </div>
                        </div>
                        @csrf
                        <button type="button" class="btn btn-secondary btn-sm" id="edit-profile">Edit Profile</button>
                        <button type="submit" class="btn btn-sm btn-success d-none" id="submit">Update</button>
                        <button type="button" class="btn btn-secondary btn-sm d-none" id="cancel-update">I don't want to update</button>
                    </form>

            @endswitch
        </div>
        {{-- info section --}}
    </div>
</div>

<script>
    $('#edit-profile').on('click', function(){
        $('.editable').removeAttr("disabled");
        $(this).addClass('d-none');
        $('#submit').removeClass('d-none');
        $('#cancel-update').removeClass('d-none');
    })

    $('#cancel-update').on('click', function(){
        $(".editable").prop('disabled', true);
        $(this).addClass('d-none');
        $('#submit').addClass('d-none');
        $('#edit-profile').removeClass('d-none');
    })
</script>

@include('include.footer')
