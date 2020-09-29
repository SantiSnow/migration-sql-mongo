# migration-sql-mongo
_Este simple programa en PHP se ocupa de migrar una base de datos en MySQL, a MongoDB completa_

## El programa:
_En este primer commit, creo un programa en PHP que se ocupa de leer completa un base de datos MySQL, la cual contiene artículos con información normal, y se envía a MongoDB,
creando una base de datos, una coleccion, e insertando toda la información._


### Información actual del proyecto
_El programa aun necesita mejoras, no esta optimizado al 100%, dado que no tiene UserInterface, cada lectura en el bucle crea una nueva conexión, sin aprovechar una conexión estable,
y necesita varias mejoras que se iran implementando._

## Construido con 🛠️
*PHP
*MySQL
*MongoDB
