@extends ('layout')

@section ('title')

Добавление

@endsection

@section ('content')

<head>
<link rel="stylesheet" href="/styles/registrationstyles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</head>

<body>
    <h2 align="center">Добавление</h2>
    <form action="{{route('auth.user.create.do')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <table align="center">
            <div class="avatar">
                <input type="file" name="pic" id="avatar" hidden />
                <div class="avatar-image">
                    <img src="/images/avatar.jpg" onclick="openFileInput()" height="100px" title="Изменить изображение">
                </div>
            </div>
            <tr>
                <td>
                    <label for="FirstNameid">Имя</label>
                </td>
                <td>
                    <input name="name" id="FirstNameid" type="text" required class="rounded-input" placeholder="Имя" value="Dolgan">
                    <span class="validity-icon"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Lastnameid">Фамилия</label>
                </td>
                <td>
                    <input name="surname" id="Lastnameid" type="text" required class="rounded-input" placeholder="Фамилия" value="Tseren-Ubushaev">
                    <span class="validity-icon"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="loginid">Логин</label>
                </td>
                <td>
                    <input id="loginid" name="login" type="text" required class="rounded-input" value="serenite" placeholder="login">
                    <span class="validity-icon"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="passwordid">Пароль</label>
                </td>
                <td>
                    <input name="password" id="passwordid" type="text" value="321" required class="rounded-input" placeholder="password">
                    <span class="validity-icon"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Emailid">E-mail</label>
                </td>
                <td>
                    <input name="email" id="Emailid" value="tserenubushaev.d@gmail.com" type="email" required class="rounded-input" placeholder="yourmail@">
                    <span class="validity-icon"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mobile-number">Телефон</label>
                </td>
                <td>
                    <input name="tel" id="mobile-number" value="1231231221" type="text" required class="rounded-input" placeholder="+7 (000)-000-00-00">
                    <span class="validity-icon"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dateid">Дата рождения</label>
                </td>
                <td>
                    <input name="date" id="dateid" type="text" value="22222222" required class="rounded-input" placeholder="00/00/0000">
                    <span class="validity-icon"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="city">Наш филиал</label>
                </td>
                <td>
                    <div class="input autocomplete">
                        <input type="text" name="city" value="Москва" id="city" class="rounded-input" required placeholder="Ваш город...">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="city">Должность</label>
                </td>
                <td>
                <select name="group_id" placeholder="Пользователь">
                    @foreach($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->group_name}}</option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input name="spam" id="check" type="checkbox" checked>
                    <label for="check">Добавить рассылку</label><br>
                    <button type="submit" class="btn-submit">Добавить</button>
                </td>
            </tr>
        </table>
    </form>
    <div style="color:red;">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <script>
        $('input[name="date"]').mask('00/00/0000');
        $('input[name="tel"]').mask('+7 (000)-000-00-00');
        $('input[name="postal-code"]').focusout(function() {
            $('input[name="postal-code"]').val(this.value.toUpperCase());
        });
        function openFileInput() {
            $("#avatar").click();
        }
        function checkPassword(form) {
            password1 = document.querySelector("input[name ='password']").value;
            password2 = document.querySelector("input[name ='passwordRewrite']").value;
            // If same return True.

            alert("Всё ок!")
        }
        const cities = [
            "Москва",
            "Санкт-Петербург",
            "Элиста",
            "Рига",
            "Подмосковье",
            "Волгоград",
        ];
        const perms = [
            "Пациент",
            "Стоматолог-терапевт",
            "Стоматолог-гигиенист",
            "Стоматолог-хирург",
            "Стоматолог-ортопед ",
            "Детский стоматолог",
        ];
        autocomplete(document.getElementById("city"), cities);
        autocomplete(document.getElementById("perm"), perms);
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
          the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) {
                    return false;
                }
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });
        }
    </script>
</body>
@endsection
