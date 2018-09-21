@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('comment') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('all_comments') }}</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @include('backend.layouts.alert-status')
                    <div class="portlet box green-haze">
                        <div class="portlet-title">
                            <div class="caption">
                                {{ __("all_comments") }}
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('content') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('comment_by') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $key => $comment)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $comment->body }}</td>
                                        <td class="fashion-time">{{ $comment->created_at }}</td>
                                        <td class="fashion-user">{{ $comment->user->name}}</td>
                                        <td>
                                            @if ($comment->commentable_type == App\Models\Post::class)
                                                <a href="{{ route('frontend.post.show', $comment->commentable->slug) }}" target="_blank" class="btn default btn-xs purple">
                                                    <i class="fa fa-edit"></i>
                                                    {{ __('show_detail') }}
                                                </a>
                                            @elseif ($comment->commentable_type == App\Models\Product::class)
                                                <a href="{{ route('frontend.product.show', $comment->commentable->slug) }}" target="_blank" class="btn default btn-xs purple">
                                                    <i class="fa fa-edit"></i>
                                                    {{ __('show_detail') }}
                                                </a>
                                            @endif
                                            <span class="btn default btn-xs black fashion-delete-item"
                                                  data-id="{{ $comment->id }}"
                                                  data-original-title="{{ __('are_you_sure') }}"
                                                  data-btn-ok-label="{{ __('yes') }}"
                                                  data-btn-cancel-label="{{ __('no') }}"
                                                  data-toggle="confirmation"
                                                  data-placement="left"
                                                  data-popout="true"
                                                  data-singleton="true"
                                                  data-btn-ok-class="btn-success"
                                                  data-btn-cancel-class="btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                                {{ __('delete') }}
                                            </span>
                                            <form id="delete-item-{{ $comment->id }}" action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="hide">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

@section('script')
    <script>
        jQuery(document).ready(function () {
            TableAdvanced.init();
        });
    </script>
@endsection
