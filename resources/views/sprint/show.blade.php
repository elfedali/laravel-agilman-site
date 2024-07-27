@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-4">
                    Project <b>
                        <a href="{{ route('projects.show', $sprint->project) }}">{{ $sprint->project->title }}</a>
                    </b>
                    > Sprint <b>{{ $sprint->title }}</b>
                </div>

                <hr>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter une tâche
                </button>

                {{-- list of tasks of sprint --}}
                <div class="mt-4">
                    <h2>
                        Tâches
                    </h2>

                    @foreach ($sprint->tasks as $task)
                        <div class="card my-4">
                            <div class="card-header">
                                <h3>
                                    {{ $task->title }}
                                </h3>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ $task->description }}
                                </p>
                                <p>
                                    <b>Start date:</b> {{ $task->start_date }}
                                </p>
                                <p>
                                    <b>End date:</b> {{ $task->end_date }}
                                </p>
                                <p>
                                    <b>Expected end date:</b> {{ $task->expected_end_date }}
                                </p>
                            </div>
                        </div>
                    @endforeach


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Ajouter une tâche
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- create new sprint for this project  --}}
                                    {{ html()->form('POST', route('tasks.store'))->open() }}

                                    {{ html()->hidden('sprint_id', $sprint->id) }}
                                    <div>
                                        le titre
                                        {{ html()->text('title')->placeholder('Title') }}
                                    </div>
                                    <div>
                                        la description
                                        {{ html()->textarea('description')->placeholder('Description') }}
                                    </div>
                                    {{-- start_date --}}
                                    <div>
                                        date de début
                                        {{ html()->date('start_date')->placeholder('Start date') }}
                                    </div>
                                    {{-- end_date --}}
                                    <div>
                                        Date de fin
                                        {{ html()->date('end_date')->placeholder('End date') }}
                                    </div>
                                    {{-- expected_end_date --}}
                                    <div>
                                        Date de fin prévue
                                        {{ html()->date('expected_end_date')->placeholder('Expected end date') }}
                                    </div>
                                    {{ html()->submit('Create sprint') }}
                                    {{ html()->form()->close() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
