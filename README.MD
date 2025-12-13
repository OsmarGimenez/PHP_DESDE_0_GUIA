# Guía Interactiva de PHP: Desde Cero a POO Avanzada

¡Bienvenido! Este repositorio contiene una guía de aprendizaje interactiva sobre el lenguaje PHP, diseñada para llevar a un desarrollador desde los conceptos básicos hasta temas avanzados de Programación Orientada a Objetos.

El proyecto está estructurado como una aplicación web modular y organizada, sirviendo no solo como material de estudio, sino también como un ejemplo de buenas prácticas en la estructuración y diseño de un proyecto PHP.

## Temas Cubiertos

La guía está dividida en 11 módulos secuenciales que cubren los siguientes temas:

1.  **Iniciación a PHP:** Sintaxis, Etiquetas, Comentarios.
2.  **Salida en Pantalla:** `echo`, `print`, `print_r` y `var_dump`.
3.  **Variables y Constantes:** Tipos de datos, definición y nomenclatura.
4.  **Operadores:** Aritméticos, asignación, comparación, lógicos.
5.  **Estructuras de Control:** Condicionales (`if`, `switch`) y bucles (`for`, `while`, `foreach`).
6.  **Arrays:** Creación, manipulación, iteración y funciones comunes.
7.  **Funciones:** Definición, parámetros, retorno y funciones nativas.
8.  **POO Básica:** Clases, objetos, propiedades, métodos y constructores.
9.  **Errores y Excepciones:** Manejo de errores con `try-catch` y logs.
10. **Principios de la POO:** Encapsulación, Herencia y Polimorfismo.
11. **POO Avanzada:** Namespaces, Interfaces, Clases Abstractas y Traits.

## Características del Proyecto

Este proyecto demuestra conocimientos tanto de backend (PHP) como de frontend, con un enfoque en las buenas prácticas y la experiencia de usuario:

* **Arquitectura Limpia:** El código está organizado en una estructura de carpetas lógica (`assets`, `pages`, `views`) que separa las responsabilidades.
* **Diseño Responsive:** La interfaz se adapta a cualquier tamaño de pantalla, desde móviles hasta escritorios, utilizando CSS Flexbox y Media Queries.
* **Componentes Reutilizables:** Se utilizan plantillas para el `header`, `sidebar`, `footer` y `paginación`, siguiendo el principio DRY (Don't Repeat Yourself).
* **Navegación con Sidebar Dinámico:** Un menú lateral persistente resalta el tema actual y se puede ocultar para maximizar el espacio de contenido.
* **Selector de Tema (Claro/Oscuro):** Incluye un interruptor para cambiar entre el tema claro y oscuro, guardando la preferencia del usuario en su navegador (`localStorage`).
* **Resaltado de Sintaxis:** Los bloques de código utilizan **Prism.js** para un coloreado profesional que facilita la lectura.

## Instalación y Uso Local

Para ejecutar esta guía en tu equipo, necesitas un entorno de servidor local como XAMPP.

1.  **Clona el repositorio:**
    ```bash
    git clone [https://github.com/OsmarGimenez/PHP_DESDE_0_GUIA.git](https://github.com/OsmarGimenez/PHP_DESDE_0_GUIA.git)
    ```
2.  **Mueve los archivos:** Renombra la carpeta clonada a `PHP_OPENBOOTCAMP` (o el nombre que prefieras) y muévela dentro del directorio raíz de tu servidor web (`htdocs` en XAMPP).
3.  **Inicia tu servidor:** Asegúrate de que el servicio de **Apache** esté corriendo.
4.  **Abre en el navegador:** Ve a `http://localhost/PHP_OPENBOOTCAMP/inicio.php`.

## Tecnologías Utilizadas

* **PHP**
* **HTML5**
* **CSS3** (con Variables, Flexbox y Media Queries)
* **JavaScript** (para la interactividad del tema y el sidebar)

## Autor

* **OSMAR GIMÉNEZ**
* **LinkedIn:** [ENLACE A TU PERFIL DE LINKEDIN AQUÍ]

## Licencia

Este proyecto se distribuye bajo la Licencia MIT.