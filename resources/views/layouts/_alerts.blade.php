 @if (session('error'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Holy guacamole!</strong> You should check in on some of those fields below.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif

 @if ($errors->any())
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <span class="fw-bold">{{ __('label.error') }}</span>
         <ul class="">
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif

 @if (session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         <span class="fw-bold">{{ session('success') }}</span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif
