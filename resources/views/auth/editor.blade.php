@extends ('layout')

@section ('title')

    Страничка редактора

@endsection

@section ('content')

    <body>
    <h2 align="center">Редактирование пользователей</h2>
    <div class="content">
        <div>
            <table>
                <tr>
                    <td>
                        Логин
                    </td>
                    <td>
                        Группа
                    </td>
                    <td>
                        Пароль
                    </td>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->login}}
                        </td>
                        <td>
                            {{$user->permission->group_name}}
                        </td>
                        <td>
                            {{$user->password}}
                        </td>
                        <td>
                            <a href="{{route('auth.user.update',$user->id)}}">
                                <button class="btn-editor edit">Изменить</button>
                            </a>
                        </td>
                        <td>
                            @method('DELETE')
                            <a href="{{route('auth.user.destroy',$user->id)}}">
                                <button class="btn-editor delete">Удалить</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('auth.user.reset',$user->id)}}">
                                <button class="btn-editor reset">Сбросить пароль</button>
                            </a>
                        </td>
                        <td>
                            @if ($user->status!='ban')
                            <a href="{{route('auth.user.block',$user->id)}}">
                                <button class="btn-editor block">Заблокировать</button>
                            </a>
                            @else
                                <a href="{{route('auth.user.unblock',$user->id)}}">
                                    <button class="btn-editor unblock">Разблокировать</button>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="btns-add">
            <a href="{{route('auth.user.create')}}">
                <button class="btn-add">Добавить пользователя</button>
            </a>
            <a href="{{route('auth.group.create')}}">
                <button class="btn-add">Добавить группу</button>
            </a>
        </div>
    </div>
    </body>
@endsection
