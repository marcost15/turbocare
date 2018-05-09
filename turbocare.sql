-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 14-03-2014 a las 17:39:37
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `turbocare`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `acciones_inc`
-- 

CREATE TABLE `acciones_inc` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=21 ;

-- 
-- Volcar la base de datos para la tabla `acciones_inc`
-- 

INSERT INTO `acciones_inc` VALUES (1, 'EFECTUAR TRABAJOS DE MANTENIMIENTO A EQUIPOS EN OPERACION');
INSERT INTO `acciones_inc` VALUES (2, 'NO USAR EPP');
INSERT INTO `acciones_inc` VALUES (3, 'USO INADECUADO/IMPROPIO DE LOS EPP');
INSERT INTO `acciones_inc` VALUES (4, 'NO USAR VESTIMENTA APROPIADA');
INSERT INTO `acciones_inc` VALUES (5, 'NO PROTEGERY/O PREVENIR');
INSERT INTO `acciones_inc` VALUES (6, 'DISTRAER, MOLESTAR, ASUSTAR, FUMAR');
INSERT INTO `acciones_inc` VALUES (7, 'USO INADECUADO DE EQUIPOS');
INSERT INTO `acciones_inc` VALUES (8, 'USO INADECUADO DE MANOS U OTRAS PARTES DEL CUERPO');
INSERT INTO `acciones_inc` VALUES (9, 'NO PRESTAR ATENCION AL CAMINAR O A LOS ALREDEDORES');
INSERT INTO `acciones_inc` VALUES (10, 'HACER INEFICACES LOS DISPOSITIVOS DE SEGURIDAD');
INSERT INTO `acciones_inc` VALUES (11, 'OPERAR O TRABAJAR A VELOCIDAD INSEGURA');
INSERT INTO `acciones_inc` VALUES (12, 'ADOPTAR POSICION O POSTURA INSEGURA');
INSERT INTO `acciones_inc` VALUES (13, 'CONDUCIR VEHICULO DE FORMA INSEGURA');
INSERT INTO `acciones_inc` VALUES (14, 'DEPOSITAR, MEZCLAR, COMBINAR EN FORMA INSEGURA');
INSERT INTO `acciones_inc` VALUES (15, 'USAR EQUIPO DEFECTUOSO');
INSERT INTO `acciones_inc` VALUES (16, 'EJECUTAR TRABAJOS EN EQUIPOS IMPROPIAMENTE ASEGURADOS');
INSERT INTO `acciones_inc` VALUES (17, 'ACTO INSEGURO NO CLASIFICADO AQUI');
INSERT INTO `acciones_inc` VALUES (18, 'NINGUN ACTO INSEGURO');
INSERT INTO `acciones_inc` VALUES (19, 'SIN CLASIFICAR, DATOS INSUFICIENTES');
INSERT INTO `acciones_inc` VALUES (20, 'NINGUNO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cargos`
-- 

CREATE TABLE `cargos` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=30 ;

-- 
-- Volcar la base de datos para la tabla `cargos`
-- 

INSERT INTO `cargos` VALUES (1, 'AYUDANTE DE ANDAMIERO');
INSERT INTO `cargos` VALUES (2, 'AYUDANTE DE MECANICO');
INSERT INTO `cargos` VALUES (3, 'SOLDADOR');
INSERT INTO `cargos` VALUES (4, 'OPERADOR DE CAMION CON BRAZO ARTICULADO');
INSERT INTO `cargos` VALUES (5, 'OPERADOR DE GRUA');
INSERT INTO `cargos` VALUES (6, 'TECNICO EN REFRIGERACION');
INSERT INTO `cargos` VALUES (7, 'TORNERO');
INSERT INTO `cargos` VALUES (8, 'TECNICO MECANICO');
INSERT INTO `cargos` VALUES (9, 'AYUDANTE DE MONTADOR');
INSERT INTO `cargos` VALUES (10, 'AYUDANTE DE ELECTRICISTA');
INSERT INTO `cargos` VALUES (11, 'AYUDANTE DE INSTRUMENTACION');
INSERT INTO `cargos` VALUES (12, 'COORDINADOR LABORAL');
INSERT INTO `cargos` VALUES (13, 'TECNICO ELECTRICISTA');
INSERT INTO `cargos` VALUES (14, 'AYUDANTE DE REFRIGERACION');
INSERT INTO `cargos` VALUES (15, 'INGENIERO DE SOPORTE TECNICO');
INSERT INTO `cargos` VALUES (16, 'PLANIFICADOR');
INSERT INTO `cargos` VALUES (17, 'LAMINADOR');
INSERT INTO `cargos` VALUES (18, 'OPERADOR DE NUEVAS TECNOLOGIAS');
INSERT INTO `cargos` VALUES (19, 'PERSONAL DE LIMPIEZA');
INSERT INTO `cargos` VALUES (20, 'AYUDANTE DE SOLDADOR');
INSERT INTO `cargos` VALUES (21, 'CHOFER');
INSERT INTO `cargos` VALUES (22, 'FABRICADOR');
INSERT INTO `cargos` VALUES (23, 'SUPERVISOR CIVIL');
INSERT INTO `cargos` VALUES (24, 'OPERADOR DE LIMPIEZA ABRASIVA');
INSERT INTO `cargos` VALUES (25, 'TECNICO MECANICO');
INSERT INTO `cargos` VALUES (26, 'GERENTE');
INSERT INTO `cargos` VALUES (27, 'COORDINADOR');
INSERT INTO `cargos` VALUES (28, 'SUPERVISOR');
INSERT INTO `cargos` VALUES (29, 'LIDERES');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `causa_inc`
-- 

CREATE TABLE `causa_inc` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `causa_inc`
-- 

INSERT INTO `causa_inc` VALUES (1, 'DOCUMENTACION');
INSERT INTO `causa_inc` VALUES (2, 'EPP');
INSERT INTO `causa_inc` VALUES (3, 'SENTIDO COMUN');
INSERT INTO `causa_inc` VALUES (4, 'AGENTES EXTERNOS');
INSERT INTO `causa_inc` VALUES (5, 'TECNOLOGIA/MANTENIMIENTO/INGENIERIA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clase_incidentes`
-- 

CREATE TABLE `clase_incidentes` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `clase_incidentes`
-- 

INSERT INTO `clase_incidentes` VALUES (1, 'SIN LESION');
INSERT INTO `clase_incidentes` VALUES (2, 'CON LESION');
INSERT INTO `clase_incidentes` VALUES (3, 'PRIMEROS AUXILIOS');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `condiciones_inc`
-- 

CREATE TABLE `condiciones_inc` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `condiciones_inc`
-- 

INSERT INTO `condiciones_inc` VALUES (1, 'DEFECTO DE AGENTES');
INSERT INTO `condiciones_inc` VALUES (2, 'FALTA DE EPP O EPP DEFECTUOSOS');
INSERT INTO `condiciones_inc` VALUES (3, 'RIESGOS AMBIENTALES');
INSERT INTO `condiciones_inc` VALUES (4, 'PROCEDIMIENTO INSEGURO');
INSERT INTO `condiciones_inc` VALUES (5, 'INADECUADAMENTE PROTEGIDO/RESGUARDADO');
INSERT INTO `condiciones_inc` VALUES (6, 'VESTIMENTA INADECUADA PARA LA CLASE DE TRABAJO');
INSERT INTO `condiciones_inc` VALUES (7, 'ALMACENAMIENTO INSEGURO DE MATERIALES EQUIPOS Y SUSTANCIAS');
INSERT INTO `condiciones_inc` VALUES (8, 'RIESGOS AMBIENTALES DE TRABAJOS EN EXTERIORES');
INSERT INTO `condiciones_inc` VALUES (9, 'PAVIMENTO IRREGULAR');
INSERT INTO `condiciones_inc` VALUES (10, 'CONDICION INSEGURA NO CLASIFICADA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `empresas`
-- 

CREATE TABLE `empresas` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `empresas`
-- 

INSERT INTO `empresas` VALUES (1, 'PDVSA');
INSERT INTO `empresas` VALUES (2, 'FAGIANCA');
INSERT INTO `empresas` VALUES (3, 'TURBOCARE');
INSERT INTO `empresas` VALUES (4, 'HISUZU');
INSERT INTO `empresas` VALUES (5, 'P&V  MAINTENANCE');
INSERT INTO `empresas` VALUES (6, 'REFROYROCA');
INSERT INTO `empresas` VALUES (7, 'ESOPCA');
INSERT INTO `empresas` VALUES (8, 'MONTAYRECA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `equipos`
-- 

CREATE TABLE `equipos` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `equipos`
-- 

INSERT INTO `equipos` VALUES (1, 'TALADRO');
INSERT INTO `equipos` VALUES (2, 'MAQUINA SOLDADORA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `gerencias`
-- 

CREATE TABLE `gerencias` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `gerencias`
-- 

INSERT INTO `gerencias` VALUES (1, 'OPERACIONES TALLER');
INSERT INTO `gerencias` VALUES (2, 'RECURSOS HUMANOS');
INSERT INTO `gerencias` VALUES (3, 'CAF');
INSERT INTO `gerencias` VALUES (4, 'OPERACIONES CAMPO');
INSERT INTO `gerencias` VALUES (5, 'SOPORTE E INGENIERIA');
INSERT INTO `gerencias` VALUES (6, 'PROCURA Y ALMACEN');
INSERT INTO `gerencias` VALUES (7, 'PROTECCION INTEGRAL');
INSERT INTO `gerencias` VALUES (8, 'GENERADORES');
INSERT INTO `gerencias` VALUES (9, 'OPERACIONES CAMPO');
INSERT INTO `gerencias` VALUES (10, 'MERCADEO');
INSERT INTO `gerencias` VALUES (11, 'VENTAS');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `hhe`
-- 

CREATE TABLE `hhe` (
  `id` int(6) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `taller` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `campo` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `contratista` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `ifb` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `ifn` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `ist` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `im` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `hhe`
-- 

INSERT INTO `hhe` VALUES (1, '2014-03-04', '50', '54', '20', '40', '30', '10', '60');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `incidentes`
-- 

CREATE TABLE `incidentes` (
  `id` int(6) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `personal_id` varchar(11) collate utf8_spanish2_ci NOT NULL,
  `empresa_id` int(6) NOT NULL,
  `area` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `seccion_id` int(6) NOT NULL,
  `proyecto` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `clase_id` int(6) NOT NULL,
  `tipo_id` int(6) NOT NULL,
  `condicion_id` int(6) NOT NULL,
  `accion_id` int(6) NOT NULL,
  `region_id` int(6) NOT NULL,
  `causa_id` int(6) NOT NULL,
  `descripcion` text collate utf8_spanish2_ci NOT NULL,
  `tiempo_perdido` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `personal_reg_id` int(11) NOT NULL,
  `acto` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `incidentes`
-- 

INSERT INTO `incidentes` VALUES (1, '2014-03-04', '12:20:00', '19428040', 2, 'SDC', 2, 'MARACAIBO 740', 2, 2, 2, 2, 1, 2, 'JHSHDSHDSF', '7 DIAS', 0, 'NO PROTEGER ');
INSERT INTO `incidentes` VALUES (2, '2014-03-04', '12:30:00', '22675834', 1, 'JDUFHVXCM', 1, 'JHBC XXSKDFHD', 1, 1, 1, 1, 1, 1, 'JYDSGCCMKZSDFH', '9', 19428041, 'JSDC');
INSERT INTO `incidentes` VALUES (3, '2014-03-05', '15:10:00', '19428040', 1, 'DFDF', 1, 'SFSDF', 1, 1, 1, 1, 1, 1, 'ASDFSDFDG', '15', 21043088, 'DFFD');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `informes`
-- 

CREATE TABLE `informes` (
  `id` int(6) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `personal_id` int(11) NOT NULL,
  `equipo_id` int(6) NOT NULL,
  `area` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `hallazgos` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `correcciones` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `acciones` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `evaluador_id` int(11) NOT NULL,
  `fecha_eva` date NOT NULL,
  `personal_rev_id` int(11) NOT NULL,
  `fecha_revi` date NOT NULL,
  `observaciones` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `personal_obs_id` int(11) NOT NULL,
  `fecha_obs` date NOT NULL,
  `status` enum('CERRADO','EN PROCESO') collate utf8_spanish2_ci NOT NULL,
  `tipo_gestion_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `informes`
-- 

INSERT INTO `informes` VALUES (4, '2014-03-04', 19428041, 1, 'JDSJBCJX', 'KUSDBZJS,', 'UDGFZSJ,KZG', 'KUDFJDFGHD', 19428041, '2014-03-04', 19428041, '2014-03-04', 'DSHFNXCJHGJFG', 19428041, '2014-03-04', 'CERRADO', 1);
INSERT INTO `informes` VALUES (5, '2014-03-04', 19428041, 2, 'ZJCNVZXKCVN', 'KXVJCXKJCVN', 'KFFJXKDG', 'LIUFGGDG', 0, '0000-00-00', 0, '0000-00-00', '', 0, '0000-00-00', 'EN PROCESO', 2);
INSERT INTO `informes` VALUES (6, '2015-06-05', 19428041, 2, 'TALLER', 'SE ENCONTRO OBJETO MAL UBICADO', 'PROPORCIONAR UN SITO ESPECIFICO PARA DICHO OBJETO', 'UBICAR EL OBJETO EN EL SITIO ASIGNADO', 19428041, '2014-03-05', 19428041, '2014-03-05', 'NEAR MISS CERRADO CORRECTAMENTE\r\n', 19428041, '2014-03-05', 'CERRADO', 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `informe_secciones`
-- 

CREATE TABLE `informe_secciones` (
  `id` int(6) NOT NULL auto_increment,
  `informe_id` int(6) NOT NULL,
  `seccion_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=15 ;

-- 
-- Volcar la base de datos para la tabla `informe_secciones`
-- 

INSERT INTO `informe_secciones` VALUES (1, 1, 3);
INSERT INTO `informe_secciones` VALUES (2, 1, 7);
INSERT INTO `informe_secciones` VALUES (6, 2, 5);
INSERT INTO `informe_secciones` VALUES (5, 2, 1);
INSERT INTO `informe_secciones` VALUES (7, 3, 3);
INSERT INTO `informe_secciones` VALUES (8, 3, 6);
INSERT INTO `informe_secciones` VALUES (9, 4, 2);
INSERT INTO `informe_secciones` VALUES (10, 4, 5);
INSERT INTO `informe_secciones` VALUES (11, 5, 3);
INSERT INTO `informe_secciones` VALUES (12, 5, 9);
INSERT INTO `informe_secciones` VALUES (13, 6, 1);
INSERT INTO `informe_secciones` VALUES (14, 6, 6);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `morbilidad`
-- 

CREATE TABLE `morbilidad` (
  `id` int(6) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `personal_id` int(11) NOT NULL,
  `secciones_morb_id` int(6) NOT NULL,
  `patologia` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `amezulia` enum('SI','NO') collate utf8_spanish2_ci NOT NULL,
  `consulta_ext` enum('SI','NO') collate utf8_spanish2_ci NOT NULL,
  `reposos_ac_ec` enum('SI','NO') collate utf8_spanish2_ci NOT NULL,
  `reposo_at_eo` enum('SI','NO') collate utf8_spanish2_ci NOT NULL,
  `dias_perdido` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `observaciones` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `personal_reg_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `morbilidad`
-- 

INSERT INTO `morbilidad` VALUES (1, '2014-03-04', 19428040, 7, 'JDHZ', 'NO', 'SI', 'NO', 'SI', '5', 'KUSDBZX,CKIFD', 19428041);
INSERT INTO `morbilidad` VALUES (2, '2014-02-05', 22675834, 1, 'DFSCFG', 'NO', 'NO', 'SI', 'NO', '8', 'RDGFGH\r\n\r\n', 19428041);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `niveles`
-- 

CREATE TABLE `niveles` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `niveles`
-- 

INSERT INTO `niveles` VALUES (1, 'ADMINISTRADOR');
INSERT INTO `niveles` VALUES (2, 'CONSULTOR');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `perfil_seguridad`
-- 

CREATE TABLE `perfil_seguridad` (
  `id` int(6) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `pre1` varchar(255) collate utf8_spanish_ci NOT NULL,
  `res1` varchar(255) collate utf8_spanish_ci NOT NULL,
  `pre2` varchar(255) collate utf8_spanish_ci NOT NULL,
  `res2` varchar(255) collate utf8_spanish_ci NOT NULL,
  `pre3` varchar(255) collate utf8_spanish_ci NOT NULL,
  `res3` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `perfil_seguridad`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personal`
-- 

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(35) collate utf8_spanish_ci NOT NULL,
  `login` varchar(30) collate utf8_spanish_ci NOT NULL,
  `clave` varchar(32) collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `personal`
-- 

INSERT INTO `personal` VALUES (22675834, 'CARLOS ', 'PEREZ', 'carlos', 'e10adc3949ba59abbe56e057f20f883e', 1, 'ACTIVO');
INSERT INTO `personal` VALUES (19428040, 'JOSEFINA ', 'PAREDES', 'josefina', 'e10adc3949ba59abbe56e057f20f883e', 1, 'ACTIVO');
INSERT INTO `personal` VALUES (19428041, 'DUVERLIS', 'DELGADO', 'duverlis', 'e10adc3949ba59abbe56e057f20f883e', 1, 'ACTIVO');
INSERT INTO `personal` VALUES (21043088, 'RAYSA', 'PONSON', 'raysapon', 'e10adc3949ba59abbe56e057f20f883e', 1, 'ACTIVO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personal_datos`
-- 

CREATE TABLE `personal_datos` (
  `personal_id` int(11) NOT NULL,
  `cargo_id` int(6) NOT NULL,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tlf_fijo` varchar(11) collate utf8_spanish_ci default NULL,
  `tlf_movil` varchar(11) collate utf8_spanish_ci default NULL,
  `correo` varchar(50) collate utf8_spanish_ci default NULL,
  `foto` varchar(255) collate utf8_spanish_ci NOT NULL,
  `grado_instr` enum('PRIMARIA','SECUNDARIA','TECNICO MEDIO','TSU','UNIVERSITARIO','MAGISTER','ESPECIALISTA','DOCTOR','NINGUNO') collate utf8_spanish_ci NOT NULL,
  `gerencia_id` int(6) NOT NULL,
  `fecha_nac` date NOT NULL,
  PRIMARY KEY  (`personal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `personal_datos`
-- 

INSERT INTO `personal_datos` VALUES (22675834, 2, 'VALERA ESTADO TRUJILLO', '2717777777', '4248888888', 'carlos@gmail.com', '', 'UNIVERSITARIO', 3, '1973-03-16');
INSERT INTO `personal_datos` VALUES (19428040, 1, 'MARACAIBO SAN FRANCISCO', '2717777770', '4248888866', '', '', 'ESPECIALISTA', 4, '1980-01-04');
INSERT INTO `personal_datos` VALUES (19428041, 4, 'VALERA PLATA 3', '2712311780', '4247143021', 'duver1011@gmail.com', '', 'UNIVERSITARIO', 7, '1990-11-10');
INSERT INTO `personal_datos` VALUES (21043088, 16, 'CABIMAS', '2646351968', '4262093584', 'raysaponson@gmail.com', '', 'UNIVERSITARIO', 7, '1992-03-09');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `privilegios`
-- 

CREATE TABLE `privilegios` (
  `id` int(6) NOT NULL auto_increment,
  `pagina` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `acceso` enum('CONCEDER','DENEGAR') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=112 ;

-- 
-- Volcar la base de datos para la tabla `privilegios`
-- 

INSERT INTO `privilegios` VALUES (1, 'cambiar_clave.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (2, 'acciones.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (3, 'cargos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (4, 'causas.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (5, 'clases.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (6, 'condiciones.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (7, 'consmod_hhe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (8, 'consmod_incidentes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (9, 'consmod_informes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (10, 'consmod_morbilidad.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (11, 'consmod_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (12, 'empresas.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (13, 'equipos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (14, 'evaluacion_informe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (15, 'ficha_hhe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (16, 'ficha_incidentes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (17, 'ficha_informe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (18, 'ficha_morbilidad.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (19, 'ficha_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (20, 'gerencias.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (21, 'gestion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (22, 'grafico_incidentesxempresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (23, 'grafico_incidentesxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (24, 'grafico_morbilidadxgerencia.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (25, 'grafico_morbilidadxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (26, 'grafico_morbilidadxseccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (27, 'grafico_nearmissxequipo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (28, 'grafico_nearmissxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (29, 'grafico_nearmissxresp.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (30, 'grafico_nearmissxseccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (31, 'index.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (32, 'modificar_hhe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (33, 'modificar_incidentes.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (34, 'modificar_informe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (35, 'modificar_morbilidad.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (36, 'modificar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (37, 'negacion_usuario.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (38, 'niveles.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (39, 'observacion_informe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (40, 'privilegios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (41, 'regiones.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (42, 'registrar_hhe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (43, 'registrar_incidente.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (44, 'registrar_informe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (45, 'registrar_morbilidad.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (46, 'registrar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (47, 'retirar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (48, 'retirar_personal2.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (49, 'revisar_informe.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (50, 'rp_cons_hhexfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (51, 'rp_cons_incidentesxempresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (52, 'rp_cons_incidentesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (53, 'rp_cons_incidentesxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (54, 'rp_cons_morbilidadsxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (55, 'rp_cons_morbilidadxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (56, 'rp_cons_morbilidadxgerencia.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (57, 'rp_cons_morbilidadxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (58, 'rp_cons_morbilidadxseccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (59, 'rp_cons_nearmissxequipo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (60, 'rp_cons_nearmissxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (61, 'rp_cons_nearmissxresp.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (62, 'rp_cons_nearmissxseccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (63, 'rp_frm_hhexfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (64, 'rp_frm_incidentesxempresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (65, 'rp_frm_incidentesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (66, 'rp_frm_incidentesxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (67, 'rp_frm_morbilidadxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (68, 'rp_frm_morbilidadxgerencia.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (69, 'rp_frm_morbilidadxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (70, 'rp_frm_morbilidadxseccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (71, 'rp_frm_nearmissxequipo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (72, 'rp_frm_nearmissxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (73, 'rp_frm_nearmissxresp.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (74, 'rp_frm_nearmissxseccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (75, 'secciones.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (76, 'sqlelim.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (77, 'sqlguardar.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (78, 'sqlrespaldo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (79, 'status.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (80, 'tipos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (81, 'tipos_sec.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (82, 'ventana_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (83, 'xls_hhexfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (84, 'xls_incidentesxempresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (85, 'xls_incidentesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (86, 'xls_incidentesxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (87, 'xls_morbilidadxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (88, 'xls_morbilidadxgerencia.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (89, 'xls_morbilidadxpers.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (90, 'xls_morbilidadxseccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (91, 'xls_nearmissxequipo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (92, 'xls_nearmissxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (93, 'xls_nearmissxresp.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (94, 'xls_nearmissxseccion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (95, 'cambiar_clave.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (96, 'consmod_hhe.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (97, 'consmod_incidentes.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (98, 'consmod_informes.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (99, 'consmod_morbilidad.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (100, 'consmod_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (101, 'ficha_hhe.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (102, 'ficha_incidentes.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (103, 'ficha_informe.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (104, 'ficha_morbilidad.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (105, 'ficha_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (106, 'grafico_incidentesxempresa.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (107, 'grafico_incidentesxpers.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (108, 'grafico_morbilidadxgerencia.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (109, 'grafico_morbilidadxpers.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (110, 'secciones_morb.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (111, 'planilla.php', 1, 'CONCEDER');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `regiones_inc`
-- 

CREATE TABLE `regiones_inc` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `regiones_inc`
-- 

INSERT INTO `regiones_inc` VALUES (1, 'CABEZA/CARA');
INSERT INTO `regiones_inc` VALUES (2, 'CUELLO');
INSERT INTO `regiones_inc` VALUES (3, 'EXTREMIDADES SUPERIORES');
INSERT INTO `regiones_inc` VALUES (4, 'TRONCO');
INSERT INTO `regiones_inc` VALUES (5, 'EXTREMIDADES INFERIORES');
INSERT INTO `regiones_inc` VALUES (6, 'UBICACIONES MULTIPLES');
INSERT INTO `regiones_inc` VALUES (7, 'LESIONES GENERALES');
INSERT INTO `regiones_inc` VALUES (8, 'PARTE DEL CUERPO NO CLASIFICADO');
INSERT INTO `regiones_inc` VALUES (9, 'UBICACION NO ESPECIFICADA');
INSERT INTO `regiones_inc` VALUES (10, 'NINGUNA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `secciones`
-- 

CREATE TABLE `secciones` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `tipo_sec_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `secciones`
-- 

INSERT INTO `secciones` VALUES (1, 'TURBINAS', 1);
INSERT INTO `secciones` VALUES (2, 'MAQUINAS Y HERRAMIENTAS', 1);
INSERT INTO `secciones` VALUES (3, 'SOLDADURAS ESPECIALES', 1);
INSERT INTO `secciones` VALUES (4, 'NUEVAS TECNOLOGIAS', 1);
INSERT INTO `secciones` VALUES (5, 'GENERADORES', 1);
INSERT INTO `secciones` VALUES (6, 'MANTENIMIENTO', 1);
INSERT INTO `secciones` VALUES (7, 'ALMACEN', 1);
INSERT INTO `secciones` VALUES (8, 'LOGISTICA', 1);
INSERT INTO `secciones` VALUES (9, 'CONTROL DE CALIDAD', 1);
INSERT INTO `secciones` VALUES (10, 'OTROS', 1);
INSERT INTO `secciones` VALUES (11, 'MECANICA', 2);
INSERT INTO `secciones` VALUES (12, 'ELECTRICIDAD', 2);
INSERT INTO `secciones` VALUES (13, 'INSTRUMENTACION', 2);
INSERT INTO `secciones` VALUES (14, 'CIVIL', 2);
INSERT INTO `secciones` VALUES (15, 'ESTATICOS', 2);
INSERT INTO `secciones` VALUES (16, 'CONTROL DE CALIDAD', 2);
INSERT INTO `secciones` VALUES (17, 'OTROS', 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `secciones_morb`
-- 

CREATE TABLE `secciones_morb` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) character set utf8 collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=29 ;

-- 
-- Volcar la base de datos para la tabla `secciones_morb`
-- 

INSERT INTO `secciones_morb` VALUES (1, 'ALMACEN');
INSERT INTO `secciones_morb` VALUES (2, 'COMERCIAL');
INSERT INTO `secciones_morb` VALUES (3, 'CONTABILIDAD');
INSERT INTO `secciones_morb` VALUES (4, 'CONTROL DE CALIDAD');
INSERT INTO `secciones_morb` VALUES (5, 'EMECA');
INSERT INTO `secciones_morb` VALUES (6, 'GENERADORES');
INSERT INTO `secciones_morb` VALUES (7, 'GESTION DE LA CALIDAD');
INSERT INTO `secciones_morb` VALUES (8, 'LEGAL');
INSERT INTO `secciones_morb` VALUES (9, 'LOGISTICA');
INSERT INTO `secciones_morb` VALUES (10, 'MANTENIMIENTO');
INSERT INTO `secciones_morb` VALUES (11, 'MECANIZADO');
INSERT INTO `secciones_morb` VALUES (12, 'MERCADEO');
INSERT INTO `secciones_morb` VALUES (13, 'NUEVAS TECNOLOGIAS');
INSERT INTO `secciones_morb` VALUES (14, 'PROCURA');
INSERT INTO `secciones_morb` VALUES (15, 'PRODUCCION');
INSERT INTO `secciones_morb` VALUES (16, 'PROPUESTAS TECNICAS');
INSERT INTO `secciones_morb` VALUES (17, 'PROYECTOS MAYORES');
INSERT INTO `secciones_morb` VALUES (18, 'REAL STATE');
INSERT INTO `secciones_morb` VALUES (19, 'RRHH');
INSERT INTO `secciones_morb` VALUES (20, 'SERVICIO DE MANTENIMIENTO');
INSERT INTO `secciones_morb` VALUES (21, 'SOLDADURAS ESPECIALES');
INSERT INTO `secciones_morb` VALUES (22, 'SOPORTE TECNICO DE CAMPO');
INSERT INTO `secciones_morb` VALUES (23, 'SOPORTE TECNICO DE GENERADORES');
INSERT INTO `secciones_morb` VALUES (24, 'SOPORTE TECNICO DE MERCADEO');
INSERT INTO `secciones_morb` VALUES (25, 'SOPORTE TECNICO DE TURBINAS');
INSERT INTO `secciones_morb` VALUES (26, 'SSHA');
INSERT INTO `secciones_morb` VALUES (27, 'TURBINAS');
INSERT INTO `secciones_morb` VALUES (28, 'VENTAS');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipos_seccion`
-- 

CREATE TABLE `tipos_seccion` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `tipos_seccion`
-- 

INSERT INTO `tipos_seccion` VALUES (1, 'TALLER');
INSERT INTO `tipos_seccion` VALUES (2, 'CAMPO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipo_gestion`
-- 

CREATE TABLE `tipo_gestion` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `tipo_gestion`
-- 

INSERT INTO `tipo_gestion` VALUES (1, 'CALIDAD');
INSERT INTO `tipo_gestion` VALUES (2, 'AMBIENTE');
INSERT INTO `tipo_gestion` VALUES (3, 'SALUD Y SEGURIDAD OCUPACIONAL');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipo_incidentes`
-- 

CREATE TABLE `tipo_incidentes` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=20 ;

-- 
-- Volcar la base de datos para la tabla `tipo_incidentes`
-- 

INSERT INTO `tipo_incidentes` VALUES (1, 'GOLPEADO POR');
INSERT INTO `tipo_incidentes` VALUES (2, 'GOLPEADO CONTRA');
INSERT INTO `tipo_incidentes` VALUES (3, 'CAIDA DE OBJETOS');
INSERT INTO `tipo_incidentes` VALUES (4, 'CAIDA DE DIFERENTE NIVEL');
INSERT INTO `tipo_incidentes` VALUES (5, 'CAIDA DE UN MISMO NIVEL');
INSERT INTO `tipo_incidentes` VALUES (6, 'ATRAPADO EN, DEBAJO,ENTRE O POR');
INSERT INTO `tipo_incidentes` VALUES (7, 'CONTACTO CON OBJETOS FILOSOS O PUNZANTES');
INSERT INTO `tipo_incidentes` VALUES (8, 'CONTACTO CON CORRIENTE ELECTRICA');
INSERT INTO `tipo_incidentes` VALUES (9, 'CONTACTO CON SUSTANCIAS NOCIVAS');
INSERT INTO `tipo_incidentes` VALUES (10, 'CONTACTO  CON TEMPERATURAS EXTREMAS');
INSERT INTO `tipo_incidentes` VALUES (11, 'MOLESTIA MUSCULAR');
INSERT INTO `tipo_incidentes` VALUES (12, 'ESFUERZOS EXCESIVOS O MOVIMIENTOS VIOLENTOS');
INSERT INTO `tipo_incidentes` VALUES (13, 'MORDIDO O PICADO');
INSERT INTO `tipo_incidentes` VALUES (14, 'EXPLOSION');
INSERT INTO `tipo_incidentes` VALUES (15, 'CONTACTO CON SUSTANCIAS RADIOACTIVAS');
INSERT INTO `tipo_incidentes` VALUES (16, 'FRICCION');
INSERT INTO `tipo_incidentes` VALUES (17, 'INCENDIO');
INSERT INTO `tipo_incidentes` VALUES (18, 'VEHICULAR');
INSERT INTO `tipo_incidentes` VALUES (19, 'OTRA FORMA DE ACCIDENTE NO CLASIFICADO');
