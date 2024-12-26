@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Assign Users to Folder: {{ $folder->name }}</h4>

                    <!-- Available Users -->
                    <h5>Available Users</h5>
                    <form method="POST" action="{{ route('folder.assign.users', $folder->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="users">Select Users to Assign</label>
                            <select name="users[]" id="users" class="form-control" multiple>
                               @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ in_array($user->id, $assignedUsers->pluck('id')->toArray()) ? 'disabled' : '' }}>
                                        {{ $user->employee_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Assign Users</button>
                    </form>

                    <hr>

                    <!-- Assigned Users -->
                    <h5>Assigned Users</h5>
                    <ul>
                        @foreach($assignedUsers as $user)
                            <li>
                                {{ $user->employee_name }}
                                <form method="POST" action="{{ route('folder.remove.assignment', [$folder->id, $user->id]) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
