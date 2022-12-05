@extends ('layout')

@section ('title')

    Редактирование

@endsection

@section ('content')

    <body>
    <h2 align="center">Редактирование</h2>
    <form method="POST" action="{{route('auth.user.update.do',$user['id'])}}">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>
                    <label for="">Имя</label>
                </td>
                <td>
                    <label for="">Логин</label>

                </td>
                <td>
                    <label for="">Должность</label>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" class="input-edit" value="{{$user['name']}}" readonly>
                </td>
                <td>
                    <input type="text" class="input-edit" value="{{$user['login']}}" readonly>
                </td>
                <td>
                    <select name="group_id" value="{{$user['group_id']}}">
                        @foreach($permissions as $permission)
                            <option value="{{$permission->id}}">{{$permission->group_name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <button type="submit" class="btn-submit">Сохранить</button>
                </td>
            </tr>
        </table>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
    </form>
    </body>
@endsection
