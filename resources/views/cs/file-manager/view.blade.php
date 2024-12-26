@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
<style>
.page-body-wrapper {
    padding-top: 59px !important;
}
.container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl {
    padding-right: 0px !important; 
    padding-left: 0px !important;
}
.btn-outline-primary {
    color: #2659c6;
    border-color: #2659c6;
}
.btn-outline-primary:hover {
    color: #fff;
    background-color: #2659c6;
    border-color: #2659c6;
}

.custom-breadcrumb {
    background-color: #f8f9fa;
    border-radius: 0.25rem;
    padding: 10px 15px;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.custom-breadcrumb .breadcrumb {
    margin-bottom: 0;
    background-color: transparent;
}

.custom-breadcrumb .breadcrumb-item a {
    text-decoration: none;
    color: #007bff; /* Folder link color */
    font-weight: 500;
}

.custom-breadcrumb .breadcrumb-item a:hover {
    color: #0056b3; /* Darker blue for hover effect */
    text-decoration: underline;
}

.custom-breadcrumb .breadcrumb-item.active {
    color: #28a745; /* Green for the active folder */
    font-weight: 600;
}


.custom-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: '>';
    color: #6c757d; /* Separator color */
    font-weight: bold;
    margin-right: 0.5rem;
}

</style>
<!-- page content -->
<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <div class="row" style="margin-bottom: 20px;">
                   <div class="col-md-8">
                       <h4 class="card-title">{{ @$title }}</h4>
                   </div>
                   <div class="col-md-4 d-flex justify-content-end">
                        
                   </div>
                   <div class="col-md-8">
                   <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createFolderModal">
                        Create Folder
                    </button> -->
                   </div>
               </div>
              
                <nav aria-label="breadcrumb" class="custom-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="bi bi-folder-fill text-success"></i> {{ $title ?? 'Current Folder' }}
                        </li>
                    </ol>
                </nav>
           
                <div class="row">
               @foreach($folders as $folder)                   
                        <div class="col-md-3">
                        <a href="{{ route('emp.file-manager.view', [
                            'folders' => $folder->name,
                            'id' => $folder->id
                        ]) }}">
                            <img src="{{ asset('public/data/folder/folder.png') }}" alt="Folder Icon" width="30" height="30">
                            {{ $folder->name }}
                        </a>   
                        </div>                     
                    
                @endforeach
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /page content -->

 <!--Create Folder Modal -->
<div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="createFolderModalLabel">Create Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="createFolderForm" action="{{ route('emp.file-manager.storeFolder') }}" method="POST">
                    @csrf
                    <!-- Folder Name -->
                    <div class="mb-3">
                        <label for="folderName" class="form-label">Folder Name:</label>
                        <input type="text" id="folderName" name="name" class="form-control" required>
                    </div>

                    <!-- Employee Dropdown -->
                    <div class="mb-3">
                        <label for="assignedTo" class="form-label">Assign to Employee:</label>
                        <select id="assignedTo" name="assigned_to" class="form-select">
                            <option value="">-- Select Employee --</option>
                            @foreach ($employees as $user)
                                <option value="{{ $user->id }}">{{ $user->employee_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="createFolderForm" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
@section('script')
<script>
    new DataTable('#employee_datatable');
</script>
@endsection