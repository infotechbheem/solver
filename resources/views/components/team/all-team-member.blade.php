@extends('layouts.app')
@section('main_container')
    @include('components.breadcrumb')
    <div class="ibox all-employee-section-mains">
        <div class="ibox-body">
            <div class="entry-section">
                {{-- <div class="show-entries">
                    <label for="show-entries">Show</label>
                    <select id="show-entries" class="form-control form-control-sm" style="width: auto; display: inline-block;">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <label for="show-entries">Entries</label>
                </div> --}}

                <!-- Search Bar -->
                <div class="search-bar">
                    <input type="text" id="search-input" class="form-control form-control-sm" placeholder="Search..."
                        style="width: 200px;">
                </div>
            </div>
            <div class="grant-table-scroll">
                <table class="all-employee-section-main table table-striped table-bordered table-hover" id="example-table"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr class="all-employee-section">
                            <th>SN.</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Type of Employment</th>
                            <th>Type of Position</th>
                            <th>Joining date</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $team->team_id }}</td>
                                <td>{{ $team->full_name }}</td>
                                <td>{{ $team->phone_number }}</td>
                                <td>{{ $team->email }}</td>
                                <td>{{ $team->employment_type }}</td>
                                <td>{{ $team->position_type }}</td>
                                <td>{{ $team->date_of_joining }}</td>
                                <td>{{ $team->ctc_amount }}</td>
                                <td>
                                    <a href="{{ url('/hr-department/team/team-member-details', encrypt($team->id)) }}">
                                        <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                    </a>
                                    <a href="{{ url('/hr-department/team/update-team-member', encrypt($team->id)) }}">
                                        <button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                    </a>
                                    <form action="{{ url('/hr-department/team/delete-team-member', $team->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-footer">
                <span id="showing-text-team">
                    Showing {{ $teams->firstItem() }} to {{ $teams->lastItem() }} of
                    {{ $teams->total() }}
                </span>
                <div class="pagination" id="pagination-teams">
                    {{ $teams->appends(request()->except('page'))->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
