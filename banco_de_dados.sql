CREATE DATABASE cervejaria;

use cervejaria;

CREATE TABLE usuarios (
  id_usuario int(11) AUTO_INCREMENT primary key,
  nome varchar(30),
  telefone varchar(30),
  email varchar(40),
  senha varchar(32)
) 

CREATE TABLE produtos (
  id_produto int(11) AUTO_INCREMENT primary key,
  nome varchar(30),
  qtd_estoque int(10),
  preco_venda varchar(10),
  percentual_comissao int(10),
  formula_producao varchar(250)
) 

CREATE TABLE funcionarios (
  id_funcionario int(11) AUTO_INCREMENT primary key,
  nome varchar(30),
  data_admissao date,
  numero_ctps varchar(15),
  cpf varchar(14),
  endereco varchar(80),
  telefone varchar(30),
  email varchar(40)
) 

CREATE TABLE clientes (
  id_cliente int(11) AUTO_INCREMENT primary key,
  razao_social varchar(50),
  cnpj varchar(20),
  email varchar(40),
  endereco varchar(80),
  telefone varchar(30),
  nome_representante varchar(40)
) 

