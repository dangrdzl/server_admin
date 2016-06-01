# server_admin
Proyecto Web

La funcionalidad de la aplicacion es basicamente la siguiente:
Agregar servidores Web para poder monitorear los servicios basicos, y asi saber el estado en todo momento de la aplicacion, la aplicacion 
puede crecer agregando funcionalidades de Alertas por correo y monitorear los servidores dependiendo del usuario que se encuentra conectado
asi como un historial de las "Caidas" de determinado servidor.


Entrando a la aplicacion se encontrara con un login: 
usuario: daniel
contraseña: 123456


- La primera pantalla "Servidor" aqui se podra agregar servidores para monitorear, se recomienda preferentemente usar la IP del servidor
  aunque acepta el dominio como entrada.
- La pantalla "Servicios" permite ligar un servicio ( HTTP,SMTP, SSH) a un servidor, de manera que podras monitorear el estado de dicho servicio en dicho servidor
- En la pantalla Monitoreo puedes listar la informacion de los servicios dependiendo de cada servidor, asi como filstrarlos por Grupo de servidor.

- Ademas cada pantalla tiene la funcionalidad de agregar y remover los servidores o el monitor. Validando el no poder eliminar servidores si cuentan con un monitor activo.

- El monitoreo se lleva a cabo mediante un script en bash el cual hace uso de la herramienta netcat para revisar el estado del servicio.
