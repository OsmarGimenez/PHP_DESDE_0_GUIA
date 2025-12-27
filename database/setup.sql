-- 1. Crear la Base de Datos con codificación moderna (emojis y caracteres especiales)
CREATE DATABASE IF NOT EXISTS guia_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE guia_php;

-- 2. Crear la tabla de Temas (Capítulos)
CREATE TABLE IF NOT EXISTS temas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE, -- La URL amigable (ej: 01.etiquetas)
    descripcion VARCHAR(255) NULL,     -- Para el SEO futuro
    orden INT NOT NULL,                -- Para ordenar el menú
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 3. Insertar los datos actuales (Semilla)
-- Nota: 'inicio' tiene orden 0. El resto sigue tu estructura.
INSERT INTO temas (titulo, slug, orden) VALUES
('Inicio', 'inicio', 0),
('1. Iniciación a PHP', '01.etiquetas', 1),
('2. Guía de Salida', '02.echo_print_vardump', 2),
('3. Variables y Constantes', '03.variables_y_constantes', 3),
('4. Operadores', '04.operadores', 4),
('5. Estructuras de Control', '05_condicionales', 5),
('6. Arrays', '06.arrays', 6),
('7. Funciones', '07.funciones', 7),
('8. POO Básica', '08.funciones_clases_objetos', 8),
('9. Errores y Excepciones', '09.try_catch_y_exepciones', 9),
('10. Principios de la POO', '10.principios_POO', 10), 
('11. POO Avanzada', '11.namespace_interfaces_traits', 11); 