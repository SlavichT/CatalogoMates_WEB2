# TPE 2024 - Primera parte - Dominio

_ _ _

# INTEGRANTES: Ricco Pablo , Slavich Tomás
## Tema del trabajo: CATALOGO DE MATES
## Tablas:

Nuestras tablas estan planteadas en una relacion 1 a N (Un __"PRODUCTO"__ puede pertenecer a UNA sola categoria mientras que una __"CATEGORIA"__ puede contener VARIOS productos).

**Categoria**

**`id_categoria`**: muestra un id UNICO para cada categoria.

**`material_fabricacion`**: determina de que material esta fabricado el mate (en este caso __Calabaza__, __Madera__ , __Vidrio__)

**`descripcion`**: muestra una breve descripcion del mate segun su material de fabricacion.

**`requiere_curado`**: determina si el mate requiere o no de un curado previo.



**Producto**

**`id_mate`**: muestra un id UNICO para cada mate.

**`forma_mate`**: determina que tipo de mate se pide (ya sea __Imperial__, __Torpedo__, __Camionero__).

**`imagen`**: imagen representativa del mate.

**`recubrimiento_mate`**: tipo de recubrimiento del mate (cuero natural o sintetico).

**`id_categoria_fk`**: clave foranea la cual relaciona la tabla de producto con categoria.

_ _ _

**Diagrama**

![Catalogo de mates](https://github.com/user-attachments/assets/d293fbcd-16c5-42fa-a70d-f15c6babddf8)







