<!DOCTYPE html>
<html>
<head>
    <title>{{ __('email') }}</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table td, th {
            padding: 10px;
            border: 1px solid rgb(233, 77, 28);
            text-align: center;
        }
    </style>
</head>
<body>
<div>
    <h3>{{ __('you_have_successfully_ordered') }}</h3>
    <h3>{{ __('customer_information') }}</h3>
    <p>{{ __('customer_name') }} : {{ $data->name }}</p>
    <p>{{ __('email') }} : {{ $data->email }}</p>
    <p>{{ __('phone') }} : {{ $data->phone }}</p>
    <p>{{ __('address') }} : {{ $data->address }}</p>
    <h3>{{ __('line_item') }}</h3>
    <table>
        <thead>
        <tr>
            <th>{{ __('name') }}</th>
            <th>{{ __('quantity') }}</th>
            <th>{{ __('price') }}</th>
            <th>{{ __('into_money') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Cart::content() as $cart)
            <tr>
                <td>{{ $cart->name }}</td>
                <td>{{ $cart->qty }}</td>
                <td>{{ number_format($cart->price) }}đ</td>
                <td>{{ number_format($cart->subtotal) }}đ</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">{{ __('total_price') }}</td>
            <td>{{ Cart::subtotal(0) }}đ</td>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>