@extends('layout.main')
@section('content')

{{ Breadcrumbs::render('returns') }}

<div class="block-space block-space--layout--spaceship-ledge-height"></div>
<div class="block faq">
    <div class="container container--max--xl">
        <div class="faq__header">
            <h1 class="faq__header-title">Frequently Asked Questions</h1>
        </div>
        <div class="faq__section">
            <h3 class="faq__section-title">Shipping Information</h3>
            <div class="faq__section-body">
                <div class="faq__question">
                    <h5 class="faq__question-title">What shipping methods are available?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">Do you ship internationally?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">How might I obtain an estimated date of delivery?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">Can I split my order to ship to different locations?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq__section">
            <h3 class="faq__section-title">Payment Information</h3>
            <div class="faq__section-body">
                <div class="faq__question">
                    <h5 class="faq__question-title">What payments methods are available?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">Can I split my payment?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq__section">
            <h3 class="faq__section-title">Orders and Returns</h3>
            <div class="faq__section-body">
                <div class="faq__question">
                    <h5 class="faq__question-title">How do I return or exchange an item?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">How do I cancel an order?</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat.
                            </p>
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
