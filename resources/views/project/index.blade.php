{{--
    @extends('layouts.app')

    @section('content')
        project.index template
    @endsection
--}}

@extends('layouts.app')

{{-- title --}}
@section('title', 'List des projets')


@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <h1>Liste des projets</h1>
                <p class="lead text-muted">
                    Vous pouvez consulter la liste des projets ci-dessous.
                </p>



                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewProjectModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z" />
                    </svg>
                    Créer un projet
                </button>

            </div>



            <section class="col-12">

                <!-- Modal -->
                <div class="modal fade" id="addNewProjectModal" tabindex="-1" aria-labelledby="addNewProjectModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addNewProjectModalLabel">
                                    Créer un nouveau projet
                                </h5>
                                <button type="button" class="btn brn-rounded close ms-auto" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z" />
                                    </svg>
                                </button>
                            </div>
                            {{ html()->form('POST', route('projects.store'))->open() }}
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    {{ html()->text('title')->class('form-control')->placeholder(__('label.title')) }}
                                    <label for="title">
                                        {{ __('label.title') }}
                                    </label>
                                </div>
                                <div class="form-floating mb-3">
                                    {{ html()->textarea('description')->class('form-control')->placeholder(__('label.description'))->rows(5)->style('height: 160px;') }}
                                    <label for="description">
                                        {{ __('label.description') }}
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{ html()->submit('Créer le projet')->class('btn btn-primary') }}
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </section>


            @if ($projects->isEmpty())
                <div class="col-12 text-center">
                    <div class="d-inline-block rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12em" height="12em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14 21q-.425 0-.712-.288T13 20t.288-.712T14 19h6q.425 0 .713.288T21 20t-.288.713T20 21zm3-3q-.425 0-.712-.288T16 17V8q0-.425-.288-.712T15 7h-4v3q0 .425-.288.713T10 11H4q-.55 0-.85-.45t-.075-.95L5.45 4.2q.25-.55.737-.875T7.275 3H9q.825 0 1.413.588T11 5h4q1.25 0 2.125.875T18 8v9q0 .425-.288.713T17 18" />
                        </svg>

                    </div>

                    <div>
                        <small>
                            <small>
                                Aucun projet n'a été créé pour le moment.
                            </small>
                        </small>
                    </div>
                </div>
                <!-- /.col-12 -->
            @else
                @foreach ($projects as $project)
                    <div class="col-lg-3 col-xl-3 col-md-4  mb-3 ">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('projects.show', $project) }}" class="text-decoration-none">
                                        {{ $project->title }}
                                    </a>

                                </h5>
                                {{-- humain date created --}}
                                <p class="card-text  mb-1">
                                    <small>
                                        <small>
                                            Créé le {{ $project->created_at->diffForHumans() }}
                                        </small>
                                    </small>
                                </p>

                                {{-- owner --}}
                                @if ($project->owner->is(auth()->user()))
                                    <p class="card-text text-muted">
                                        <small>
                                            <small>
                                                Vous êtes le propriétaire de ce projet
                                            </small>
                                        </small>
                                    </p>
                                @else
                                    <p class="card-text text-muted">
                                        <small>
                                            <small>
                                                Propriétaire: {{ $project->owner->name }}
                                            </small>
                                        </small>
                                    </p>
                                @endif



                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-6 mx-auto -->
                @endforeach
            @endif
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
