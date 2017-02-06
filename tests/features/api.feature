# language: es
Característica: Rutas de API Básicas
  En orden para interactuar con mi aplicacion desde el Fron End
  Como desarrollador Fron End sin conocimiento de lo que hace la API
  Yo necesito una API asombrosa con la cual trabajar

Escenario: GET "/"
  Cuando hago una peticion GET a "/"
  Entonces obtengo una respuesta 200 del servidor

Escenario: GET "/"
  Dado que tengo los siguientes valores:
  """
    {
      "tipo":"Fuera",
      "per_page":"20",
      "page":"1"
    }
  """
  Cuando hago una peticion GET a "/"
  Entonces obtengo una respuesta 200 del servidor
  Y la propiedad "total" existe
  Y la propiedad "per_page" existe
  Y la propiedad "per_page" es igual a "20"
  Y la propiedad "current_page" existe
  Y la propiedad "current_page" es igual a "1"
  Y la propiedad "last_page" existe
  Y la propiedad "next_page_url" existe
  Y la propiedad "prev_page_url" existe
  Y la propiedad "from" existe
  Y la propiedad "to" existe
  Y la propiedad "data" es de tipo array
  Y la propiedad "data.0.id" existe
  Y la propiedad "data.0.tipo" existe
  Y la propiedad "data.0.tipo" es igual a "Fuera"

Escenario: POST Y PUT
  Dado que tengo los siguientes valores:
  """
    {
      "captura":100,
      "medidor_id":1
    }
  """
  Cuando hago una peticion POST a "/"
  Entonces obtengo una respuesta 201 del servidor
  Y la propiedad "id" existe y lo almacenamos
  Y la propiedad "captura_inicial" existe
  Y la propiedad "captura_inicial" es igual a "100"
  Y la propiedad "medidor_id" existe
  Y la propiedad "medidor_id" es igual a "1"
  Y la propiedad "tipo" existe
  Y la propiedad "tipo" es igual a "Oficina"
  """
    {
      "captura":150,
      "medidor_id":1
    }
  """
  Cuando hago una peticion PUT a "/{id}"
  Entonces obtengo una respuesta 200 del servidor
  Y la propiedad "id" existe
  Y la propiedad "captura_final" existe
  Y la propiedad "captura_final" es igual a "150"
  Y la propiedad "consumo" existe
  Y la propiedad "consumo" es igual a "50"
  Y la propiedad "tipo" existe
  Y la propiedad "tipo" es igual a "Oficina"
