@extends('layouts.app')

@section('title', 'Détails du projet')

@section('content')
    <div class="container">
        <section class="row">
            <main class="col-lg-12 mb-4">

                <h2>
                    {{ __('label.project-details') }}
                </h2>
                <div class="card">
                    <div class="card-body">
                        <h1 class="h4">
                            {{ $project->title }}
                        </h1>
                        <div class="card-text text-muted ">
                            <small>

                                Créé le {{ $project->created_at->diffForHumans() }}

                            </small>
                        </div>

                        <div class="text-muted">
                            <small>

                                {{ $project->description }}

                            </small>
                        </div>
                        <section class="mt-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#spintModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M10 6.5a3 3 0 1 0 0 6h6.44l-.72-.72a.75.75 0 1 1 1.06-1.06l2 2a.75.75 0 0 1 0 1.06l-2 2a.75.75 0 1 1-1.06-1.06l.72-.72H10a4.5 4.5 0 1 1 4.032-2.5h-1.796A3 3 0 0 0 10 6.5m-7.25 6h2.64A5.5 5.5 0 0 0 6.836 14H2.75a.75.75 0 0 1 0-1.5" />
                                </svg>
                                <span class="">
                                    Ajouter une sprint
                                </span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="spintModal" tabindex="-1" aria-labelledby="spintModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="spintModalLabel">
                                                Ajouter une sprint au projet <u>{{ $project->title }}</u>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        {{ html()->form('POST', route('sprints.store'))->open() }}
                                        <div class="modal-body">
                                            <div class="">

                                                {{-- create new sprint for this project  --}}
                                                {{ html()->hidden('project_id', $project->id) }}
                                                <div class="form-floating mb-3">
                                                    {{ html()->text('title')->class('form-control')->placeholder(__('label.title')) }}
                                                    <label for="title">Title</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    {{ html()->textarea('description')->class('form-control')->placeholder(__('label.description')) }}
                                                    <label for="description">Description</label>
                                                </div>


                                                {{-- start_date --}}
                                                <div class="form-floating mb-3">
                                                    {{ html()->date('start_date')->class('form-control')->placeholder(__('label.date-star')) }}
                                                    <label for="start-date">
                                                        {{ __('label.start-date') }}
                                                    </label>
                                                </div>

                                                {{-- durration --}}
                                                <div class="form-floating mb-3">
                                                    {{ html()->number('duration')->class('form-control')->placeholder(__('label.duration')) }}
                                                    <label for="duration">
                                                        {{ __('label.duration') }}
                                                    </label>

                                                </div>
                                                <div class="form-floating mb-3">
                                                    {{ html()->select('status', ['todo' => 'A faire', 'doing' => 'En cours', 'done' => 'Terminé'])->class('form-control') }}
                                                    <label for="status">
                                                        {{ __('label.status') }}
                                                    </label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    {{ html()->select('priority', ['low' => 'Basse', 'medium' => 'Moyenne', 'high' => 'Haute'])->class('form-control') }}
                                                    <label for="priority">
                                                        {{ __('label.priority') }}
                                                    </label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    {{ html()->select('type', ['feature' => 'Fonctionnalité', 'bug' => 'Bug', 'task' => 'Tâche'])->class('form-control') }}
                                                    <label for="type">
                                                        {{ __('label.type') }}
                                                    </label>
                                                </div>
                                                <?php $users = App\Models\User::all()->pluck('name', 'id'); ?>
                                                <div class="form-floating mb-3">
                                                    {{ html()->select('assign_to', $users)->class('form-control') }}
                                                    <label for="assign_to">
                                                        {{ __('label.assigned-to') }}
                                                    </label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    {{ html()->select('parent_id', $project->sprints->pluck('title', 'id'))->class('form-control') }}
                                                    <label for="parent_id">
                                                        {{ __('label.parent') }}
                                                    </label>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                            {{ html()->submit('Créer une sprint')->class('btn btn-outline-success') }}
                                        </div>
                                        {{ html()->form()->close() }}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </main>


            <section class="col-lg-12">
                {{-- get all the sprints --}}
                <h2 class="mb-3">
                    La liste des sprints
                </h2>
                <div class="row">
                    @foreach ($project->sprints as $sprint)
                        @include('project._sprint')
                    @endforeach
                </div>

            </section>
            <!-- /.col-lg-6 -->
            <!-- /.row -->
        </section>
    </div>
    <!-- /.container -->
@endsection
