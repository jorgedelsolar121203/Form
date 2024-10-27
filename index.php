<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro UNMSM</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function mostrarEscuelas() {
            const facultadSelect = document.querySelector("select[name='facultad']");
            const escuelaSelect = document.querySelector("select[name='escuela']");
            const facultadSeleccionada = facultadSelect.value;

            escuelaSelect.innerHTML = "";

            let escuelas = [];

            if (facultadSeleccionada === "ingenieria") {
                escuelas = [
                    "Ingeniería de SistemasBBBB",
                    "Ingeniería de Software"
                ];
            } else if (facultadSeleccionada === "medicina") {
                escuelas = [
                    "Enfermería",
                    "Medicina Humana",
                    "Tecnología Médica",
                    "Obstetricia",
                    "Nutrición"
                ];
            } else if (facultadSeleccionada === "psicologia") {
                escuelas = [
                    "Psicología",
                    "Psicología Organizacional y de la Gestión Humana"
                ];
            }

            escuelas.forEach(function(escuela) {
                const option = document.createElement("option");
                option.value = escuela;
                option.textContent = escuela;
                escuelaSelect.appendChild(option);
            });
        }

        function resetFormulario() {
            const escuelaSelect = document.querySelector("select[name='escuela']");
            escuelaSelect.innerHTML = "<option value='' disabled selected>Seleccione su escuela...</option>";
        }

        async function registrarUsuario(event) {
            event.preventDefault();  // Evita que el formulario se envíe de forma predeterminada

            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch("registrar.php", {
                    method: "POST",
                    body: formData
                });

                const result = await response.text();
                alert(result);  // Muestra el resultado (o úsalo como prefieras)
            } catch (error) {
                console.error("Error en el registro:", error);
            }
        }
    </script>
</head>
<body>
    <form method="post" action="registrar.php" onreset="resetFormulario()">

        <h2>Registro UNMSM</h2>
        <P>Completar para continuar...</P>

        <div class="input-wrapper">
            <input type="number" name="dni" placeholder="Ingrese su DNI..." required>
            <img class="input-icon" src="paginaWeb/dni.png" alt="">
        </div>

        <div class="input-wrapper">
            <input type="number" name="codigo" placeholder="Ingrese su código de estudiante..." required>
            <img class="input-icon" src="paginaWeb/codigo.png" alt="">
        </div>

        <div class="input-wrapper">
            <input type="text" name="nombres" placeholder="Ingrese sus nombres..." required>
            <img class="input-icon" src="paginaWeb/nombres.png" alt="">
        </div>

        <div class="input-wrapper">
            <input type="text" name="apellidos" placeholder="Ingrese sus apellidos..." required>
            <img class="input-icon" src="paginaWeb/apellidos.png" alt="">
        </div>

        <div class="input-wrapper">
            <select name="genero" required>
                <option value="" disabled selected>Seleccione su género...</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
            <img class="input-icon" src="paginaWeb/genero.png" alt="">
        </div>

        <div class="input-wrapper">
            <input type="number" name="telefono" placeholder="Ingrese su número de teléfono o celular..." required>
            <img class="input-icon" src="paginaWeb/telefono.png" alt="">
        </div>

        <div class="input-wrapper">
            <select name="facultad" onchange="mostrarEscuelas()" required>
                <option value="" disabled selected>Seleccione su facultad...</option>
                <option value="ingenieria">Ingeniería de Sistemas e Infomática</option>
                <option value="medicina">Medicina Humana</option>
                <option value="psicologia">Psicología</option>
            </select>
            <img class="input-icon" src="paginaWeb/facultad.png" alt="">
        </div>

        <div class="input-wrapper">
            <select name="escuela" required>
                <option value="" disabled selected>Seleccione su escuela...</option>
                <!-- no hay nada al comienzo -->
            </select>
            <img class="input-icon" src="paginaWeb/escuela.png" alt="">
        </div>

        <div class="input-wrapper">
            <input type="email" name="email" placeholder="Ingrese su correo institucional..." required>
            <img class="input-icon" src="paginaWeb/correo.png" alt="">
        </div>

        <div class="input-wrapper">
            <input type="password" name="password" placeholder="Ingrese su contraseña..." required>
            <img class="input-icon" src="paginaWeb/contrasenia.png" alt="">
        </div>

        <div class="input-wrapper">
            <button type="submit">Registrar</button>
            <button type="reset">Limpiar</button>
        </div>

    </form>

</body>
</html>