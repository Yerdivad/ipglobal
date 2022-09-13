# Prueba de código Ipglobal

En este repositorio encontramos una prueba de Blog básico que cuenta con los siguientes endpoints:

- Listado de posts (post/articles)
- Post único (post/article/1)
- API obtener post (api/post/article/1). *[GET]*
- API añadir un post (api/post/article). *[POST]*


Para empezar y dados los requerimientos de la prueba he montado el proyecto en Symfony 6 como última versión y con PHP 8.
En lo que refiere a la instalación del proyecto y preparación no he tenido ningún problema, ya que aunque no había trabajado con Symfony 6 la puesta en marcha se realiza de una forma muy sencilla siguiendo la documentación del Framework.

## Api

*API obtener post (api/post/article/1). *[GET]**
En esta petición es sencilla únicamente tenemos que llamar al endpoint y la misma url parametrizada nos servirá para responder con el json del post en cuestión.
*API añadir un post (api/post/article). *[POST]**
Esta petición tenemos que enviar en el body un json con la siguiente estructura:
{
"title":"Título del post"
"content":"contenido del post"
"authorId": 1 *(integral con el id del author)*
}
La respuesta recibida será un json con los datos de vuelta y a parte un id generado que nos servirá para recuperarlo.


## Estructura del proyecto.

En cuanto a la estructura del proyecto he intentado aplicar los conceptos de Arquitectura Hexagonal y la separación de los distintos dominios o apartados lógicos de la aplicación diferenciado entre Aplication, Domain, Infrastructure.

## Test Unitarios

En esta parte he tenido más problemas y finalmente no he podido levantarlos. Aunque he trabajado anteriormente con test, ha sido siempre con una estructura montada de Test. Es por ello que a la hora de configurar correctamente el entorno he tenido algunos problemas y no he conseguido correrlos correctamente.

## Maquetación

En cuanto a la maquetación opté por Tailwind, con no muy buenos resultados. Era la primera vez que trabajaba con él y en algunas partes por falta de tiempo final he tenido que maquetarlo a pelo.  Mil disculpas por esos estilos en línea que duelen a los ojos.

## Conclusiones

Lejos de ser una prueba ideal u haber presentado una prueba de la cual me sienta plenamente orgulloso, he intentando plasmar en ella mi afán de resolver problemas y por lo menos una muestra operativa de lo que se pedía en los requerimientos.
Tengo muchos puntos en los que mejorar y en los que me gustaría avanzar en cuanto al Testing y al clean code.


