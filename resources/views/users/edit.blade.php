@extends('layouts.app')

@section('title', 'Edit Profile – ' . config('app.name', 'Laravel'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-center">Edit Profile</h2>

        <form action="/edit-profile" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Firstname') }}</label>

                <div class="col-md-6">
                    <input id="firstname"
                           type="text"
                           class="form-control @error('firstname') is-invalid @enderror"
                           name="firstname"
                           value="{{ old('firstname', $user->firstname) }}"
                           required autocomplete="firstname" autofocus>

                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Lastname') }}</label>

                <div class="col-md-6">
                    <input id="lastname"
                           type="text"
                           class="form-control @error('lastname') is-invalid @enderror"
                           name="lastname"
                           value="{{ old('lastname', $user->lastname) }}"
                           required autocomplete="lastname" autofocus>

                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('Birthdate') }}</label>

                <div class="col-md-6">
                    <input id="birthdate"
                           type="date"
                           class="form-control @error('birthdate') is-invalid @enderror"
                           name="birthdate"
                           value="{{ old('birthdate', $user->birthdate) }}"
                           required autocomplete="birthdate" autofocus>

                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                <div class="col-md-6">
                    <select name="gender" class="form-control form-select">
                        <option value="male" {{ ($user->gender == 'male') ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ ($user->gender == 'female') ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ ($user->gender == 'other') ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>

            @can('update', $user->expert)
                <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input
                            id="phone"
                            type="tel"
                            class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone', $user->expert->phone) }}"
                            required autocomplete="phone">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Expert Sphere') }}</label>

                    <div class="col-md-6">
                        <select name="type" class="form-control form-select">
                            <option value="music" {{ ($user->expert->type == 'music') ? 'selected' : '' }}>Music</option>
                            <option value="painting" {{ ($user->expert->type == 'painting') ? 'selected' : '' }}>Painting</option>
                            <option value="literature" {{ ($user->expert->type == 'literature') ? 'selected' : '' }}>Literature</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nationality" class="col-md-4 col-form-label text-md-end">{{ __('Nationality') }}</label>

                    <div class="col-md-6">
                        <select name="nationality" class="form-control form-select">
                            @foreach($countries as $country)
                                <option
                                    value="{{ $country->code }}"
                                    {{ ($user->expert->nationality == $country->code) ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endcan

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
