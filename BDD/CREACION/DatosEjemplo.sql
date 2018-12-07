use volunta1;

INSERT INTO persona (dni, nombre, apellidos, telefono, direccion, ciudad, email,usuario,contrasenya)
VALUES ('78945673B', 'Josu', 'Garcia Marquez', '67584392', 'Carretera Barna,14', 'Barcelona','josumar@gmail.com',"admin","amin"),
('32145676C', 'Sara', 'Garcia Saez', '67543122', 'Avenida central,9', 'Barcelona','saragar@gmail.com',"admin2","admin2"),
('44564683F', 'Tamara', 'Sojo Puente', '63343177', 'Avenida central,12', 'Barcelona','tamaraso@gmail.com',"tamara","tamara"),
('56373478F', 'Mikel', 'Alberti Soiz', '63475632', 'Barrio del Sol,37', 'Barcelona','mikelalb@gmail.com',"mikel","mikel"),
('56347296Y', 'Marta', 'Alberti Soiz', '63475142', 'Barrio de Granada,102', 'Barcelona','martaalb@gmail.com',"marta","marta");


INSERT INTO coordinador (idcoordinador, persona)
VALUES (1,'78945673B'),(2,'32145676C');


INSERT INTO voluntario (horas, idvoluntario,persona)
VALUES (210,1,'44564683F'),(437,2,'56373478F'),(78,3,'56347296Y');


INSERT INTO lugar (idlugar, nombre,longitud,latitud)
VALUES (1,'Parque de la Ciudadela',41.387650, 2.188079),(2,'Plaza de Tetuan',41.394893, 2.175480),(3,'Jardins del Bosquet dels Encants',41.401700, 2.185761);


INSERT INTO evento (idevento,coordinador,voluntario,lugar,nombre,tipo,estado)
VALUES (1,1,1,1,'Concierto benéfico','Concierto',true),(2,1,2,2,'Carrera recaudación','Carrera',true),(3,2,2,1,'Otros','Charla informativa',true);


INSERT INTO evento_voluntario (voluntario,evento)
VALUES (1,1),(2,2),(2,3);


INSERT INTO incidencia (idincidencia,voluntario,evento,tipoIncidencia,detalleIncidencia)
VALUES (1,1,1,'Materiales','La mesa de mezclas no funcionaba correctamente. Posiblemente sea la entrada del micrófono'),(2,1,2,'Materiales','Faltaron 20 dorsales'),(3,2,1,'Materiales','Pocas sillas para mucha gente');


