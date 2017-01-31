HOW TO USE

1. Copy this folder under app folder
2. Place Service Provider on config/app.php 
	App\Nasabah\NasabahServiceProvider::class,
3. Run command 
	php artisan vendor:publish --provider="App\Nasabah\NasabahServiceProvider"
4. Run migration 
5. To test this function, please use everything needed in tests folder


FOLDER STRUCTURE
A. 	CQRS (Considered as service)
	Accessible from Presentation layer. Collaborating middleware (authorization) and repositories.
		
		Contoh : https://github.com/chelsymooy/ddd_nasabah/blob/master/CQRS/NasabahService.php	

B. 	Entities
	Business Entities. Accessible from everywhere, normally called in repository.

		Contoh : https://github.com/chelsymooy/ddd_nasabah/blob/master/Entities/Nasabah.php	

C.	Middlewares
	Going to be used as authorization policies.

D.	ORM
	Contains eloquent models, transformers from eloquents to entities, and Implementation of repo interface.
	If the this domain use ODM, then this one won't be used.

		Contoh : https://github.com/chelsymooy/ddd_nasabah/tree/master/ORM	

E.	Repositories
	Only contains basic iface repo class going to be called in service (CQRS).

		Contoh : https://github.com/chelsymooy/ddd_nasabah/blob/master/Repositories/InterfaceRepositoryNasabah.php	

F.	ValueObjects
	Something going to be used generally (normally used by entities).

G.	database
	Contain migrations, perhaps going to be placed inside orm ?
	
H. 	tests
	Going to enhance this by using php test, so far, it's presentation test.

I.	NasabahServiceProvider
	So, here is where every needed configuration placed. And the main function of SP, is... BINDING Repositories Interfaces to ORM Repositories / whatsoever the driver might be.

		Contoh : https://github.com/chelsymooy/ddd_nasabah/blob/master/NasabahServiceProvider.php	
