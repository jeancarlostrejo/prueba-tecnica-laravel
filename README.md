#  CORREOS S.A. - Prueba Técnica Desarrollador FullStack

Este documento describe los requisitos para una aplicación web para "CORREOS S.A." que permitirá administrar la información de sus usuarios y el envío de correos electrónicos.

---

## Requerimientos Generales

-   **Código Legible:** Escribir código legible.
-   **Comentarios en el Código:** Realizar comentarios en el código.
-   **Migraciones y Seeders:** Realizar migraciones y seeders.
-   **Relaciones en Modelos Laravel:** Todas las relaciones del diseño de la base de datos deben verse reflejadas en los modelos de Laravel.

---

## Requerimientos Técnicos

-   **Tecnología:** La empresa desea que su software sea desarrollado con el lenguaje de programación PHP haciendo uso de su framework Laravel.
-   **Restricciones de Herramientas:** No se permite el uso de Laravel Jetstream, Livewire o Inertia.js.
-   **Control de Versiones:** El código debe ser versionado mediante una plataforma git pública.

---

## Requerimientos Funcionales

### Administración

-   **Administrador Seeder:** Los datos del usuario administrador del sistema deben ser ingresados mediante un seeder.
-   **Panel de Administrador:** Cuando el administrador se haya logueado, puede ver sus datos y la opción de cerrar sesión.

### Autenticación

-   **Acceso de Usuarios:** Se debe permitir el acceso a los usuarios de la empresa por medio de email y una contraseña, con base en la autenticación que ofrece Laravel.
-   **Panel de Usuario:** Una vez logueado, el usuario puede ver sus datos y la opción de cerrar sesión.
-   **Validaciones de Inicio de Sesión:** Se solicita que se realicen las validaciones correspondientes de los campos de inicio de sesión por seguridad de la aplicación.

### Módulo de Usuarios

-   **Visibilidad:** Este módulo será visible solo para el administrador del sistema.

#### Ingreso de Usuarios (Solo Administrador)

Para el formulario de registro de usuarios se necesitan los siguientes campos con sus respectivas validaciones y mensajes de error:

-   **Identificador:** Dato obligatorio, numérico.
-   **Email:** Dato obligatorio, debe ser único, se debe verificar que el email ingresado sea válido.
-   **Contraseña:** Dato obligatorio, mínimo de 8 caracteres, debe contener al menos un número, una letra mayúscula, un carácter especial.
-   **Verificación de Contraseña:** El usuario debe verificar su contraseña.
-   **Nombre:** Dato obligatorio, longitud de 100 caracteres.
-   **Número Celular:** Dato opcional de 10 dígitos.
-   **Cédula:** Dato de tipo texto, obligatorio con longitud máxima de 11 caracteres.
-   **Fecha de Nacimiento:** Dato obligatorio, el usuario no puede ser menor de 18 años.
-   **Código de Ciudad:** Dato obligatorio de tipo numérico.
-   **Selección de Ubicación:** El formulario debe considerar tres campos de tipo select o autocompletado (anidados), destinados a la selección de país, estado y ciudad. Estos campos deben cargarse en ese orden mediante una petición ajax, la ciudad seleccionada será relacionada al usuario.
-   **Encriptación de Contraseña:** Cuando el formulario sea llenado de forma exitosa, el sistema debe guardar la contraseña del usuario de forma encriptada.

#### Visualización de Datos (Listado de Usuarios)

Para visualizar los datos de los usuarios de forma ágil, se requiere la realización de una interfaz que contenga una tabla de datos o DataTable, debe contener una sección de filtros y paginación bajo el siguiente detalle:

-   **Filtro General:** Se solicita un filtro general (campo de texto) que busque por nombre, cédula, email, celular.
-   **Ordenamiento por Columnas:** La tabla de datos debe ordenarse por columnas.
-   **Campos Mostrados:** La tabla de datos debe mostrar todos los campos de los usuarios excepto el password.
-   **Columna de Edad:** La tabla de datos debe visualizar una columna de edad, aunque no se guarde en base de datos.
-   **Paginación del Lado del Servidor:** La tabla de datos debe tener una paginación del lado del servidor (server side) y debe ser configurable la cantidad de registros por página.

#### Actualización y Eliminación de Usuarios (Solo Administrador)

-   **Edición/Eliminación:** Desde la interfaz de visualización de datos el administrador debe ser capaz de editar su información o eliminar un registro de ser pertinente.
-   **Restricción de Edición:** Cuando se realice la edición de información se solicita la siguiente restricción: no se debe permitir cambiar la cédula ni el email del usuario.

### Módulo de Emails

-   **Visibilidad:** Este módulo será visible solo para los usuarios del sistema.
-   **Formulario de Creación de Email:** Solo los usuarios autenticados podrán acceder al formulario de creación de email. Este formulario debe solicitar datos como asunto, destinatario y cuerpo del mensaje.
-   **Cola de Emails:** Una vez ingresado los datos y procesado el formulario, el email creado estará relacionado con el usuario autenticado y será enviado en secuencia mediante una cola de emails.
-   **Estados del Email:** El email tendrá dos estados: "no enviado" mientras se mantenga en la cola de envío y "enviado" cuando ha sido procesado.
-   **Procesamiento de la Cola:** El procesamiento de la cola de emails se realizará mediante la ejecución de un comando artisan.
-   **Visualización de Emails (Usuario):** Los usuarios podrán ver sus emails con su estado, se recomienda la creación de una interfaz con una tabla de datos "data table".
-   **Visualización de Emails (Administrador):** El usuario administrador podrá visualizar todos los emails.

---

## Opcional

-   **Sistema de Logs:** Por motivos de seguridad de la información, la empresa deja abierta la posibilidad de implementar un sistema de logs para revisar los cambios históricos de los registros de usuarios y envío de emails.

---

## Consideraciones Finales

-   **Prioridad:** Dar prioridad a la parte funcional en lugar de la visual.
-   **Repositorio Git Público:** Crear y subir los archivos del proyecto en un repositorio en GIT público.
-   **Plazo:** Una vez recibida esta prueba tiene 24 horas para realizarla.

Esta prueba tiene como objetivo verificar sus habilidades y mejores prácticas de desarrollo de software.

---
## PASOS PARA EJECUTAR LA APLICACIÓN
Se utilizó **Laravel en su versión 12**

1. Descarga o clona el proyecto
2. Ejecuta el comando **`composer install`**
3. Ejecuta el comando **`npm install`**
4. Copia en archivo **.env.example** y renombralo a **.env**
5. Edita las variables de entorno para la conexión a la base de datos
6. Ejecuta el comando **`php artisan key:generate`**
7. Ejecuta el comando **`php artisan migrate:fresh --seed`**
8. Ejecuta en una nueva terminal **`npm run dev`**
9. Ejecuta en una nueva terminal **`php artisan serve`**
10. Ejecuta en una nueva terminal **`php artisan queue:work --queue=emails`**
11. Visita la url [http://127.0.0.1:8000](http://127.0.0.1:8000)

### Información de la aplicación
Datos del usuario administrador:
- Correo: admin@test.com
- Contraseña: password

Comando para procesar los correos:
* Ejecutar en una nueva terminal el comando `php artisan emails:process`
