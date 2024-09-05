use App\Http\Controllers\WeatherController;

Route::get('/', [WeatherController::class, 'index']);