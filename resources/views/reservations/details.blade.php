@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Details') }}</div>

              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">Facilities</th>
                      <td>{{ Facility::find($reservation->facility_id) }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Location</th>
                      <td>{{ Facility::find($reservation->facility_id)->location }}</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>{{ Facility::find($reservation->facility_id)->is_indoor}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Reservation Time</th>
                      <td>{{ $reservation->start_time }} – {{ $reservation->end_time }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Reserved Courts</th>
                      <td>{{ $reservation->reserved_courts }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
