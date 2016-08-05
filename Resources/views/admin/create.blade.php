@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('ecommerce::products.title.create product') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.ecommerce.product.index') }}">{{ trans('ecommerce::products.title.products') }}</a></li>
        <li class="active">{{ trans('ecommerce::products.title.create product') }}</li>
    </ol>
@stop

@section('styles')
    <style>
        .checkbox label {
            padding-left: 0;
        }
    </style>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.ecommerce.product.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-8">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers', ['fields' => ['title', 'body']])
                <div class="tab-content">
                    <?php $i = 0; ?>
                    <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                    <?php ++$i; ?>
                    <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                        @include('ecommerce::admin.partials.create-fields', ['lang' => $locale])
                    </div>
                    <?php endforeach; ?>
                    <?php if (config('asgard.ecommerce.config.partials.normal.create') !== []): ?>
                        <?php foreach (config('asgard.ecommerce.config.partials.normal.create') as $partial): ?>
                            @include($partial)
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.ecommerce.product.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
        <div class="col-md-4">

            <div class="box box-primary">
                <div class="box-body">

                    @tags('asgardcms/ecommerce')
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('ecommerce::products.navigation.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script>
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.ecommerce.product.index') ?>" }
                ]
            });
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
