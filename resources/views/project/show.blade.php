
    @extends('layouts.app')

    @section('content')
  <div class="container">
    <div class="row">
        <div class="col-8">


                 <h1>
        Project title: {{ $project->title }}
       
       </h1>

         <p>
          Project description: {{ $project->description }}
            </p>
            
        </div>
        <!-- /.col-8 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
    @endsection

