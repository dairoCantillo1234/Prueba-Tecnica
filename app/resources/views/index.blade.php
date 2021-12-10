<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <br>
        <h1>Formulario de Contacto</h1><br><br>
        <form id="form1">
            <div class="form-group">
                <label for="fullname">Nombre Completo</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Juan Perez"
                    required>
                <div class="invalid-feedback" id="fullname-feedback"></div>
            </div>
            <div class="form-group">
                <label for="country">País</label>
                <select class="form-control" id="country" name="country">
                    <option select></option>
                </select>
                <div class="invalid-feedback" id="country-feedback"></div>
            </div>
            <div class="form-group">
                <label for="cellphone">Celular</label>
                <input type="tel" class="form-control" id="cellphone" name="cellphone" placeholder="3111234567"
                    required>
                <div class="invalid-feedback" id="cellphone-feedback"></div>
            </div>
            <div class="form-group">
                <label for="email">Dirección de Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                    required>
                <div class="invalid-feedback" id="email-feedback"></div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Guardar</button>
        </form>
        <!-- Content here -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        const getting = $.get('/api/countries');
        getting.done((data) => {
            // console.log('data', data);
            for(var key in data){
                // console.log('key:', key);
                const value = data[key];
                document.getElementById('country').appendChild(new Option(value, key));
            }

        });

        $("#form1").submit(function(event) {
            // console.log('submit');
            // Stop form from submitting normally
            event.preventDefault();

            // Get some values from elements on the page:
            var $form = $(this);

            var fullname = $form.find("#fullname").val();
            var country = $form.find("#country").val();
            var cellphone = $form.find("#cellphone").val();
            var email = $form.find("#email").val();

            // console.log('fullname', fullname);
            if (fullname.length < 5) {
                $form.find("#fullname").addClass('is-invalid');
                $form.find("#fullname-feedback").text('Nombre inválido, ingrese nombre completo');
            } else if (!fullname.match(/^[\w\s]+$/)) {
                $form.find("#fullname").addClass('is-invalid');
                $form.find("#fullname-feedback").text('Nombre inválido, no acepta caracteres especiales');
            } else {
                $form.find("#fullname").removeClass('is-invalid');
            }

            if (country == '') {
                $form.find("#country").addClass('is-invalid');
                $form.find("#country-feedback").text('Seleccione una opción');
            } else {
                $form.find("#country").removeClass('is-invalid');
            }

            if (cellphone.length !== 10 || !cellphone.startsWith('3')) {
                $form.find("#cellphone").addClass('is-invalid');
                $form.find("#cellphone-feedback").text('Teléfono inválido');
            } else {
                $form.find("#cellphone").removeClass('is-invalid');
            }

            $form.addClass('was-validated');


            // Send the data using post
            var posting = $.post('/api/contacts', {
                "fullname": fullname,
                "country": country,
                "cellphone": cellphone,
                "email": email,
            });

            // Put the results in a div
            posting.done(function(data) {
                alert('todo salió bien');
                var content = $(data).find("#content");
                $("#result").empty().append(content);
            });
        });
    </script>
</body>

</html>
