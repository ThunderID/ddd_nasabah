HOW TO USE

1. Copy this folder under app folder
2. Place Service Provider on config/app.php 
	App\Nasabah\NasabahServiceProvider::class,
3. Run command 
	php artisan vendor:publish --provider="App\Nasabah\NasabahServiceProvider"
4. Run migration 
5. To test this function, please use everything needed in tests folder