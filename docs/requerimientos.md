# Documento de Requerimientos

## 1. Actores
- **Administrador**  
  Gestiona ferias, emprendedores y vínculos.
- **Usuario registrado**  
  Consulta lista de ferias y detalles de participantes.

## 2. Casos de Uso

### UC1 – Registrar Feria
- **Actor:** Administrador  
- **Descripción:** Permite crear una nueva feria con nombre, fecha, lugar y descripción.  
- **Flujo principal:**  
  1. El administrador accede al formulario “Crear Feria”.  
  2. Completa los campos obligatorios: Nombre, Fecha, Lugar, Descripción.  
  3. Envía el formulario.  
  4. El sistema valida datos y guarda la feria.  
- **Flujos alternativos / Errores:**  
  - Fecha inválida → Mensaje de “Fecha no válida”.  
  - Campos vacíos → Mensaje “Campo X es requerido”.  

### UC2 – Registrar Emprendedor
- **Actor:** Administrador  
- **Descripción:** Permite dar de alta un emprendedor con nombre, teléfono y rubro.  
- **Flujo principal:**  
  1. El administrador abre el formulario “Crear Emprendedor”.  
  2. Ingresa Nombre, Teléfono, Rubro.  
  3. Envía el formulario.  
  4. El sistema valida y almacena el registro.  
- **Flujos alternativos / Errores:**  
  - Teléfono no numérico → “Ingrese un número de teléfono válido”.  
  - Campo vacío → “Campo X es requerido”.  

### UC3 – Vincular Emprendedor a Feria
- **Actor:** Administrador  
- **Descripción:** Crea la relación many-to-many entre ferias y emprendedores.  
- **Flujo principal:**  
  1. Selecciona una feria del listado.  
  2. Selecciona uno o varios emprendedores.  
  3. Hace clic en “Vincular”.  
  4. El sistema comprueba que no exista vínculo previo y lo crea.  
- **Flujos alternativos / Errores:**  
  - Emprendedor ya vinculado → Mensaje “Este emprendedor ya participa en la feria”.  

### UC4 – Consultar Ferias y Participantes
- **Actor:** Usuario registrado  
- **Descripción:** Permite ver el listado de ferias y, al elegir una, listar emprendedores vinculados.  
- **Flujo principal:**  
  1. Usuario accede a “Listado de Ferias”.  
  2. Selecciona una feria.  
  3. El sistema muestra los datos de la feria y la lista de emprendedores participantes.

## 3. Requisitos Funcionales (RF)
- **RF1:** El sistema debe permitir crear, leer, actualizar y eliminar (CRUD) ferias.  
- **RF2:** El sistema debe permitir CRUD de emprendedores.  
- **RF3:** El sistema debe permitir crear y eliminar vínculos emprendedor–feria.  
- **RF4:** El sistema debe validar que todos los campos obligatorios estén completos.  
- **RF5:** El sistema debe validar formato de fecha y números de teléfono.  
- **RF6:** Solo usuarios autenticados pueden acceder a las operaciones de CRUD y vinculación.

## 4. Requisitos No Funcionales (RNF)
- **RNF1 (Rendimiento):** Todas las páginas de listado deben cargar en menos de 1 segundo.  
- **RNF2 (Usabilidad):** Mostrar mensajes de error claros junto a cada campo.   
- **RNF3 (Mantenibilidad):** Código organizado según convenciones MVC de Laravel.


