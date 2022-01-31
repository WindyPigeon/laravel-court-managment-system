@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-body">
                <table class="table">
                    <tr>
                      <th scope="col">
                        Location
                      </th>
                      <th scope="col">
                        Facility type
                      </th>
                      <th scope="col">
                        Indoor/Outdoor
                      </th>
                      <th scope="col">
                        Number of Courts
                      </th>
                      <th scope="col">
                        Reservation Time
                      </th>
                    </tr>
                    <tbody>
                    <form method="GET">
                      @foreach ($reservations as $reservation)
                        <tr>
                          <td>
                            {{ $reservation->facility()->location }}
                          </td>
                          <td>
                            {{ $reservation->facility()->facilityType()->sport }}
                          </td>
                          <td>
                            {{ $reservation->facility()->is_indoor }}
                          </td>
                          <td>
                            {{ $reservation->facility()->number_of_courts }}
                          </td>
                          <td>
                            {{ $reservation->start_time }} - {{ $reservations->end_time }}
                          </td>
                          <td>
                            <div class="hstack gap-3">
                              @if (Auth::user()->isAdmin())
                                <button type="submit" class="btn btn-primary" formaction="reservations/{{ $reservation->id }}/edit">
                                    {{ __('Edit') }}
                                </button>
                              @endif
                              <button type="submit" class="btn btn-outline-primary" formaction="reservation/create">
                                  {{ __('Reserve') }}
                              </button>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </form>
                  </tbody>
                </table>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection