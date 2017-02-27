# language: es
Característica: Rutas de los medidor
  En orden para obtener los medidores hay que definir sus rutas

Escenario: GET "/medidor"
  Cuando hago una peticion GET a "/medidor"
  Entonces obtengo una respuesta 200 del servidor