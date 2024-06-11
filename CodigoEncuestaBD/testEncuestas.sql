--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `titulo`, `idUsuario`, `fechaInicio`, `fechaFin`) VALUES
(3, 'Cual es tu personaje favorito de los Simpson?', 4, '2024-06-10 22:41:23', '2024-06-12 22:41:23'),
(7, 'Cual es tu personaje favorito de los Simpson?', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Cual es tu personaje favorito de los Simpson?', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Cual es tu personaje favorito de los Simpson?', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Cual es tu personaje favorito de los Simpson?', 4, '2024-06-10 22:41:23', '2024-06-20 22:41:23'),
(11, 'Que opinas de los resultados de las elecciones?', 1, '1970-01-01 00:00:00', '1970-01-03 00:00:00');

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  `idOpcion` int(11) NOT NULL,
  `texto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `idEncuesta`, `idOpcion`, `texto`) VALUES
(1, 3, 0, 'Homer'),
(2, 3, 1, 'Lisa'),
(3, 3, 2, 'Marge'),
(4, 3, 3, 'NO se mas'),
(5, 7, 0, 'Homer'),
(6, 7, 1, 'Lisa'),
(7, 7, 2, 'Marge'),
(8, 7, 3, 'NO se mas'),
(9, 8, 0, 'Homer'),
(10, 8, 1, 'Lisa'),
(11, 8, 2, 'Marge'),
(12, 8, 3, 'NO se mas'),
(13, 9, 0, 'Homer'),
(14, 9, 1, 'Lisa'),
(15, 9, 2, 'Marge'),
(16, 9, 3, 'NO se mas'),
(17, 10, 0, 'Homer'),
(18, 10, 1, 'Lisa'),
(19, 10, 2, 'Marge'),
(20, 10, 3, 'Bart'),
(21, 11, 0, 'Un desastre'),
(22, 11, 1, 'Que horror!!'),
(23, 11, 2, 'A mi me parece bien'),
(24, 11, 3, 'Quiero volver a votar!');


--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  `idOpcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iEncuestaOpcion` (`idOpcion`,`idEncuesta`) USING BTREE,
  ADD KEY `iEncuesta` (`idEncuesta`) USING BTREE;

--

-- --------------------------------------------------------

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iEncuestaUsuario` (`idUsuario`) USING BTREE;

--
--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iRespuesta` (`idEncuesta`,`idUsuario`),
  ADD KEY `iUsuarioResp` (`idUsuario`),
  ADD KEY `iOpciones` (`idEncuesta`,`idOpcion`),
  ADD KEY `idOpcion` (`idOpcion`);
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `existeUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `iEncuesta` FOREIGN KEY (`idEncuesta`) REFERENCES `encuestas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `iUsuarioResp` FOREIGN KEY (`idUsuario`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idEncuesta`) REFERENCES `opciones` (`idEncuesta`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`idOpcion`) REFERENCES `opciones` (`idOpcion`);


