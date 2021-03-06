# planb/collections

php generic collections implementation


## Spine
```planb/collections``` es un proyecto tipo ```library``` que usa los componentes de ```planb/spine```.

Esto proporciona una serie de comandos, utiles durante la fase de desarrollo del proyecto

### List

```bash

composer spine list

```
Muestra un listado de los comandos "spine" disponibles

---

### Init

```bash

composer spine init

```
Incializa y configura un proyecto:
- crea los archivos con la información complementaria.
- configura codeception para los tests
- crea los hooks de git,
- etc

---

### Coverage
```bash
composer spine coverage
```
Ejecuta los tests y muestra información sobre el coverage

---

### Build
```bash
composer spine build
```
Genera los informes sobre el proyecto:
- Actualiza la (documentación de la api)[docs/api]

---

### Qa
```bash
composer spine qa src
```
Comprueba los estandares de calidad del código, y corrige los posibles errores auto-solucionables

---

### Validate

```bash
composer spine validate src
```
Comprueba los estandares de calidad del código. Se usa para validar el código antes de hacer commit

---

### Tdd

Tambien se proporcionan comandos para la creación de plantillas para nuestos tests unitarios

```bash

composer tdd:template <suite> <path>

```
