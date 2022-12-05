<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>

<body>
    <table class="sides" width="70%">
        <thead>
            <tr>
                <th><a href="{{ route('static_page','Main') }}"><img src="/images/logo.jpg" height="40px"></a></th>
                <th width="60%">
                    <h1>Жемчуг</h1>
                </th>
                <th  id="form-signin">
                    @auth
                    <span style="color:white">
                    Здравствуй {{auth()->user()->name}} <br>
                    <a href="{{route('auth.profile')}}">Профиль</a><br>
                    <a href="{{route('auth.logout')}}">Выход</a>
                    @havePermission('')
                    ТЫ ИЗБРАННЫЙ
                    @endif
                    </span>
                    @else
                    <form action="{{route('auth.login.do')}}" method="POST">
                        @csrf
                        <input class="inputs-main" type="text" id="input-main" name="login" required><br>
                        <input class="inputs-main" type="password" name="password" required><br>
                        <button id="button-main"  type="submit">Войти</button><a href="{{route('auth.register')}}">Регистрация</a>
                    </form>
                    @endauth
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                </th>
            </tr>
        </thead>
    </table>
    <table width="70%" class="vkladki">
        <tr>
            <td><a href="{{ route('static_page','Main') }}" >Основное</a></td>
            <td><a href="{{route('static_page','Doctors')}}" >Врачи</a></td>
            <td><a href="{{route('static_page','Services')}}" >Услуги</a></td>
            <td><a href="{{route('static_page','Contacts')}}"  >Контакты</a></td>

            @havePermission('admin')
            <td class="perm-users">
            <a href="{{route('auth.editor')}}" >Редактирование пользователей</a>
            </td>
            @endif
            @havePermission('redactor')
            <td class="perm-users">
            <a href="{{route('auth.editor')}}" >Редактирование пользователей</a>
            </td>
            @endif

        </tr>
    </table>
    <table cellpadding="10px" cellspacing="0" width="70%" class="main">
        <td valign="top" align="center" width="15%" class="colorback">
            <a href="{{route('static_page','Anesthesia-Care')}}" >Лечение под наркозом</a><br>
            <a href="{{route('static_page','Surgery')}}" >Хирургия</a><br>
            <a href="{{route('static_page','Children-Dentistry')}}" >Детская стоматология</a><br>
            <a href="{{route('static_page','Diseases')}}"  >Болезни</a><br>
            <a href="{{route('static_page','Feedback')}}" >Обратная связь</a><br>
        </td>
        <td valign="top">
            @yield('content')
        </td>
        <td width="15%" valign="top" align="center" class="colorback">
            <p><b>Поиск</b></p>
            <input type="text">
            <button>Искать</button><br><br>
            <p></p><a href="https://lays.ru/"><img src="/images/banner1.jpg" height="120px"></a><br>
            Чипсы Lays</p>
            <p><a href="https://www1.nyc.gov/"><img src="/images/banner2.jpg" height="100px"></a> <br>
                Добро пожаловать в NYC</p>
            <p>
                <a
                    href="https://videoplay.media/?etext=2202.rbSkOMy9r3PJrjX7okjf78lSS9mVDWLFfqD8hRpKiv8jWL76bv4q78ZP8XSjC9gTcWNod2t1b21lZm1laXlpcw.f2956432c3fae6e96059bd17b48d3c035a5f6c23&yclid=5773920266989130732"><img
                        src="/images/banner3.jpg" height="100px"></a><br>
                Место для рекламы
            </p>
        </td>
    </table>
    <hr width="100%">
    <footer align="center">Все права защищены</footer>
</body>

<script>
    function myfunction() {
        alert('Функция не реализована')
    }
</script>
