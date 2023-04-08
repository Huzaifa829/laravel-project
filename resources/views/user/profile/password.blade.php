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
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-body card-body--padding--2">
                        <form method="POST" action="{{route('user.updatepassword')}}">
                            @csrf
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-7 col-xl-6">
                                    <div class="form-group">
                                        <label for="password-current">Current Password</label>
                                        <input type="password" class="form-control" id="password-current" name="currentpassword" placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password-new">New Password</label>
                                        <input type="password" class="form-control" id="password-new" name="newpassword" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Reenter New Password</label>
                                        <input type="password" class="form-control" id="password-confirm" name="newpassword_confirmation" placeholder="Reenter New Password">
                                    </div>
                                    <div class="mb-0 form-group">
                                        <button class="mt-3 btn btn-primary">Change</button>
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
<div class="block-space block-space--layout--before-footer"></div


@endsection
