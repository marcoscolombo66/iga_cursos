# Documentación de IGA CURSOS

## Configuración con Docker

### Requisitos previos
- Docker instalado en tu sistema
- Docker Compose instalado en tu sistema

### Levantar el entorno con Docker
1. Clona el repositorio:
```bash
git clone https://github.com/igacursos/iga-cursos.git
cd iga-cursos
```

2. Levanta los contenedores:
```bash
docker-compose up -d
```

3. Verifica que los contenedores estén corriendo:
```bash
docker-compose ps
```

4. Accede a la aplicación en tu navegador:
```
http://localhost:8080
```

### Detener el entorno
Para detener los contenedores sin eliminarlos:
```bash
docker-compose stop
```

Para detener y eliminar los contenedores:
```bash
docker-compose down
```

## Resumen de las APIs disponibles

### 1. `cursos_get()`
**Método:** GET  
**Endpoint:** `/api/cursos`  
**Descripción:** Retorna todos los cursos disponibles en el sistema.  
**Respuestas:**
- 200: Lista de cursos en formato JSON
- 404: Mensaje indicando que no hay cursos disponibles

### 2. `comprarCurso_post()`
**Método:** POST  
**Endpoint:** `/api/comprarCurso`  
**Descripción:** Permite a un usuario registrar la compra de un curso.  
**Datos requeridos:**

```json
{
    "id_curso": 1,
    "id_usuario": 1
}
```

**Respuestas:**
- 200: Confirmación de compra exitosa con ID de compra
- 400: Error por datos incompletos
- 404: El curso solicitado no existe
- 500: Error al registrar cliente o compra

### 4. `comprasCliente_post()`
**Método:** POST  
**Endpoint:** `/api/comprasCliente`  
**Descripción:** Obtiene todas las compras realizadas por un cliente identificado por su email.  
**Datos requeridos:**

### 3. `comprasCliente_post()`
**Método:** POST  
**Endpoint:** `/api/comprasCliente`  
**Descripción:** Obtiene todas las compras realizadas por un cliente identificado por su email.  
**Datos requeridos:**

```json
{
  "email": "email@ejemplo.com"
}
```

**Respuestas:**
- 200: Lista de compras del cliente
- 400: Email no proporcionado
- 404: No se encontraron compras para este cliente

### 4. `estadisticasCompras_post()`
**Método:** POST  
**Endpoint:** `/api/estadisticasCompras`  
**Descripción:** Obtiene estadísticas generales sobre las compras realizadas. Diseñado para uso administrativo.  
**Respuestas:**
- 200: Datos estadísticos de compras
- 404: No hay datos de compras disponibles

## Notas adicionales
- Todas las APIs utilizan formato JSON para enviar y recibir datos
- Las APIs incluyen validación de datos y manejo de errores
- Se implementa sanitización de entradas para prevenir inyecciones

## Configuración del Frontend (Angular)

### Requisitos previos
- Node.js (versión 14.x o superior)
- npm (normalmente viene con Node.js)
- Angular CLI (`npm install -g @angular/cli`)

### Levantar el Frontend
1. Navega a la carpeta del frontend:
```bash
cd front/iga-cursos
```

2. Instala las dependencias:
```bash
npm install
```

3. Inicia el servidor de desarrollo:
```bash
ng serve
```

4. Accede a la aplicación en tu navegador:
```
http://localhost:4200
```

### Compilar para producción
Para generar la versión de producción:
```bash
ng build --prod
```
Los archivos compilados se guardarán en la carpeta `dist/`.

## Acceso al Panel de Administración

Para acceder al panel de administración del sistema, utiliza las siguientes credenciales:

**Usuario:** admin  
**Contraseña:** admin




