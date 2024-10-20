<?php

class Model
{
  protected $db;

  public function __construct()
  {
    $this->db = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
    $this->deploy();
  }
  private function deploy()
  {
    $query = $this->db->query('SHOW TABLES');
    $tables = $query->fetchAll();
    if (count($tables) == 0) {
      $sql = <<<END
--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `material_fabricacion` varchar(50) NOT NULL,
  `descripcion` varchar(510) NOT NULL,
  `requiere_curado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `material_fabricacion`, `descripcion`, `requiere_curado`) VALUES
(1, 'Calabaza', 'Es el tipo de mate más tradicional, hecho a partir del fruto seco de la calabaza. Su interior se cura para absorber los sabores de la yerba y potenciar la experiencia del mate. Tiene un diseño rústico y natural, siendo valorado por los puristas del mate.', 1),
(2, 'Madera', 'Hecho de maderas como algarrobo o palo santo, este tipo de mate tiene un aroma particular que se mezcla con el sabor de la yerba. Debe ser curado antes de su uso, y con el tiempo, adquiere una pátina que intensifica su carácter único.', 1),
(3, 'Vidrio', 'Este mate tiene un cuerpo de vidrio, generalmente cubierto por una funda de cuero. El vidrio no altera el sabor de la yerba, por lo que es ideal para quienes prefieren un sabor puro y fresco. Además, es fácil de limpiar y no necesita ser curado.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_mate` int(11) NOT NULL,
  `nombre_mate` varchar(255) NOT NULL,
  `forma_mate` varchar(255) NOT NULL,
  `imagen` varchar(510) NOT NULL,
  `recubrimiento_mate` varchar(50) NOT NULL,
  `color_mate` varchar(255) NOT NULL,
  `id_categoria_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_mate`, `nombre_mate`, `forma_mate`, `imagen`, `recubrimiento_mate`, `color_mate`, `id_categoria_fk`) VALUES
(1, 'Mate champiñon', 'Imperial', 'https://acdn.mitiendanube.com/stores/001/143/953/products/img_9368-4370cd752e2375a44516987629639789-1024-1024.jpeg', 'Cuero natural', 'negro', 1),
(3, 'Mate provinciano', 'Torpedo', 'https://acdn.mitiendanube.com/stores/001/143/953/products/img_9376_jpg-a11ecf50788d52680716987627000158-1024-1024.webp', 'Cuero sintetico', 'azul', 3),
(5, 'Mate escuirol', 'Imperial', 'https://acdn.mitiendanube.com/stores/001/143/953/products/img_9368-4370cd752e2375a44516987629639789-1024-1024.jpeg', 'Cuero natural', 'marron', 2),
(12, 'Mate calavera', 'Torpedo', 'https://acdn.mitiendanube.com/stores/942/536/products/calavera11-1ca3f197da940d247116187157038750-1024-1024.webp', 'Cuero natural', 'Negro', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_mate`),
  ADD KEY `id_categoria_fk` (`id_categoria_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_mate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `id_categoria_fk` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
END;
      $this->db->query($sql);
    }
  }
}
