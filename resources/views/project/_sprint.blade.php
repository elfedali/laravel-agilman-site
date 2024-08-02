  <div class="col-lg-12" id="sprint-{{ $sprint->id }}">
      <div class="card mb-3"
          style="border: 2px solid @if ($sprint->status == 'todo') #0d6efd @elseif ($sprint->status == 'doing') #ffc107 @else var(--bs-secondary) @endif">

          <div class="card-body">
              <h4>
                  {{-- type --}}
                  <span
                      class="badge @if ($sprint->type == 'feature') bg-primary @elseif ($sprint->type == 'bug') bg-danger @else bg-info @endif">
                      @lang('label.' . $sprint->type)

                  </span>
                  <a href="{{ route('sprints.show', $sprint) }}" class="text-decoration-none">
                      {{ $sprint->title }}
                  </a>
              </h4>
              <div>{{ $sprint->description }}</div>
              <p class="text-muted">
                  <small>

                      Créé le {{ $sprint->created_at->diffForHumans() }}

                  </small>
              </p>

              <div class="d-flex align-items-center flex-wrap">
                  <div class="me-3">
                      {{-- status --}}
                      <span
                          class="badge @if ($sprint->status == 'todo') bg-primary @elseif ($sprint->status == 'doing') bg-warning @else bg-success @endif">
                          {{ __('label.status') }}
                          {{ $sprint->status }}
                  </div>
                  <div class="me-3">
                      {{-- priority --}}
                      <span
                          class="badge @if ($sprint->priority == 'low') bg-info @elseif ($sprint->priority == 'medium') bg-warning @else bg-danger @endif">
                          {{ __('label.priority') }}
                          {{ $sprint->priority }}

                      </span>
                  </div>
                  {{--  start_date --}}
                  @if ($sprint->start_date)
                      <div class="me-3">
                          <span class="badge bg-secondary">
                              {{ __('label.start-date') }}
                              {{ $sprint->start_date->format(' D d/m/Y') }}
                          </span>
                      </div>
                  @endif
                  @if ($sprint->duration)
                      <div class="me-3">
                          <span class="badge bg-secondary">
                              {{ __('Durée') }}
                              {{ $sprint->duration }}
                              {{ $sprint->duration > 1 ? 'jours' : 'jour' }}
                          </span>
                      </div>
                  @endif



                  {{-- expected_end_date --}}
                  @if ($sprint->expected_end_date)
                      <div>
                          <span
                              class="badge  
                     {{ $sprint->expected_end_date->isPast() ? 'bg-danger' : 'bg-success' }}
                     ">
                              {{ __('label.expected-end-date') }}

                              {{ $sprint->expected_end_date->format('D d/m/Y') }}

                          </span>
                      </div>
                  @endif
              </div>




          </div>

      </div>


  </div>
