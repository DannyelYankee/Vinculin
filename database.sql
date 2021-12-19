-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 19-12-2021 a las 21:51:56
-- Versión del servidor: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Acceso`
--

CREATE TABLE `Acceso` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(64) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `Exito` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Acceso`
--

INSERT INTO `Acceso` (`id`, `Usuario`, `fecha`, `Exito`) VALUES
(1, 'intruso@intrusivo.com', '2021-12-18 22:59:20', 0),
(2, 'email@falso.com', '2021-12-18 22:59:57', 0),
(3, 'martin44@hotmail.es', '2021-12-18 23:01:36', 0),
(4, 'angela00@gmail.com', '2021-12-18 23:11:40', 0),
(5, 'fchtfct@ijugniafjm.com', '2021-12-18 23:53:15', 0),
(6, 'nodal@gmail.com', '2021-12-19 18:01:18', 0),
(7, 'daniel.juape@gmail.com', '2021-12-19 18:01:34', 0),
(8, 'pepe@ejemplo.com', '2021-12-19 18:09:46', 0),
(9, 'nodal@gmail.com', '2021-12-19 18:10:01', 1),
(10, 'nodal@gmail.com', '2021-12-19 18:27:25', 0),
(11, 'nodal@gmail.com', '2021-12-19 18:27:31', 1),
(12, 'nodal@gmail.com', '2021-12-19 18:30:12', 1),
(13, 'nodal@gmail.com', '2021-12-19 19:49:19', 1),
(14, 'nodal@gmail.com', '2021-12-19 19:55:50', 1),
(15, 'nodal@gmail.com', '2021-12-19 20:01:40', 1),
(16, 'nodal@gmail.com', '2021-12-19 20:33:56', 1),
(17, 'nodal@gmail.com', '2021-12-19 20:52:15', 1),
(18, 'nodal@gmail.com', '2021-12-19 21:00:07', 1),
(19, 'angela00@gmail.com', '2021-12-19 21:02:24', 0),
(20, 'angela00@gmail.com', '2021-12-19 21:02:31', 0),
(21, 'angela00@gmail.com', '2021-12-19 21:02:42', 0),
(22, 'martin44@hotmail.es', '2021-12-19 21:03:37', 0),
(23, 'nodal@gmail.com', '2021-12-19 21:04:10', 0),
(24, 'nodal@gmail.com', '2021-12-19 21:04:15', 1),
(25, 'nodal@gmail.com', '2021-12-19 21:05:32', 1),
(26, 'nodal@gmail.com', '2021-12-19 21:07:11', 1),
(27, 'angela00@gmail.com', '2021-12-19 21:40:08', 0),
(28, 'castro@gmail.com', '2021-12-19 21:40:21', 0),
(29, 'castro@gmail.com', '2021-12-19 21:40:51', 1),
(30, 'angela00@gmail.com', '2021-12-19 21:40:57', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleo`
--

CREATE TABLE `Empleo` (
  `id` int(11) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Empresa` varchar(50) NOT NULL,
  `Localidad` varchar(25) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Empleo`
--

INSERT INTO `Empleo` (`id`, `Email`, `Titulo`, `Empresa`, `Localidad`, `Descripcion`) VALUES
(1, 'angela00@gmail.com', 'Adminitrativo', 'Consultoria Financiera', 'Bilbao', 'Buscamos incorporar a una persona en el equipo de servicios administrativos. La misión del puesto seria apoyar en el área de servicios administrativos a empresas y profesionales del trabajo autónomo.\r\n\r\nJornada completa de lunes a viernes (jornada intensiva los viernes). Contrato de 6 meses de duración, con posibilidad de transformación en indefinido. Incorporación inmediata. '),
(2, 'angela00@gmail.com', 'Manager de logistica', 'Empresa de transporte y logística', 'Santurtzi', 'Empresa consolidada en el sector del transporte y la logística, con alta especialización en la última milla, busca actualmente MANAGER para su delegación de Bilbao.\r\n\r\n\r\nReportando a la Dirección de Operaciones será el/la máximo/a responsable en la gestión de la delegación y su ámbito geográfico de transporte.\r\n\r\n\r\nTu principal objetivo será asegurar el crecimiento sostenible de la misma, en términos de rentabilidad y calidad, potenciando la cartera de clientes e identificando nuevos mercados potenciales, liderando al equipo a su cargo y supervisando cada una de sus áreas. Además de apoyar al Dirección de Operaciones y Dirección Comercial en sus competencias.'),
(3, 'angela00@gmail.com', 'Dependiente/a', 'MANGO', 'Bilbao', 'En la tienda, tratarás siempre amablemente a los clientes, estarás dispuesto/a a aconsejarles e informarles de forma que queden satisfechos.\r\n\r\nAsimismo, participarás en mantener la buena imagen de la tienda.\r\n\r\n¿Eres entusiasta, necesitas estar siempre en activo y rodeado/a de gente? ¿Te apasiona el mundo de la moda y te encanta aconsejar a los clientes? ¿Deseas formar parte de un equipo y ayudarnos a conseguir nuestros objetivos comerciales?\r\n\r\nValoraremos experiencia en un puesto similar.\r\n\r\nCon disponibilidad para incorporación inmediata.'),
(4, 'daniel12@gmail.com', 'Auxiliar de Sala', 'DOMINOS PIZZA', 'Bilbao', 'Se busca personal para interior, con formación completa a nuestro cargo.\r\n\r\nNo necesaria experiencia, perfecto para compaginar con otras actividades.\r\n\r\n15h/semanales mínimas.\r\n\r\n¿Estás interesado/a? ¡Únete a nuestro equipo! '),
(5, 'daniel12@gmail.com', 'Servicio de Atención al Cliente', 'MediaMarkt', 'Barakaldo', 'Media Markt, empresa líder en distribución de electrónica de consumo, precisa incorporar personal en Pinto.\r\n\r\n¡Si eres una persona dinámica, con pasión por las nuevas tecnologías, la venta y el servicio al cliente, es tu oportunidad!\r\n\r\nSus Principales Responsabilidades Serán:\r\n\r\nImplementar las acciones necesarias para asegurar una correcta organización, coordinación y ejecución en materia de atención al cliente y postventa así como de desarrollo de personal y básicos en su área de acuerdo con los valores y cultura de Media Markt.'),
(6, 'pepito22@hotmail.com', 'Junior Data Analyst', 'Amazon', 'Barcelona', 'At Amazon, we re working to be the most customer-centric company on earth. Operations is at the heart of what we do, delivering hundreds of thousands of items each day and fulfilling customer orders from all over the world. You will have the opportunity to support operations to improve and monitoring Customer Experience metrics for Vendor Flex sites across Europe. We seek a strong candidate that can prioritize well, communicate clearly, and has a consistent track record of delivery.\r\n\r\nYou must have the experience and capability to partner with other teams to ensure providing insightful callouts, support and suggested actions to the Operations teams and their stakeholders. You will be responsible of providing added value reports on Transportation, DEA, Inventory Quality, Concessions and other Customer Experience (CX) KPIs at an EU level. You will monitor and action CX issues impacting the network. A key to influencing shareholders is to have the ability to solve complex, technical problems with simple, innovative and practical solutions. Excellent written and verbal communication skills are essential.'),
(7, 'fernando38@gmail.com', 'Atencion al Cliente', 'IKEA', 'Madrid', 'En IKEA consideramos que todas las personas tienen un talento que ofrecer. Buscamos personas que empaticen con los clientes, compartan nuestros valores y estén dispuestos a probar nuevos retos. Si contagias sonrisas, te encanta escuchar y disfrutas ayudando a los demás, trae tu talento a ATENCIÓN AL CLIENTE. \r\n\r\nDesde IKEA tenemos el compromiso de hacer un mejor día a día para la mayoría de las personas. Todos los colaboradores/as de IKEA disfrutan de un amplio paquete de beneficios que están a tu disposición desde el primer día, aquí te contamos alguno de ellos:\r\nOfrecemos un salario competitivo distribuido en 12 pagas anuales más 2 pagas extras en los meses de julio y diciembre, con un amplio abanico de horarios en jornada continua con los descansos que establece la ley, respetando tú tiempo libre fuera de IKEA.\r\n\r\nPara que disfrutes al máximo de tus descansos, en nuestro comedor de empleados puedes encontrar gran variedad de productos a precios muy económicos, subvencionados en 2/3 por IKEA.\r\n\r\nPorque la confianza de trabajar en un lugar seguro es la base para nuestro crecimiento personal y profesional, en IKEA contamos con un servicio médico a tu disposición para cualquier consulta. Además de ofrecer un entorno de trabajo seguro para garantizar unas buenas condiciones de trabajo. '),
(8, 'martin44@hotmail.es', 'Jefe/a de Administracion', 'Vincci Hoteles', 'Bilbao', 'En Vincci Hoteles seleccionamos a un/a JEFE/A de ADMINISTRACIÓN para nuestro Hotel Vincci Consulado de Bilbao 4*, ubicado en el centro de la ciudad.\r\n\r\nApostamos por ofrecer un turismo de calidad, responsable y sostenible, en el que nuestros equipos se desarrollan en un ambiente de igualdad, compañerismo y dinamismo.\r\n\r\nEntendemos la gestión y la promoción del talento como acciones clave para propiciar el éxito en las estancias de nuestros clientes, transformándolas en experiencias únicas.\r\n\r\nTrabajamos diariamente para favorecer el desarrollo de nuestros equipos, fomentar su evolución en la cadena y generar nuevas oportunidades de empleo gracias a la expansión a nuevos destinos turísticos.\r\n\r\n¿Nuestro reto? Continuar creciendo junto a ti, apostando por un aprendizaje mutuo que nos permita mejorar día a día nuestros estándares de calidad y procesos de trabajo, con la misma pasión de siempre.\r\n\r\nSi quieres aprender, desarrollarte y disfrutar en tu entorno laboral… ¡TE ESTAMOS ESPERANDO!'),
(9, 'martin44@hotmail.es', 'Store Manager', 'ECI Bilbao', 'Bilbao', 'Para formar parte del equipo de liderazgo en nuestro corner de El Corte Ingles Bilbao estamos buscando un/a Store Manager. Esta figura es el/la Brand Ambassador Camper fundamental para nuestro negocio, ya que es la persona a quien se delega la responsabilidad de la gestión de los corners de Bilbao, Vitoria y Pamplona, y de la cual depende el éxito de nuestra marca.\r\n\r\nCamper está comprometida con los principios de igualdad de género y diversidad. Estamos comprometidos con la lucha contra la discriminación en cualquiera de sus formas. Valoramos las diferencias que la diversidad aporta a nuestra marca y las promovemos como parte de los valores de nuestra empresa.\r\n\r\nNuestro objetivo es proporcionar un entorno de trabajo seguro, que fomente la inclusión, la justicia, la igualdad y el respeto por la diversidad social y cultural, libre de discriminación y acoso laboral.\r\n\r\nNuestro proceso de selección acepta las candidaturas sin distinción de género, orientación sexual, edad, raza, etnia, estado de discapacidad o cualquier otra característica protegida por la ley.'),
(10, 'martin44@hotmail.es', 'Ingeniero/a Industrial', 'Adecco', 'Sestao', 'Se requiere persona con experiencia en industrial y que posea una ingeniería industrial con especialidad mecánica o eléctrica.\r\n\r\nSe valorará el conocimiento de herramientas de planificación, conocimiento de máquinas, fluidos, energías, obra civil...\r\n\r\nTus Funciones Serán\r\n\r\n    Elaboración de especificaciones técnicas para sacar a concurso.\r\n    Análisis técnico de las ofertas.\r\n    Elaboración de informe técnico de comparación entre ofertas.\r\n    Soporte técnico al departamento de Compras hasta la adjudicación.\r\n    Seguimiento de los trabajos - in situ- priorizando la seguridad.\r\n    Elaboración de informes de seguimiento.\r\n    Seguimiento de la planificación.\r\n    Control de calidad para asegurar que los trabajos cumplen con las especificaciones, y éstas con los requerimientos de la instalación.\r\n    Seguimiento del coste, cumpliendo el presupuesto.\r\n    Coordinación. Coherencia entre proyectos mecánicos y eléctricos que actuarán sobre la misma instalación.\r\n\r\nResponsabilidades\r\n\r\nContrato laboral de 6 meses a través de Adecco con posibilidad de incorporación a la empresa pasado este tiempo.\r\n\r\nSalario 35.000-40.000 € brutos anuales.\r\n\r\nHorario: 5 turnos rotativos.\r\n\r\nDisponibilidad para incorporación inmediata. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `NombreApellidos` varchar(100) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Banco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`NombreApellidos`, `Email`, `Contraseña`, `DNI`, `FechaNacimiento`, `Telefono`, `Banco`) VALUES
('Angela Gonzalez', 'angela00@gmail.com', '$2y$10$lECdgYMulvoveM4H7RMULOYT89Y6IUBVV.DNOn/OI3F9FU7S1.EgK', '79051579-G', '1999-12-01', 123456789, 'GrwV0dzGpLUGaRgMCESnpTeLu7c='),
('Cristian Castro', 'castro@gmail.com', '$2y$10$zSkhp340dDKmFRKp9H0QiurSjCtcDDoPuEUvftV7kXPIfYnDcLYby', '79177539-Q', '1974-12-08', 638097085, 'GrwV0dzGpLUGaRgMCESnpTeLu7c='),
('Fernando Fernandez', 'fernando38@gmail.com', '$2y$10$MgDhj5uyYU.zTEmMg4NCmerRCRCG1kRV892rflGhgCKSRghl0Og66', '79177539-Q', '2021-12-06', 123456789, 'GrwV0dzGpLUGaRgMCESnpTeLurU='),
('Luis Miguel', 'luis@gmail.com', '$2y$10$BNtk4ETaQnBMnXM0kJlJp.cnTtvAo2QJesLXas4su8fAt0/X.56eq', '79177539-Q', '1970-04-19', 638097085, 'GrwV0dzGpLUGaRgMCESnpTeLu7c='),
('Martin Martinez', 'martin44@hotmail.es', '$2y$10$a/IQuwbBC9.O7goxerTrT.MPFO9.DfeczTGNlql65ghKtf0tGmIQu', '79177539-Q', '2021-12-07', 123456789, 'GrwQ0dzGpLUGaRgMCESnpTeLu7c='),
('Pepito Grillo', 'pepito22@hotmail.com', '$2y$10$.0io6W9wGljtBbDDR9NMO.msKda/bJLwsIrgB/b6/B8lNd4ND91kG', '79177539-Q', '2021-11-02', 123456789, 'GrwV0dzGpLUGaRgMCESipjeLu7c=');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Acceso`
--
ALTER TABLE `Acceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Empleo`
--
ALTER TABLE `Empleo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Acceso`
--
ALTER TABLE `Acceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `Empleo`
--
ALTER TABLE `Empleo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
