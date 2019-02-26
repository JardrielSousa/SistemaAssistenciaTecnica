create database assistenciatecnica
use assistenciatecnica

create table CadClientes(
idCliente int auto_increment not null , 
nome varchar(50) not null , 
cpf int (11) unique ,
telefone int(11) not null unique, 
email varchar(50) not null unique,
endereco varchar(100) not null , 
complemento varchar(100), 
bairro varchar(100) not null,
primary key(idCliente));


create table CadMaterial(
idMaterial int auto_increment not null ,
nome varchar (150) not null ,
tipo varchar (150) not null ,
quantidade int not null ,
valorCompra double not null ,
valorVenda double not null ,
primary key(idMaterial)
);

create table CadServico(
idServico int auto_increment not null ,
idMaterial int not null ,
tipoServico varchar(150) not null ,
valorServico double not null ,
primary key (idServico) ,
foreign key(idMaterial) references CadMaterial(idMaterial));

create table OrdensDeServicos(
idOS int auto_increment not null ,
idCliente int not null ,
idMaterial int not null ,
idServico int not null ,
primary key(idOS),
foreign key(idCliente) references CadClientes(idCliente),
foreign key(idMaterial) references CadMaterial(idMaterial),
foreign key(idServico) references CadServico(idServico)
);

insert into CadClientes(nome,cpf,telefone,email,
endereco,complemento,bairro) values ( "jardriel " ,1111111111, "85528894" ,"jardriel.redes18","rua 01 " ,
 "apt 103" , "centro");

insert into CadClientes(nome,cpf,telefone,email,
endereco,complemento,bairro) values ( "mae " ,22222222222, "85747989" ,"sandramaria@gmail.com","rua 01 " ,
 "apt 103" , "centro"); 
 
 insert into CadMaterial ( nome , tipo , quantidade , valorCompra,
 valorVenda)values("NoteBook Positivo" , "Modelo 467" , '2',
 '1200','1500')
 
  insert into CadMaterial ( nome , tipo , quantidade , valorCompra,
 valorVenda)values("teclados oak" , "slim" , '5',
 '80','100')
 
insert into CadServico ( tipoServico , valorServico , 
idMaterial)values("manutencao",100.00,1); 
 
insert into CadServico ( tipoServico , valorServico , 
idMaterial)values("revisao",10.00,2);

insert into OrdensDeServicos(idCliente,IdMaterial,IdServico)
values(1,1,1)





select * from CadClientes
select * from CadMaterial
select * from CadServico

alter table CadClientes 
add column cpf varchar = 11111111111 where idCliente='1';

select nome,tipo , tipoServico , valorServico from
CadMaterial , CadServico where CadMaterial.idMaterial =
CadServico.idServico

select nome , telefone , email , idServico , idMaterial
from CadClientes , OrdensDeServicos  where 
CadClientes.idCliente = OrdensDeServicos.IdCliente

select CadClientes.nome as NomeClientes , CadMaterial.nome as
NomeMaterial,tipoServico,valorServico,tipo as tipoMaterial, valorCompra from 
CadClientes,OrdensDeServicos,CadServico,CadMaterial where
 OrdensDeServicos.idServico = CadServico.idServico
and OrdensDeServicos.idMaterial = CadMaterial.idMaterial
and OrdensDeServicos.idCliente = CadClientes.idCliente




