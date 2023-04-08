@extends('layout.main')
@section('content')

<div class="block-space block-space--layout--after-header"></div>
<div class="block">
    <div class="container container--max--xl">
        <div class="row">
            @include('user.layout.menu')
            <div class="mt-4 col-12 col-lg-9 mt-lg-0">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Profile</h5>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-body card-body--padding--2">
                        <form method="POST" action="{{ route('user.update-profile') }}">
                            @csrf
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-7 col-xl-6">
                                    <div class="form-group">
                                        <label for="profile-first-name">First Name</label>
                                        <input type="text" class="form-control" id="profile-first-name" name="firstname" placeholder="First Name" value="{{ Auth()->user()->firstname }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-last-name">Last Name</label>
                                        <input type="text" class="form-control" id="profile-last-name" name="lastname" placeholder="Last Name" value="{{ Auth()->user()->lastname }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-email">Email Address</label>
                                        <input type="email" class="form-control" id="profile-email" name="email" placeholder="Email Address" value="{{ Auth()->user()->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-phone">Phone Number</label>
                                        <input type="text" class="form-control" id="profile-phone" name="phone" placeholder="Phone Number" value="{{ Auth()->user()->mobile }}">
                                    </div>
                                    <div class="mb-0 form-group">
                                        <button class="mt-3 btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>

@endsection
