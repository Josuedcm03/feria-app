## Documento de Requerimientos

### 1. Actores

* **Administrador**
  * Gestiona ferias, emprendedores y vínculos.
  *  Consulta lista de ferias y detalles de participantes.

### 2. Casos de Uso

#### UC1 – Registrar Feria

* **Actor:** Administrador
* **Descripción:** Permite crear una nueva feria con nombre, fecha, lugar y descripción.
* **Flujo principal:**

  1. Accede al formulario **Crear Feria**.
  2. Completa Nombre, Fecha, Lugar y Descripción.
  3. Envía el formulario.
  4. El sistema valida y guarda la feria.
* **Errores:**

  * Fecha inválida → Mensaje **“Fecha no válida”**.
  * Campos vacíos → Mensaje **“Campo X es requerido”**.

#### UC2 – Registrar Emprendedor

* **Actor:** Administrador
* **Descripción:** Alta de emprendedor con nombre, teléfono y rubro.
* **Flujo principal:**

  1. Abre **Crear Emprendedor**.
  2. Ingresa Nombre, Teléfono y Rubro.
  3. Envía el formulario.
  4. El sistema valida y almacena el registro.


#### UC3 – Vincular Emprendedor a Feria

* **Actor:** Administrador
* **Descripción:** Crea la relación many-to-many entre ferias y emprendedores.
* **Flujo principal:**

  1. Selecciona una feria.
  2. Selecciona uno o varios emprendedores.
  3. Hace clic en **Vincular**.
  4. Verifica duplicados y crea el vínculo.
* **Errores:**

  * Emprendedor ya vinculado → **“Este emprendedor ya participa en la feria”**.

#### UC4 – Consultar Ferias y Participantes

* **Actor:** Usuario registrado
* **Descripción:** Lista ferias y, al seleccionar una, muestra emprendedores vinculados.

### 3. Requisitos Funcionales (RF)

* **RF1:** El sistema debe permitir crear, leer, actualizar y eliminar (CRUD) ferias.
* **RF2:** El sistema debe permitir CRUD de emprendedores.
* **RF3:** El sistema debe permitir crear y eliminar vínculos emprendedor–feria.
* **RF4:** El sistema debe validar que todos los campos obligatorios estén completos.
* **RF5:** El sistema debe validar formato de fecha y números de teléfono.
* **RF6:** Solo usuarios autenticados pueden acceder a las operaciones de CRUD y vinculación.

### 4. Requisitos No Funcionales (RNF)

* **RNF1 (Rendimiento):** Todas las páginas de listado deben cargar en menos de 1 segundo.
* **RNF2 (Usabilidad):** Mostrar mensajes de error claros junto a cada campo.
* **RNF3 (Mantenibilidad):** Código organizado según convenciones MVC de Laravel.
