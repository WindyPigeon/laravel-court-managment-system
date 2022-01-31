@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-xl-8">
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
                      <th scope="col"></th>
                    </tr>
                    <tbody>
                    <form method="GET">
                      @foreach ($facilities as $facility)
                        <tr>
                          <td>
                            {{ $facility->location }}
                          </td>
                          <td>
                            {{ $facility->facilityType()->sport }}
                          </td>
                          <td>
                            {{ $facility->is_indoor }}
                          </td>
                          <td>
                            {{ $facility->number_of_courts }}
                          </td>
                          <td>
                            <div class="hstack gap-3">
                              @if (Auth::user()->isAdmin())
                                <button type="submit" class="btn btn-primary" formaction="facilities/{{ $facility->id }}/edit">
                                    {{ __('Edit') }}
                                </button>
                              @endif
                              <button type="submit" class="btn btn-outline-primary" formaction="facilities/{{ $facility->id }}/reserve">
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