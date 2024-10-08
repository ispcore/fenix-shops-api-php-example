<p align="center">
  <img align="center" src="https://files.ispcore.es/file/icstatic/images/brand/fenix-01.png" height="150px"/>

  <h1 align="center">Ejemplo de uso de la API de Fénix en PHP</h1>
</p>

## Requisitos

- Docker

## Uso

### Configurar credenciales

Tienes que ir a los archivos `src/get-contract.php` y `src/upload-contract.php` y modificar las siguientes líneas con tus credenciales:

```php
$shopID = '<shop-id>';
$orderID = '<order-id>';
$apiKey = '<api-key>';
```

### Ejecutar aplicación

Para ejecutar el ejemplo primero debes iniciar el contenedor de Docker con el siguiente comando:

```bash
# Ejecutar en tu host
docker compose up -d
```

### Abrir una terminal en el contenedor e instalar dependencias

Debes ingresar al contenedor para instalar las dependencias de composer. Para ello, ejecuta el siguiente comando:

```bash
# Ejecutar en tu host
docker compose exec app /bin/bash
```

Una vez dentro del contenedor, ejecuta el siguiente comando para instalar las dependencias de composer:

```bash
# Ejecutar en la terminal del contenedor
composer install
```

y si quieres salir de la terminal del contenedor, ejecuta el siguiente comando:

```bash
# Ejecutar en la terminal del contenedor
exit
```

### Obtener y subir contratos de prueba

Luego puedes acceder a las siguientes URLs:

- **Obtener contrato del pedido**: `http://localhost:8086/get-contract.php`
- **Subir contrato del pedido**: `http://localhost:8086/upload-contract.php`

### Detener la aplicación

Para detener la aplicación y el contenedor de Docker, ejecuta el siguiente comando:

```bash
# Ejecutar en tu host
docker compose down
```
