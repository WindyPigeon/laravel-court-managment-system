@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
            <div class="card-header">{{ __('New Reservation') }}</div>

            <div class="card-body">
              <form method="POST" action="{{ route('reservations.store') }}">
                @csrf

                <div class="row mb-3">
                  <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>
                  <div class="col-md-6">
                    <textarea id="location" class="form-control" name="location" value="{{ $facility->location }}" readonly></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="is-indoor" class="col-md-4 col-form-label text-md-end">{{ __('Indoor/Outdoor') }}</label>
                  <div class="col-md-6">
                    <select id="is-indoor" class="form-control" name="is-indoor" readonly>
                      <option value="indoor">Indoor</option>
                      <option value="">Outdoor</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="cost-per-hour" class="col-md-4 col-form-label text-md-end">{{ __('Cost per hour') }}</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">RM</span>
                      </div>
                      <input id="cost-per-hour" type="number" class="form-control" name="cost-per-hour" step="0.01" min="0.00" value="{{ $facility->cost_per_hours }}" readonly>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="number-of-courts" class="col-md-4 col-form-label text-md-end">{{ __('Number of courts') }}</label>
                  <div class="col-md-6">
                    <input id="number-of-courts" type="number" class="form-control" name="number-of-courts" step="1" min="0" value="{{ $facility->number_of_courts }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="start-time" class="col-md-4 col-form-label text-md-end">{{ __('Start at') }}</label>
                  <div class="col-md-6">
                    <input id="start-time" type="datetime-local" class="form-control" name="start-time">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="end-time" class="col-md-4 col-form-label text-md-end">{{ __('End at') }}</label>
                  <div class="col-md-6">
                    <input id="end-time" type="datetime-local" class="form-control" name="end-time">
                  </div>
                </div>

                <div class="row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <div class="hstack gap-3">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Reserve') }}
                      </button>
                      <button type="button" class="btn btn-outline-primary">
                          {{ __('Cancel') }}
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</div>]
@endsection