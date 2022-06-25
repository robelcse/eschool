@extends('layout.app')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-0">
          <h5>{{ $title }}</h5>
        </div>
        <div class="card-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8">
                <div class="webshop-title">
                  <form action="{{ Auth::user()->role == 1 ? url('admin/teacher/store'):url('teacher/teacher/store') }}" method="POST">
                    @csrf

                    <div class="row mb-4">
                      <div class="col-md-5">
                        <label>First name</label>
                      </div>
                      <div class="col-md-7">
                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name')}}" placeholder="First name" />
                        <label class="invalid-feedback">{{ $errors->first('first_name') }}</label>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-5">
                        <label>Last name</label>
                      </div>
                      <div class="col-md-7">
                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name')}}" placeholder="Last name" />
                        <label class="invalid-feedback">{{ $errors->first('last_name') }}</label>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-5">
                        <label>Email</label>
                      </div>
                      <div class="col-md-7">
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email')}}" placeholder="Email" />
                        <label class="invalid-feedback">{{ $errors->first('email') }}</label>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-5">
                        <label>City</label>
                      </div>
                      <div class="col-md-7">
                        <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{ old('city')}}" placeholder="City" />
                        <label class="invalid-feedback">{{ $errors->first('city') }}</label>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-5">
                        <label>Zipcode</label>
                      </div>
                      <div class="col-md-7">
                        <input class="form-control @error('zipcode') is-invalid @enderror" type="text" name="zipcode" value="{{ old('zipcode')}}" placeholder="Zipcode" />
                        <label class="invalid-feedback">{{ $errors->first('zipcode') }}</label>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-5">
                        <label>Address</label>
                      </div>
                      <div class="col-md-7">
                        <textarea class="form-control @error('address') is-invalid @enderror" rows="6" name="address" value="{{ old('address')}}" placeholder="Address"></textarea>
                        <label class="invalid-feedback">{{ $errors->first('address') }}</label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="submit-section">
                        <button class="btn btn-primary pull-right" type="submit">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection