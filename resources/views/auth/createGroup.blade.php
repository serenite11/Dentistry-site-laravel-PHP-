@extends ('layout')

@section ('title')

    Добавить группу

@endsection

@section ('content')

    <body>
    <h2 align="center">Добавление группы</h2>
    <div class="content create">
    <table >
    <p><b>Список групп:</b></p>
        <td>
    @foreach($permissions as $permission)
        <tr>
        <p>{{$permission->group_name}}</p>
        </tr>
    @endforeach
        </td>
    </table>
    <form method="POST" action="{{route('auth.group.create.do')}}">
        @csrf
        <table>
        <label for="">Название группы</label> <br>
        <input type="text" class="input-edit addgroup" name="group_name" id=""> <br>
        <button type="submit" class="btn-submit">Добавить</button>
        </table>
    </form>
        <a href="{{route('auth.editor')}}"><button class="btn-submit">Вернуться</button></a>
    </div>
    </body>
@endsection
