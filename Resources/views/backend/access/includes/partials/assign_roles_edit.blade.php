@permission('manage-roles')
    @if (count($roles) > 0)
        @foreach($roles as $role)
            <input type="checkbox" value="{{$role->id}}" name="assignees_roles[{{ $role->id }}]" {{ is_array(old('assignees_roles')) ? (in_array($role->id, old('assignees_roles')) ? 'checked' : '') : (in_array($role->id, $user_roles) ? 'checked' : '') }} id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{{ $role->name }}</label>
            <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                (
                <span class="show-text">{{ trans('labels.general.show') }}</span>
                <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                {{ trans('labels.backend.access.users.permissions') }}
                )
            </a>
            <br/>
            <div class="permission-list hidden" data-role="role_{{$role->id}}">
                @if ($role->all)
                    {{ trans('labels.backend.access.users.all_permissions') }}<br/><br/>
                @else
                    @if (count($role->permissions) > 0)
                        <blockquote class="small">{{--
                            --}}@foreach ($role->permissions as $perm){{--
                            --}}{{$perm->display_name}}<br/>
                        @endforeach
                    </blockquote>
                    @else
                        {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                    @endif
                @endif
        </div><!--permission list-->
    @endforeach
    @else
        {{ trans('labels.backend.access.users.no_roles') }}
    @endif
@else
    @php
        $role = $roles->where('id',3)->first();
    @endphp
    <input type="checkbox" value="{{$role->id}}" name="assignees_roles[{{ $role->id }}]" {{ is_array(old('assignees_roles')) ? (in_array($role->id, old('assignees_roles')) ? 'checked' : '') : (in_array($role->id, $user_roles) ? 'checked' : '') }} id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{{ $role->name }}</label>
    <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
        (
        <span class="show-text">{{ trans('labels.general.show') }}</span>
        <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
        {{ trans('labels.backend.access.users.permissions') }}
        )
    </a>
    <br/>
    <div class="permission-list hidden" data-role="role_{{$role->id}}">
        @if ($role->all)
            {{ trans('labels.backend.access.users.all_permissions') }}<br/><br/>
        @else
            @if (count($role->permissions) > 0)
                <blockquote class="small">{{--
                    --}}@foreach ($role->permissions as $perm){{--
                    --}}{{$perm->display_name}}<br/>
                @endforeach
            </blockquote>
            @else
                {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
            @endif
        @endif
@endauth
