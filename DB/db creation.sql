create database mapaches;

create table category (
  id int primary key auto_increment,
  description varchar(100) not null,
  created_at datetime not null default NOW(),
  modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

create table candidate (
  id int primary key auto_increment,
  id_category int not null,
  name varchar(100) not null,
  photo TEXT not null,
  created_at datetime not null default NOW(),
  modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  foreign key (id_category) references category(id) on delete cascade
);

create table vote (
  id int primary key auto_increment,
  id_candidate int not null,
  created_at datetime not null default NOW(),
  modified_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  foreign key (id_candidate) references candidate(id) on delete cascade
);