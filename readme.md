##HOW TO USE##

1. Copy this folder under app folder
2. Place Service Provider on config/app.php 

		App\Nasabah\NasabahServiceProvider::class,

3. Run command 

		php artisan vendor:publish --provider="App\Nasabah\NasabahServiceProvider"

4. Run migration 
5. To test this function, please use everything needed in tests folder


##FOLDER STRUCTURE##
###CQRS (Considered as service)###
	Accessible from Presentation layer. Collaborating middleware (authorization) and repositories.
		
		`https://github.com/chelsymooy/ddd_nasabah/blob/master/CQRS/NasabahService.php`	

###Entities###
	Business Entities. Accessible from everywhere, normally called in repository.

		`https://github.com/chelsymooy/ddd_nasabah/blob/master/Entities/Nasabah.php`

###Middlewares###
	Going to be used as authorization policies.

###ORM###
	Contains eloquent models, transformers from eloquents to entities, and Implementation of repo interface.
	If the this domain use ODM, then this one won't be used.

		`https://github.com/chelsymooy/ddd_nasabah/tree/master/ORM`

###Repositories###
	Only contains basic iface repo class going to be called in service (CQRS).

		`https://github.com/chelsymooy/ddd_nasabah/blob/master/Repositories/InterfaceRepositoryNasabah.php`

###ValueObjects###
	Something going to be used generally (normally used by entities).

###database###
	Contain migrations, perhaps going to be placed inside orm ?
	
###tests###
	Going to enhance this by using php test, so far, it's presentation test.

###NasabahServiceProvider###
	So, here is where every needed configuration placed. And the main function of SP, is... BINDING Repositories Interfaces to ORM Repositories / whatsoever the driver might be.

		`https://github.com/chelsymooy/ddd_nasabah/blob/master/NasabahServiceProvider.php`
