--Persona

INSERT INTO persona (dni, nombre, apellidos, telefono, direccion, ciudad, email)
VALUES ('78945673B', 'Josu', 'Garcia Marquez', '67584392', 'Carretera Barna,14', 'Barcelona','josumar@gmail.com'),
('32145676C', 'Sara', 'Garcia Saez', '67543122', 'Avenida central,9', 'Barcelona','saragar@gmail.com'),
('44564683F', 'Tamara', 'Sojo Puente', '63343177', 'Avenida central,12', 'Barcelona','tamaraso@gmail.com')
('56373478F', 'Mikel', 'Alberti Soiz', '63475632', 'Barrio del Sol,37', 'Barcelona','mikelalb@gmail.com'),
('56347296Y', 'Marta', 'Alberti Soiz', '63475142', 'Barrio de Granada,102', 'Barcelona','martaalb@gmail.com');

--Coordinador
INSERT INTO coordinador (idcoordinador, persona)
VALUES (1,'78945673B'),(2,'32145676C');

--Voluntario

INSERT INTO voluntario (horas, idvoluntario,persona)
VALUES (210,1,'44564683F'),(437,2,'56373478F'),(78,3,'56347296Y');