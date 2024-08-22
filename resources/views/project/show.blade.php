@extends('layouts.app')

@section('title', 'Détails du projet')

@section('content')
    <div class="container">
        <section class="row">
            <main class="col-lg-12 mb-4">

                <h2>
                    {{ __('label.project-details') }}
                </h2>
                <div class="card" id="project-{{ $project->id }}">
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
                        <hr>
                        <div>
                            <h6>
                                Les membres du projet
                            </h6>
                            <ul class="list-group list-group-flush">
                                @foreach ($project->members as $member)
                                    <li class="list-group list-group-item">
                                        {{ $member->name }}
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <section class="mt-4">
                            <!-- Button trigger modal -->
                            <div class="d-flex  align-items-center">

                                <button type="button" class="btn btn-success me-3" data-bs-toggle="modal"
                                    data-bs-target="#spintModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em"
                                        viewBox="0 0 20 20">
                                        <path fill="currentColor"
                                            d="M10 6.5a3 3 0 1 0 0 6h6.44l-.72-.72a.75.75 0 1 1 1.06-1.06l2 2a.75.75 0 0 1 0 1.06l-2 2a.75.75 0 1 1-1.06-1.06l.72-.72H10a4.5 4.5 0 1 1 4.032-2.5h-1.796A3 3 0 0 0 10 6.5m-7.25 6h2.64A5.5 5.5 0 0 0 6.836 14H2.75a.75.75 0 0 1 0-1.5" />
                                    </svg>
                                    <span class="">
                                        Ajouter une sprint
                                    </span>
                                </button>

                                @if ($project->owner_id === auth()->id())
                                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                                        data-bs-target="#memberModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none" fill-rule="evenodd">
                                                <path
                                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor"
                                                    d="M16 14a5 5 0 0 1 5 5v2a1 1 0 1 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 1 1-2 0v-2a5 5 0 0 1 5-5zm4-6a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1V9a1 1 0 0 1 1-1m-8-6a5 5 0 1 1 0 10a5 5 0 0 1 0-10m0 2a3 3 0 1 0 0 6a3 3 0 0 0 0-6" />
                                            </g>
                                        </svg>
                                        <span class="">
                                            Ajouter un membre
                                        </span>
                                    </button>

                                    <div class="modal fade" id="memberModal" tabindex="-1"
                                        aria-labelledby="memberModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="memberModalLabel">
                                                        Ajouter un membre au projet <u>{{ $project->title }}</u>
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                {{ html()->form('POST', route('projects.members.store', $project))->open() }}
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        {{ html()->email('email')->class('form-control')->placeholder(__('label.email')) }}
                                                        <label for="email">Email</label>
                                                    </div>
                                                    {{-- <div class="form-floating mb-3">
                                                    {{ html()->select('role', ['admin' => 'Admin', 'member' => 'Membre'])->class('form-control') }}
                                                    <label for="role">Role</label>
                                                </div> --}}
                                                </div>
                                                <div class="modal-footer">
                                                    {{ html()->submit('Ajouter un membre')->class('btn btn-primary') }}

                                                </div>
                                                {{ html()->form()->close() }}
                                            </div>
                                        </div>
                                    </div>



                                    @can('update', $project)
                                        {{ html()->form('DELETE', route('projects.destroy', $project))->open() }}
                                        {{ html()->submit('Supprimer le projet')->class('btn btn-link text-danger')->attribute('onclick', 'return confirm("Voulez-vous vraiment supprimer ce projet ?")') }}
                                        {{ html()->form()->close() }}
                                    @endcan
                                @endif
                            </div>
                            <!-- /.d-flex -->
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
                                                            {{ html()->number('duration')->class('form-control')->placeholder(__('label.duration'))->attribute('min', 1) }}
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

                                                <?php
                                                $empty = ['' => '-- Aucune sprint parent'];
                                                $options = $project->sprints->pluck('title', 'id');
                                                $options = $empty + $options->toArray();
                                                ?>
                                                <div class="form-floating mb-3">
                                                    {{ html()->select(
                                                            'parent_id',
                                                    
                                                            $options,
                                                        )->class('form-control') }}
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
