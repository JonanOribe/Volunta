# Volunta
<a href="https://codeclimate.com/github/JonanOribe/Volunta/test_coverage"><img src="https://api.codeclimate.com/v1/badges/95e1fb24c1b71008f5a2/test_coverage" /></a>
<a href="https://codeclimate.com/github/JonanOribe/Volunta/maintainability"><img src="https://api.codeclimate.com/v1/badges/95e1fb24c1b71008f5a2/maintainability" /></a>

#Presentación:

Wireframes en: https://github.com/JonanOribe/Volunta/blob/master/Wireframe/Home_Coordinador.png

Capturas de la aplicación en: https://github.com/JonanOribe/Volunta/tree/master/Wireframe/Vistas

#Extensiones VisualCode:

Para poder lanzar las pruebas unitarias es necesario tener la web en un hosting o simularlo mediante una extensión para probar servidores. En nuestro caso, para las pruebas utilizamos "https://github.com/ritwickdey/vscode-live-server", el cual nos levanta un servidor contra el que se lanzan las pruebas en "http://127.0.0.1/" 

#Dependencias globales:

npm install

#Dependencias Cypress (pruebas unitarias):

Levantar servidor con la extensión Live Server

Instalamos cypress navegando a: ./node_modules/.bin donde ejecutamos "cypress install"

Para lanzar los test ./cypress open (Lanza una aplicación Electron externa)

Hacer click sobre la pantalla Electron en la carpeta testUnitarios y luego en el archivo testArranque.spec.js
