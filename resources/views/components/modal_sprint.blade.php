      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#spintModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
              <path fill="currentColor"
                  d="M6.414 15.89L16.556 5.748l-1.414-1.414L5 14.476v1.414zm.829 2H3v-4.243L14.435 2.212a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414zM3 19.89h18v2H3z" />
          </svg>

          Modifier le sprint

      </button>
      <div class="modal fade" id="spintModal" tabindex="-1" aria-labelledby="spintModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="spintModalLabel">
                          {{ $sprint->title }}</>
                      </h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  {{ html()->modelForm($sprint, 'PUT', route('sprints.update', $sprint))->open() }}
                  {{-- model --}}


                  <div class="modal-body">


                      {{-- create new sprint for this project  --}}
                      {{ html()->hidden('project_id', $project->id) }}
                      <div class="form-floating mb-3">
                          {{ html()->text('title')->class('form-control')->placeholder(__('label.title')) }}
                          <label for="title">Title</label>
                      </div>
                      <div class="form-floating mb-3">
                          {{ html()->textarea('description')->class('form-control')->placeholder(__('label.description'))->rows(3)->style('height: 160px') }}
                          <label for="description">Description</label>
                      </div>


                      <div class="row">
                          <div class="col-lg">
                              {{-- start_date --}}
                              <div class="form-floating mb-3">
                                  {{ html()->date('start_date')->class('form-control')->placeholder(__('label.date-star')) }}
                                  <label for="start-date">
                                      {{ __('label.start-date') }}
                                  </label>
                              </div>

                          </div>
                          <div class="col-lg">

                              {{-- durration --}}
                              <div class="form-floating mb-3">
                                  {{ html()->number('duration')->class('form-control')->placeholder(__('label.duration')) }}
                                  <label for="duration">
                                      {{ __('label.duration') }}
                                  </label>

                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg">
                              <div class="form-floating mb-3">
                                  {{ html()->select('status', ['todo' => 'A faire', 'doing' => 'En cours', 'done' => 'Terminé'])->class('form-control') }}
                                  <label for="status">
                                      {{ __('label.status') }}
                                  </label>
                              </div>


                          </div>
                          <div class="col-lg">
                              <div class="form-floating mb-3">
                                  {{ html()->select('priority', ['low' => 'Basse', 'medium' => 'Moyenne', 'high' => 'Haute'])->class('form-control') }}
                                  <label for="priority">
                                      {{ __('label.priority') }}
                                  </label>
                              </div>
                          </div>
                          <div class="col-lg">
                              <div class="form-floating mb-3">
                                  {{ html()->select('type', ['feature' => 'Fonctionnalité', 'bug' => 'Bug', 'task' => 'Tâche'])->class('form-control') }}
                                  <label for="type">
                                      {{ __('label.type') }}
                                  </label>
                              </div>
                          </div>
                      </div>


                      <?php $users = App\Models\User::all()->pluck('name', 'id'); ?>
                      <div class="form-floating mb-3">
                          {{ html()->select('assign_to', $users)->class('form-control') }}
                          <label for="assign_to">
                              {{ __('label.assigned-to') }}
                          </label>
                      </div>

                      {{-- <div class="form-floating mb-3">
                                                    {{ html()->select('parent_id', $project->sprints->pluck('title', 'id'))->class('form-control') }}
                                                    <label for="parent_id">
                                                        {{ __('label.parent') }}
                                                    </label>
                                                </div> --}}



                  </div>
                  <div class="modal-footer">

                      {{ html()->submit('Modifier')->class('btn btn-outline-success') }}
                  </div>
                  {{ html()->form()->close() }}
              </div>
          </div>
      </div>
