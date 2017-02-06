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
      "page":"3"
    }
  """
  Cuando hago una peticion GET a "/"
  Entonces obtengo una respuesta 200 del servidor
  Y la propiedad "total" existe
  Y la propiedad "per_page" existe
  Y la propiedad "per_page" es igual a "20"
  Y la propiedad "current_page" existe
  Y la propiedad "current_page" es igual a "3"
  Y la propiedad "last_page" existe
  Y la propiedad "next_page_url" existe
  Y la propiedad "prev_page_url" existe
  Y la propiedad "from" existe
  Y la propiedad "to" existe
  Y la propiedad "data" es de tipo array
  Y la propiedad "data.0.id" existe
  Y la propiedad "data.0.tipo" existe
  Y la propiedad "data.0.tipo" es igual a "Fuera"
