@extends ('layout')

@section('title')
Регистрация завершена!
@endsection

@section('content')
Уважаемый, {{ Request::get('name') }}, благодарим за регистрацию!
Мы показали - как мы можем отправлять письма нашим пользователям.
