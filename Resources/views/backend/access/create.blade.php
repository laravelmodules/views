@extends ('views::backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.access.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('views::backend.access.includes.partials.user-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.backend.access.users.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.backend.access.users.password'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('validation.attributes.backend.access.users.password_confirmation'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('status', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('confirmed', trans('validation.attributes.backend.access.users.confirmed'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('confirmed', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.send_confirmation_email') }}<br/>
                        <small>{{ trans('strings.backend.access.users.if_confirmed_off') }}</small>
                    </label>

                    <div class="col-lg-1">
                        {{ Form::checkbox('confirmation_email', '1') }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-3">
                        @include('views::backend.access.includes.partials.assign_roles_create')
                    </div><!--col-lg-3-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
