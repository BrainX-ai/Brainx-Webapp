<!-- The Modal -->
<style>
    .paypal-logo {
        font-family: Verdana, Tahoma;
        font-weight: bold;
        font-size: 26px;
        display: inline-block;
        text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.6);
        font-size: 20px;


    }

    .paypal-logo i:first-child {
        color: #253b80;
    }

    .paypal-logo i:last-child {
        color: #179bd7;
    }
</style>
<div class="modal fade custom-modal" id="checkout">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h4 class="modal-title text-center w-100">Checkout</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="  card m-2 border-0  col-md-12 ">
                    <h4>{{ $service->title }}</h4>
                    <div class="card-body text-center">
                        <form action="{{ route('client.register') }}" method="POST" id="signup-form">
                            @csrf
                            <ul>
                                <li class="d-flex justify-content-between">
                                    <div>
                                        {{ $service->delivery_time }} days delivery
                                    </div>
                                    <div>
                                        {{ $service->price }}$
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div>
                                        Service fee
                                    </div>
                                    <div>
                                        {{ $service->price * 0.2 }}$
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div>
                                        Total
                                    </div>
                                    <div>
                                        {{ $service->price * 1.2 }}$
                                    </div>
                                </li>
                            </ul>
                            <div>
                                <a href="{{ route('process.payment', ['id' => encrypt($service->id)]) }}"
                                    class="btn btn-primary">
                                    Pay with Paypal
                                </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->
