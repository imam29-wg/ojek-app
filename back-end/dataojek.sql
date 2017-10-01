drop table if exists profil;
create table profil(
  ID INT,
  Name VARCHAR(50),
  Username VARCHAR(50),
  Email VARCHAR(50),
  Password VARCHAR(50),
  Phone VARCHAR(50),
  Driver INT,
  primary key (ID)
);
insert into profil values('1','Pikachu Smith', 'pikapikapikachu', 'pikachu@pokemonworld.net', 'pokepokemon', '089900990099', 1);
insert into profil values('2','Paul Sitanggang', 'paulcuk', 'paulcuk@yahoo.com', 'poletarism', '081208120812', 0);
insert into profil values('3', 'Poke John', 'johntol', 'johntol@gmail.com', '12341234', '081208130814', 1);

drop table if exists pref_location;
create table pref_location(
	ID INT,
	Location VARCHAR(50),
	primary key (ID, Location),
	foreign key (ID) references profil (ID)
);
insert into pref_location values('1','Saffron City');
insert into pref_location values('1','Pewter City');
insert into pref_location values('3','Pewter City');

drop table if exists history;
create table history(
	ID_Cust INT,
	Source VARCHAR(50),
	Dest VARCHAR(50),
	ID_Driver INT,
	Order_Date Date,
	Rating INT,
	Comment VARCHAR(140),
	primary key (ID_Cust, ID_Driver),
	foreign key (ID_Cust) references profil (ID),
	foreign key (ID_Driver) references profil (ID)
);
insert into history values('2','Saffron City', 'Pewter City', '1', '2017-01-10', '4', 'mantap ojeknya');
insert into history values('1','Saffron City', 'Pewter City', '3', '2017-01-10', '2', 'mamangnya bau');
