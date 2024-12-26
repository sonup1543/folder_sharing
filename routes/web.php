<?php

/* Admin Controller  */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController; 
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CsBuTrackerController;
use App\Http\Controllers\CsprofileController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\EmpFileManagerController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

/* Admin Routes  */

Route::group(['middleware' =>['auth'], 'prefix'=> 'admin'], function(){
    
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
Route::post('/dashboard', 'DashboardController@store')->name('dashboard.store');

Route::post('/profiles', 'ProfileController@store')->name('profiles.store');
Route::get('/profiles/{id}/edit', 'ProfileController@edit')->name('profiles.edit');
Route::post('/profiles/getEmalid', 'ProfileController@getEmalid')->name('profiles.getEmalid');
Route::get('/profiles/{id}/changePassword', 'ProfileController@changePassword')->name('profiles.changePassword');
Route::post('/profiles/storeUserPassword', 'ProfileController@storeUserPassword')->name('profiles.storeUserPassword');

Route::get('departments/departmentList',                  [DepartmentController::class, 'departmentList'])->name('departments.departmentList');
Route::get('departments/createDepartment',                [DepartmentController::class, 'createDepartment'])->name('departments.createDepartment');
Route::post('/departments', 'DepartmentController@store')->name('departments.store');
Route::get('/departments/{id}/edit', 'DepartmentController@edit')->name('departments.edit');
Route::delete('/departments/{id}', 'DepartmentController@destroy')->name('departments.destroy');
Route::post('/departments/statusUpdate', 'DepartmentController@statusUpdate')->name('departments.statusUpdate');

Route::get('employees/employeeList',                  [EmployeeController::class, 'employeeList'])->name('employees.employeeList');
Route::get('employees/createEmployee',                [EmployeeController::class, 'createEmployee'])->name('employees.createEmployee');
Route::post('/employees', 'EmployeeController@store')->name('employees.store');
Route::get('/employees/{id}/edit', 'EmployeeController@edit')->name('employees.edit');
Route::delete('/employees/{id}', 'EmployeeController@destroy')->name('employees.destroy');
Route::post('/employees/statusUpdate', 'EmployeeController@statusUpdate')->name('employees.statusUpdate');

Route::get('/file-managers', [FileManagerController::class, 'fileManagerss'])->name('file-manager.index');

Route::get('/file-manager/assign/{folderId}', [FileManagerController::class, 'assignList'])->name('folder.assign.list');
Route::post('/file-manager/assign/{folderId}', [FileManagerController::class, 'assignUsers'])->name('folder.assign.users');
Route::delete('/file-manager/remove-assignment/{folderId}/{userId}', [FileManagerController::class, 'removeAssignment'])->name('folder.remove.assignment');


Route::post('/file-manager/folder', [FileManagerController::class, 'storeFolder'])->name('file-manager.storeFolder');
Route::get('/file-manager/{folders}/{id}', [FileManagerController::class, 'folderView'])
    ->where('folders', '([a-zA-Z0-9-_\/]+)')  
    ->name('file-manager.view');
Route::post('/file-manager/upload', [FileManagerController::class, 'folderDataStore'])->name('file.upload');

Route::post('/file-manager/folder/store', [FileManagerController::class, 'folderViewStore'])->name('file.storeFolder');

Route::post('/file-manager/copy', [FileManagerController::class, 'copyFile'])->name('file.copy');
Route::post('/file-manager/move', [FileManagerController::class, 'moveFile'])->name('file.move');
Route::post('/file-manager/rename', [FileManagerController::class, 'renameFileOrFolder'])->name('file.rename');
Route::post('/file-manager/delete', [FileManagerController::class, 'deleteFileOrFolder'])->name('file.delete');


Route::get('/get-child-folders/{parentId}', [FileManagerController::class, 'getChildFolders'])->name('file.childname');
Route::get('/get-folder-breadcrumb/{parentId}', [FileManagerController::class, 'getFolderBreadcrumb'])->name('file.breadcrumn');

Route::get('/download/file/{filePath}', [FileManagerController::class, 'downloadFile'])->name('file.download');
Route::get('/download/folder/{folderPath}', [FileManagerController::class, 'downloadFolder'])->name('folder.download');





});


/* Employee Routes  */

Route::group(['middleware' =>['auth'], 'prefix'=> 'employee'], function(){   
    
    Route::get('csdashboard', [DashboardController::class, 'csdashboard'])->name('csdashboard');     
    Route::get('/notifications', [CsBuTrackerController::class, 'notifications'])->name('cs.notifications');
        
    Route::post('/csprofiles', 'CsprofileController@store')->name('csprofiles.store');
    Route::get('/csprofiles/{id}/edit', 'CsprofileController@edit')->name('csprofiles.edit');
    Route::post('/csprofiles/getEmalid', 'CsprofileController@getEmalid')->name('csprofiles.getEmalid');
    Route::get('/csprofiles/{id}/changePassword', 'CsprofileController@changePassword')->name('csprofiles.changePassword');
    Route::post('/csprofiles/storeUserPassword', 'CsprofileController@storeUserPassword')->name('csprofiles.storeUserPassword');  
   
    Route::get('/file-managers', [EmpFileManagerController::class, 'fileManagerss'])->name('emp.file-manager.index');
    Route::post('/file-manager/folder', [EmpFileManagerController::class, 'storeFolder'])->name('emp.file-manager.storeFolder');
    Route::get('/file-manager/{folders}/{id}', [EmpFileManagerController::class, 'folderView'])
        ->where('folders', '([a-zA-Z0-9-_\/]+)')  
        ->name('emp.file-manager.view');
    Route::post('/file-manager/upload', [EmpFileManagerController::class, 'folderDataStore'])->name('emp.file.upload');

    Route::post('/file-manager/folder/store', [EmpFileManagerController::class, 'folderViewStore'])->name('emp.file.storeFolder');

    Route::post('/file-manager/copy', [EmpFileManagerController::class, 'copyFile'])->name('emp.file.copy');
    Route::post('/file-manager/move', [EmpFileManagerController::class, 'moveFile'])->name('emp.file.move');
    Route::post('/file-manager/rename', [EmpFileManagerController::class, 'renameFileOrFolder'])->name('emp.file.rename');
    Route::post('/file-manager/delete', [EmpFileManagerController::class, 'deleteFileOrFolder'])->name('emp.file.delete');


    Route::get('/get-child-folders/{parentId}', [EmpFileManagerController::class, 'getChildFolders'])->name('emp.file.childname');
    Route::get('/get-folder-breadcrumb/{parentId}', [EmpFileManagerController::class, 'getFolderBreadcrumb'])->name('emp.file.breadcrumn');

    Route::get('/download/file/{filePath}', [EmpFileManagerController::class, 'downloadFile'])->name('emp.file.download');
    Route::get('/download/folder/{folderPath}', [EmpFileManagerController::class, 'downloadFolder'])->name('emp.folder.download');
     
    
});


