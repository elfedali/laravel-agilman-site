{{--
    @extends('layouts.app')

    @section('content')
        project.index template
    @endsection
--}}

    @extends('layouts.app')

    @section('content')
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <p>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">Ajouter un projet</a>
                    </p>
                </div>
                <!-- /.col-lg-6 mx-auto -->


                {{-- for each project  --}}
                @foreach ($projects as $project)
                    <div class="col-lg-6 mx-auto">
                        <div class="card my-5">
                            <div class="card-header">
                                <h2>{{ $project->title }}</h2>
                            </div>
                            <div class="card-body">
                                <p>{{ $project->description }}</p>
                                <p>
                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">Voir le projet</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-6 mx-auto -->
                @endforeach
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->


    @endsection



