@extends('layout.main')
@section('content')
<div class="block block-map">
    <div class="block-map__body">
        <iframe src="https://maps.google.com/maps?q=Future+Art+Broadcast+Trading+L.L.C&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
</div>

<div class="block-header block-header--has-breadcrumb block-header--has-title">
    <div class="container">
        <div class="block-header__body">
            <h1 class="block-header__title">Contact Us</h1>
        </div>
    </div>
</div>

<div class="block">
    <div class="container container--max--lg">
        <div class="card">
            <div class="card-body card-body--padding--2">
                <div class="row">
                    <div class="pb-4 col-12 col-lg-6 pb-lg-0">
                        <div class="mr-1">
                            <h4 class="contact-us__header card-title">Our Address</h4>
                            <div class="contact-us__address">
                                <p>Technic Building Office No. 204, Salah Al-Din St, Close to Salah Al Din Metro Station, Dubai – United Arab Emirates<br>
                                    Email: fabt@fa-bt.com<br>
                                    Phone Number: +971 42 722627
                                </p>
                                <p><strong>Opening Hours</strong><br>
                                    Monday to Thursday: 9am-6pm<br>
                                    Friday to Saturday:9am-4pm<br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="ml-1">
                            <h4 class="contact-us__header card-title">Leave us a Message</h4>
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="form-name">Your Name</label>
                                        <input type="text" id="form-name" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="form-email">Email</label>
                                        <input type="email" id="form-email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form-subject">Subject</label>
                                    <input type="text" id="form-subject" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <label for="form-message">Message</label>
                                    <textarea id="form-message" class="form-control" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>

@endsection
