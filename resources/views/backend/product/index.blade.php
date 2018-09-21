@extends('backend.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="javascript:void(0)">{{ __('product') }}</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:void(0)">{{ __('all_products') }}</a>
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
                                {{ __("all_products") }}
                            </div>
                            <div class="actions">
                                <a href="{{ route('product.create') }}" id="sample_editable_1_new" class="btn green">
                                    <i class="fa fa-plus"></i>
                                    {{ __('add_new') }}
                                </a>
                                <a href="{{ route('product.trash') }}" class="btn green">
                                    <i class="fa fa-trash-o"></i>
                                    {{ __('trash') }}
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('thumbnail') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('price') }}</th>
                                    <th>{{ __('sale') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th>{{ __('brand') }}</th>
                                    <th>{{ __('feature') }}</th>
                                    <th>{{ __('time') }}</th>
                                    <th>{{ __('action_by') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="fashion-fix-image-product">

                                            {!! Html::image(
                                                $product->thumbnail,
                                                $product->name,
                                                ['class' => 'img-responsive']
                                            ) !!}

                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }} đ</td>
                                        <td class="text-center">{{ $product->sale }} %</td>
                                        <td>
                                            <span class="hide">{{ __($product->status) }}</span>

                                            {!! Form::select(
                                                'status',
                                                [
                                                    'published' => __('published'),
                                                    'not_published' => __('not_published')
                                                ],
                                                $product->status,
                                                [
                                                    'class' => 'form-control bs-select fashion-change-status',
                                                    'data-url' => route('api.product.update', $product->id),
                                                    'data-message' => __('update_success')
                                                ]
                                            ) !!}

                                        </td>
                                        <td>
                                            <span class="hide">{{ $product->brand_id }}</span>

                                            {!! Form::select(
                                                'brand_id',
                                                $brands,
                                                $product->brand_id,
                                                [
                                                    'class' => 'form-control select2me fashion-change-brand',
                                                    'data-url' => route('api.product.update', $product->id),
                                                    'data-message' => __('update_success')
                                                ]
                                            ) !!}

                                        </td>
                                        <td class="text-center">
                                            <span class="hide">{{ $product->feature }}</span>
                                            <i class="fa fix-feature fashion-change-feature {{ $product->feature ? 'fa-star feature-color' : 'fa-star-o' }}"
                                               data-feature="{{ $product->feature }}"
                                               data-url="{{ route('api.product.update', $product->id) }}"
                                               data-message="{{ __('update_success') }}">
                                            </i>
                                        </td>
                                        <td class="fashion-time">{{ $product->updated_at }}</td>
                                        <td class="fashion-user">{{ $product->user->name }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn default btn-xs purple">
                                                <i class="fa fa-edit"></i>
                                                {{ __('edit_item') }}
                                            </a>
                                            <span data-url="{{ route('api.product.soft_delete', $product->id) }}"
                                                  data-message="{{ __('delete_success') }}"
                                                  class="btn default btn-xs black fashion-soft-delete-item"
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
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Data Ajax -->
                            <div class="hide fashion-ajax" data-user-id="{{ Auth::user()->id }}"></div>
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
            ComponentsDropdowns.init();
        });
    </script>
@endsection
