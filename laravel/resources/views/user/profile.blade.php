@extends('layouts.master')

@section('content')

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ __('Update Profile') }}</h1>
                        </div>

                        <form class="user" method="POST" action="{{ route('users.profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input name="name" type="text" class="form-control form-control-user" id="name"
                                           placeholder="{{ __('First Name') }}" value="{{ $user->name }}">
                                    @if($errors->has('name'))
                                        <span style="color:red">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input name="email" type="text" class="form-control form-control-user" id="email"
                                           placeholder="{{ __('Email') }}" value="{{ $user->email }}">
                                    @if($errors->has('email'))
                                        <span style="color:red">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Create') }}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
