# Volunta

#Extensiones VisualCode:

Para poder lanzar las pruebas unitarias es necesario tener la web en un hosting o simularlo mediante una extensión para probar servidores. En nuestro caso, para las pruebas utilizamos "https://github.com/ritwickdey/vscode-live-server", el cual nos levanta un servidor contra el que se lanzan las pruebas en "http://127.0.0.1:5500/" 

#Dependencias globales:

npm install

#Dependencias base de datos:

npm install -g json-server

Para lanzar la base de datos ir a ./APIJSON y lanzar json-server --watch db.json a través de la consola.

#Dependencias Cypress (pruebas unitarias):

cd Volunta\node_modules\.bin> .\cypress install

Para lanzar los test .\cypress open (Lanza una aplicación Electron externa)