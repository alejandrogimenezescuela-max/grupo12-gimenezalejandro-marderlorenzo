##TatamiHUB

Este proyecto es una aplicación web de gestión de ventas y carrito de compras desarrollada con **Laravel**. Permite a los usuarios explorar productos, gestionar su carrito y realizar compras, mientras mantiene una distinción clara entre roles de Administrador y Cliente.

##  Características Principales

* **Sistema de Autenticación:** Registro e inicio de sesión seguro.
* **Gestión de Carrito:** Añadir, eliminar y visualizar productos en tiempo real.
* **Lógica de Roles:** * **Clientes:** Pueden realizar compras y gestionar sus datos de perfil (necesarios para envíos).
    * **Administradores:** Acceso restringido a funciones de compra para proteger la integridad del sistema.
* **Validación de Perfil:** El sistema verifica si el usuario tiene teléfono y dirección cargados antes de permitir la opción de "Envío a domicilio".
* **Métodos de Entrega:** Selección entre "Retiro en sucursal" o "Envío a domicilio".

## 🛠 Tecnologías Utilizadas

* **Backend:** PHP, Laravel Framework
* **Frontend:** Blade Templates, Bootstrap 5, Bootstrap Icons
* **Base de Datos:** [Tu base de datos, ej: MySQL]
* **Control de Versiones:** Git / GitHub

##  Estructura del Proyecto (Puntos clave)

* `app/Http/Controllers/CarritoController.php`: Lógica de gestión de carrito y confirmación de compras con seguridad de roles.
* `app/Models/User.php`: Modelo de usuario con métodos personalizados (`tienePerfilCompleto`).
* `resources/views/`: Vistas de la aplicación, incluyendo la interfaz del carrito con validaciones de rol.
* `routes/web.php`: Definición de rutas protegidas por middleware `auth`.

##  Instalación

1. Clona el repositorio:
   ```bash
   git clone [URL-DE-TU-REPOSITORIO]
