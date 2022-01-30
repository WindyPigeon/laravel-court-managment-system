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
                      <td>{{ $facility->facilitytype()->sport }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Location</th>
                      <td>{{ $facility->location }}</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>{{ $facility->is_indoor}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Operating Hours</th>
                      <td>{{ $facility->start_operating_time }} – {{ $facility->end_operating_time }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Number of Courts</th>
                      <td>{{ $facility->number_of_courts }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Available Courts</th>
                      <td>16</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>]