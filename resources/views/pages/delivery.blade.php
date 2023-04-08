@extends('layout.main')
@section('content')

{{ Breadcrumbs::render('delivery') }}

<div class="block-space block-space--layout--spaceship-ledge-height"></div>
<div class="block faq">
    <div class="container container--max--xl">
        <div class="faq__header">
            <h1 class="faq__header-title">Delivery Information</h1>
        </div>
        <div class="faq__section">
            <div class="faq__section-body">
                <div class="faq__question">
                    <h5 class="faq__question-title">WHERE DO YOU DELIVER?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>We deliver to the UAE and  worldwide.</p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">WHEN WILL MY ORDER BE DELIVERED?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>That depends on which shipping option you've selected for your order and
                                if all items ordered are in stock. You will be given a choice of shipping methods
                                with estimated delivery times during the checkout process.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">CAN I HAVE MY ORDER SENT TO A DIFFERENT ADDRESS?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Yes but we might request additional documents to verify your identity.</p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">CAN I PLACE AN ORDER AND COLLECT IT FROM ONE OF YOUR BRANCHES?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>We might be able to arrange a collection, but please call us before placing an order on the website.
                                If the order was paid online using a credit/debit card we must deliver it to the card address and
                                it cannot be collected.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">HOW MUCH WILL BE CHARGED FOR INTERNATIONAL DELIVERY?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>We offer multiple shipping options and the exact charge cannot be calculated without
                                knowing which items you have ordered, and where the order will be delivered to. You
                                will be given the exact cost during the checkout process.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">HOW CAN I CHANGE MY DELIVERY ADDRESS AFTER I'VE PLACED AN ORDER?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>You can't change your delivery address after you placed an order and it's gone through,
                                you can cancel and reorder again.
                            </p>
                        </div>
                    </div>
                </div>
                 <div class="faq__question">
                    <h5 class="faq__question-title">WHAT IS NEXT DAY DELIVERY?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Next day is defined as the next day after we have all items for an order in stock and available for dispatch.</p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">DO I HAVE TO BE THERE TO SIGN FOR DELIVERY?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Yes you will be required to sign for delivery.</p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">HOW DO I TRACK MY PARCEL?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>If the shipping method you've selected offers tracking you will receive an email
                                providing you with all of the details required to track your parcel. Also you can
                                check your tracking codes in  your account page.</p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">HOW MUCH WILL I BE CHARGED FOR DELIVERY?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>We offer multiple shipping options and the exact charge cannot be calculated
                                without knowing which items have you ordered, and where will be the order be delivered to.
                                You will be given exact cost during the checkout process.</p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">I HAVE RECEIVED THE WRONG GOODS, WHAT SHOULD I DO?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Please give us a call as soon as possible. Please see our  Contact page</p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">MY ORDER HAS ARRIVED DAMAGED, WHAT SHOULD I DO?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Please give us a call as soon as possible. Please see our  Contact page</p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">WHAT HAPPENS IF I AM OUT WHEN YOU DELIVER?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>The courier should leave a calling card giving you an option to decide what to do next.
                                Unless stated otherwise the courier should attempt to redeliver the item next day.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">WHICH DELIVERY COURIERS DO YOU USE?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>We use DHL, Fedex, UPS, TNT and Aramex.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq__footer">
            <div class="faq__footer-title">Still Have A Questions?</div>
            <div class="faq__footer-subtitle">We will be happy to answer any questions you may have.</div>
            <a href="{{route('contact')}}" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
</div>

<div class="block-space block-space--layout--before-footer"></div>

@endsection
