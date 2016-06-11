@extends('layouts.dashboard')

@section('content')
    <div class="content-panel">
        @if(isset($sub_menu))
        @include('dashboard.partials.sub-sidebar')
        @endif
        <div class="content-wrapper">
            <div class="header sub-header">
                <span class="uppercase">
                    <i class="ion ion-ios-information-outline"></i> {{ trans('dashboard.advertisements.advertisements') }}
                </span>
                <a class="btn btn-sm btn-success pull-right" href="{{ route('dashboard.advertisement.create') }}">
                    {{ trans('dashboard.advertisements.add.title') }}
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @include('partials.errors')
                    <div class="striped-list">
                        @foreach($advertisements as $advertisement)
                        <div class="row striped-list-item">
                            <div class="col-xs-9">
                                <i class="{{ $advertisement->icon }}"></i> {{ $advertisement->id }}. {{ $advertisement->name }}
                                @if($advertisement->adspace)
                                <p><small>({{ $advertisement->adspace->name }})</small></p>
                                @endif
                            </div>
                            <div class="col-xs-3 text-right">
                                <a href="/dashboard/advertisement/{{ $advertisement->id }}/edit" class="btn btn-default">{{ trans('forms.edit') }}</a>
                                <a href="/dashboard/advertisement/{{ $advertisement->id }}/delete" class="btn btn-danger confirm-action" data-method='delete'>{{ trans('forms.delete') }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                     <div class="text-right">
                    <!-- Pager -->
                    {!! $advertisements->appends(Request::except('page', '_pjax'))->render() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@stop