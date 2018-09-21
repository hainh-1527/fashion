@extends('frontend.layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home.main') }}">{{ __('home') }}</a></li>
                <li class="active">{{ __('search') }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12">
                    <div class="content-page">
                        {!! Form::open(['route' => 'frontend.home.search', 'method' => 'GET', 'class' => 'content-search-view2']) !!}

                        <div class="input-group">

                            {!! Form::text('q', isset($_GET['q']) ? $_GET['q'] : null, ['class' => 'form-control', 'placeholder' => __('search') . ' ...']) !!}

                            <span class="input-group-btn">

                                {!! Form::button(__('search'), ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

                            </span>
                        </div>

                        {!! Form::close() !!}
                        @foreach($results as $result)
                            <div class="search-result-item">
                                <h4><a href="{{ $result->get('link') }}">{{ $result->get('title') }}</a></h4>
                                <p>{!! $result->get('content') !!}</p>
                                <a class="search-link" href="{{ $result->get('link') }}">{{ $result->get('link') }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
    </div>
@stop
