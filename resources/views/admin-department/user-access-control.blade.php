@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <style>
        .access-control-options {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .access-option {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .access-option input {
            margin-right: 10px;
        }

        .scr-form-group-btn {
            margin-top: 30px;
        }

        .scr-registration-form .scr-registration-heading {
            margin-top: 10px
        }


        .access-control-options-main {
            display: flex;
            justify-content: center;
        }

        .access-control-options-main .access-control-options {
            display: flex;
            align-items: center !important;
        }

        .access-option-dropdown {
            width: 220px;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .access-option-dropdown:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
            outline: none;
            background-color: #fff;
        }
    </style>

    @include('components.breadcrumb')

    <div class="scr-registration-section">
        <div class="containers p-0">
            <div class="csr-registration-main-heading">
                <p>Assign Access Control To User</p>
            </div>
            <form class="scr-registration-form" action="{{ route('assign-permission-to-role') }}" method="POST">
                @csrf

                <div class="access-control-options-main">
                    <div class="access-control-options">
                        <label for="user-type">User Type</label>
                        <select id="user-type" name="user_type" class="access-option-dropdown" required>
                            <option value="">Select a user type</option>
                            @foreach ($userTypeList as $userType)
                                <option value="{{ $userType->id }}">
                                    {{ ucwords(str_replace('_', ' ', $userType->name)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @php
                    // Group permissions by group_name
                    $groupedPermissions = $permissionList->groupBy('group_name');

                    // Optional: Format group_name to proper display format
                    function formatGroupName($groupName)
                    {
                        return ucwords(str_replace('_', ' ', $groupName));
                    }

                    // Optional: Format permission name
                    function formatPermissionName($name)
                    {
                        return ucwords(str_replace('_', ' ', $name));
                    }
                @endphp

                @foreach ($groupedPermissions as $group => $permissions)
                    <h3 class="scr-registration-heading">{{ formatGroupName($group) }}</h3>
                    <div class="access-control-options">
                        @foreach ($permissions as $permission)
                            <label class="access-option">
                                <input type="checkbox" id="{{ $permission->name }}" name="permissions[]"
                                    value="{{ $permission->id }}">
                                {{ formatPermissionName($permission->name) }}
                            </label>
                        @endforeach
                    </div>
                @endforeach

                <div class="scr-form-group-btn" style="justify-content: flex-start">
                    <button type="submit" class="scr-btn">Save Permission</button>
                </div>
            </form>
        </div>
    </div>
@endsection
