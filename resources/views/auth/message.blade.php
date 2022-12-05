@extends ('layout')

@section ('title')

Сообщение

@endsection

@section ('content')
<h1>
    @if($message=='register_done')
    Регистрация прошла успешно!
    @elseif($message=='register_done_but_auth_error')
    Регистрация прошла успешно, но войти не удалось!
    @elseif($message=='auth_error')
    Неверный логин и/или пароль
    @elseif($message=='access_denied')
    Нет прав
    @elseif($message=='auth_reset_password')
        Установите пароль для безопасности!
    @elseif($message=='profile_updated')
        Профиль успешно обновлен!
    @elseif($message=='profile_blocked')
        Ваш аккаунт заблокирован!
    @else
    ???
    @endif
</h1>
@endsection


