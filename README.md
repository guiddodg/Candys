# Candys

setting up the enviorement - app

docker compose up -d --build

docker ps

docker exec -it (id container php) bash

#...symfony: composer install // u have to install all the dependencies before start

docker exec -it (id container mysql) mysql -uroot -proot

mysql> use symfony_db;
mysql> select * from tipo_movimiento;

if tipo movimiento is empty u have to run the next query

mysql> insert into tipo_movimiento values (1,'Compra'),(2,'Venta'),(3,'Ajuste')


--urls

http://localhost:8001/articulos all articles

http://localhost:8001/articulos/1/movimientos movs of particular article

--endpoints

all articles: (get)
localhost:8001/articulo 

get article by Id (get)
localhost:8001/articulo/{id}

new article (post)
localhost:8001/articulo 
(numero,descripcion,cantidad in request)

buy article (post)
localhost:8001/articulo/compra 
(articulo,cantidad in request)

sell article (post)
localhost:8001/articulo/venta 
(articulo,cantidad in request)

adjust stock from article (post)
localhost:8001/articulo/ajustar 
(articulo,cantidad in request)
